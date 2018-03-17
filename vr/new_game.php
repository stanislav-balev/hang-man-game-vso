<?php
include("db_connect.php");
include("session.php");

$conn = mysqli_connect($host, $db_user, $db_pass,$db_name) or die(mysqli_error());

#mysqli_select_db($conn, /*HGM_CONF_DB_DBNAME*/) or die(mysqli_error());

/**
 *	Check if user is logged in
 *	else play anonymously
 */
if($authenticated) {
	$uid = $user['id'];
} else {
	$uid = 1;
}



/**
 *	Create a new game
 *	Select a word for the game by the given id
 */
function newGame($word_id) {
	global $uid;
	global $conn;
	$query = sprintf("INSERT INTO game VALUES (NULL, '%d', '%d', '', 0, 3, 0)", $uid, $word_id);
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));
	$last_id = mysqli_insert_id($conn);
	mysqli_close($conn);

	return $last_id;
}

/**
 *	Select the next word, according to the given id,
 *	and create a new game
 */
function nextGame($game_id) {
	global $conn;
	$query = sprintf("SELECT word_id FROM word WHERE word_id = (SELECT MIN(word_id) FROM word WHERE word_id > (SELECT word_id FROM game WHERE game_id = %d))", $game_id);
	$result = mysqli_query($conn, $query) or die("Query error: " . mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	$word_id = $row['word_id'];
	mysqli_free_result($result);

	return $word_id;
}

/**
 *	Find the first valid id from the words table
 */

function getFirstID() {
	global $conn;
	$query = "SELECT MIN(word_id) AS min_id FROM word";
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	return $row['min_id'];
}

/**
 *	Determine what to do, depending on the selected action
 *	-Create new game
 *	-Move to the next word
 */
if(isset($_GET['id']) && $_GET['id']) {
	$word_id = nextGame($_GET['id']);
	if(!$word_id) {
		$word_id = getFirstID();
	}
	$game_id = newGame($word_id);
} else {
	$game_id = newGame(getFirstID());
}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="refresh" content="1;url=game.php?action=new&id=<?php echo $game_id; ?>">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div id="game-board">
		<h1 class="title"><a href="index.php">обесваньие!</a></h1>
		<img src="../img/bg.png" id="mainImg" alt="hangman_welcome_image">
		<h2>така ше е, като не си мал...<h2>
	</div>
</body>
</html>
