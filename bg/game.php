<?php
include("session.php");
require("db_connect.php");
$game_id = null;

/**
 *	Increase or decrease the difficulty
 *	by the value of $step variable
 */
function adjustDifficulty($step) {
	global $game_id;
	global $conn;
	$query = sprintf("UPDATE game SET difficulty = difficulty + '%d' WHERE game_id = %d", $step, $game_id);
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());
}

/**
 *	Remove all given letters except,
 *	the first and last of the hidden word
 */
function resetLetters() {
	global $game_id;
	global $conn;
	$query = sprintf("SELECT word_bg FROM words_bg INNER JOIN game ON words_bg.word_bg_id = game.word_id WHERE game_id = '%d'", $game_id);
	$result = mysqli_query($conn, $query) or die("Query error: " . mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	$word = $row['word_bg'];
	mysqli_free_result($result);

	$letters = array();
	$strlen = mb_strlen( $word, "utf-8" );
	$first_char = mb_substr( $word, 0, 1, "utf-8" );
	$last_char = mb_substr( $word, $strlen-1, 1, "utf-8" );
	$letters[] = $first_char;
	$letters[] = $last_char;
	$letters_str = implode(",", $letters);

	$query = sprintf("UPDATE game SET given_letters = '%s' WHERE game_id = %d",
			mysqli_real_escape_string($conn,$letters_str), $game_id);
	$result = mysqli_query($conn, $query) or die("Query error: " . mysqli_error());
}

/**
 *	Decrease score by 15 and start over the game
 */
function resetGame() {
	global $game_id;
	global $conn;
	$query = sprintf("UPDATE game SET given_letters = '', score = score -15, fails=0 WHERE game_id = %d", $game_id);
	$result = mysqli_query($conn, $query) or die("Query error: " . mysqli_error());

	resetLetters();
}

/**
 *	Fetch and return all rows about the current game
 */
function getGameInfo() {
	global $game_id;
	global $conn;
	$query = sprintf("SELECT * FROM game INNER JOIN words_bg ON game.word_id = words_bg.word_bg_id WHERE game_id = '%s'", $game_id);
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);

	return $row;
}

/**
 *	Return all the needed information to display on the game board
 */
function play() {
	$error = "";

	$info = getGameInfo();
	$word = $info['word_bg'];
	$letters = explode(",", $info['given_letters']);

	//Submit a letter
	if(isset($_GET['letter'])) {
		$error = submitLetter($word, $letters);
	}

	$info  = getGameInfo();
	$word = $info['word_bg'];
	$letters = explode(",", $info['given_letters']);
	$displayedWord = getDisplayedWord($word, $letters);

	return array("word" => $displayedWord[0],
					"success" => $displayedWord[1],
					"letters" => $info['given_letters'],
					"score" => $info['score'],
					"fails" => $info['fails'],
					"difficulty" => $info['difficulty'],
					"error" => $error);
}

/**
 *	Check the validity of the given letter
 *	Check if it's a hit or a miss
 *	and update the database
 */
function submitLetter($word, $letters) {
	global $game_id;
	global $conn;
	$letter =  mb_strtoupper($_GET['letter'], "utf-8");

	$len = mb_strlen( $letter, "utf-8" );

	if($len !=  1) {
		return "САМО ПО ЕДНА БУКВА НА ХОД!";
	}
	if(in_array($letter, $letters)) {
		return "БУКВАТА '" . $letter . "' ВЕЧЕ Е ПРЕДПОЛОЖЕНА ВЕДНЪЖ";
	}

	$fail = 0;

	if(mb_strpos($word, $letter, 0, "utf-8") !== false) {
		$score = 5;
	} else {
		$score = -1;
		$fail = 1;
	}
	global $conn;
	$letters[] = $letter;
	$letters_str = implode(",", $letters);
	$query = sprintf("UPDATE game SET given_letters = '%s', fails = fails + '%d', score = score + '%d' WHERE game_id = '%s'",
				mysqli_real_escape_string($conn,$letters_str),
				$fail, $score,
				mysqli_real_escape_string($conn,$game_id));
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));

	return "";
}

/**
 *	Get the word with hidden letters
 *	Example U_____A
 *
 * @param $word String      the hidden word
 * @param $letters array    the letters which the player gave
 * @return array            returns the masked word and a completion flag
 */
function getDisplayedWord($word, $letters) {
	$strlen = mb_strlen( $word, "utf-8" );
	$displayed_word = "";
	$complete = true;

	for($i=0; $i<$strlen; $i++) {
		$char = mb_substr( $word, $i, 1, "utf-8" );

		if(in_array($char, $letters)) {
			$displayed_word .= sprintf(" %s ", $char);
		} else {
			$displayed_word .= " _ ";
			$complete = false;
		}
	}

	return array($displayed_word, $complete);
}
?>

<html>
<head>
	<title>Бесеница!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/style.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
</head>
<body>
	<?php
	/**
	 *	Check if an action and a game id are selected
	 */
	if(isset($_GET['action']) && isset($_GET['id'])) {
		$action = $_GET['action'];
		$game_id = $_GET['id'];

		/**
		 *	Act accordingly to the selected action
		 *	-reset given letters / new game
		 *	-reset game
		 *	-adjust difficulty
		 */
		if($action == "new") {
			resetLetters();
		} elseif($action == "reset") {
			resetGame();
		} elseif($action == "adjust") {
			adjustDifficulty($_GET['diff']);
		}

		$response = play(); ?>

		<div id="game-board">
			<h1 class="title"><a href="index.php">Бесеница!</a></h1>
			<div id="stats">
				<div class="col30">
					<h3>Точки</h3>
					<p><?php echo $response['score']; ?></p>
				</div>
				<div class="col30">
					<h3>Грешки</h3>
					<p><?php echo $response['fails']; ?></p>
				</div>
				<div class="col30">
					<h3>Трудност</h3>
					<p><?php echo $response['difficulty']; ?></p>
				</div>
			</div>
			<div id="word">
				<?php echo $response['word']; ?>
			</div>
			<?php if($response['fails'] < $response['difficulty'] && !$response['success']) { ?>
				<form method="GET" accept-charset="utf-8">
					<input type="hidden" name="action" value="play" />
					<input type="hidden" name="id" value="<?php echo $game_id; ?>" />
					<label for="letter">БУКВА:</label>
					<input type="text" class="field" id="letter" name="letter" autofocus/>
					<input type="submit" class="btn" value="предположи" />
				</form>
				<div class="clear"></div>
			<?php } ?>

			<?php $letters = $response['letters']; ?>
			<label for="letters">ПРЕДПОЛОЖЕНИ БУКВИ:</label>
			<input type="text" class="field" id="letters" value="<?php echo $letters; ?>" readonly />

			<div id="actions">
				<a href="?action=reset&id=<?php echo $game_id; ?>" class="btn btn-action"><i class="fas fa-reply-all"></i></a>
				<a href="new_game.php?id=<?php echo $game_id; ?>" class="btn btn-action"><i class="fas fa-chevron-circle-right"></i></a>
				<a href="?action=adjust&id=<?php echo $game_id; ?>&diff=1" class="btn btn-action">ТРУДНО</a>
				<a href="?action=adjust&id=<?php echo $game_id; ?>&diff=-1" class="btn btn-action">ЛЕСНО</a>
				<div class="clear"></div>
			</div>

			<?php
			/**
			 *	Informational Messages
			 *	Error, Success, Lose
			 */
			if($response['error']) { ?>
				<div id="error">
					<p><?php echo $response['error']; ?></p>
				</div>
			<?php }
			if($response['success']) { ?>
				<div id="success">
					<p><?php echo "Победа!" ?></p>
				</div>
			<?php } ?>
			<?php if($response['fails'] >= $response['difficulty']) { ?>
				<div id="error">
					<p><?php $img_path='./img/hanged.png';
					echo "ОБЕСЕН!"."<img src='.$img_path.'>"; ?></p>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</body>
</html>
