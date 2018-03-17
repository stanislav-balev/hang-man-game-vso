<?php
include("session.php");
include("db_connect.php");

/**
 *	Check and redirect users who are not logged in
 *	or they don't have administrator privileges
 */
if(!$authenticated || ($authenticated && $user['role'] <= 0)) {
	header('Location: ./users.php');
}


/**
 *	Add a new word to the database
 *	Expecting a string word as GET parameter
 *	Example: ?action=add&word=...
 */
function addWord() {
	$word = $_GET['word'];
	global $conn;
	$query = sprintf("INSERT INTO `words_vr`(word_vr) VALUES ('$word')",
			mysqli_real_escape_string($conn,$word));
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));
}

/**
 *	Update an existing word
 *	Expecting a valid word_id and a string
 *	Example: ?action=edit&word_id=1&word=...
 */
function editWord() {
	global $conn;
	$word_id = $_GET['word_id'];
	$word = $_GET['word'];
	
	$query = sprintf("UPDATE words_vr SET words_vr = '$word' WHERE word_vr_id = %d",
			mysqli_real_escape_string($conn,$word), $word_id);
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));
}

/**
 *	Remove a word from the database
 *	Expencting a valid word_id
 *	Example: ?action=delete&id=...
 */
function deleteWord() {
	global $conn;
	$word_id = $_GET['id'];
	$query = sprintf("DELETE FROM words_vr WHERE word_vr_id = %d", $word_id);
	$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));
}

/**
 *	Determine what action is selected,
 *	and act accordingly
 */
if( isset($_GET['action']) ) {
	$action = $_GET['action'];
	if( $action == 'edit' ) {
		editWord();
	} elseif( $action == 'delete' ) {
		deleteWord();
	} elseif( $action == 'add' ) {
		addWord();
	}
} ?>

<html>
<head>
	<title>Обесваньие!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div id="game-board">
		<h1 class="title"><a href="index.php">Обесваньие!</a></h1>
		<hr />
		
		<?php
		/**
		 *	Display either the add form, or the edit form,
		 *	depending on the selected action
		 */
		if(isset($_GET['action']) && $_GET['action'] == 'select') { ?>
			<form method="GET">
				<label for="word">Дума:</label>
				<?php
				global $conn;
				$query = sprintf("SELECT * FROM words_vr WHERE word_vr_id = %d", $_GET['id']);
				$result = mysqli_query($conn, $query) or die("Query error: " . mysqli_error($conn));
				$row = mysqli_fetch_assoc($result);
				?>
				<input type="text" class="field" name="word" value="<?php echo $row['word_vr']; ?>"/>
				<input type="hidden" name="word_id" value="<?php echo $_GET['id']; ?>" />
				<input type="submit" class="btn" name="action" value="edit" />
				<div class="clear"></div>
			</form>
		<?php } else { ?>
			<form method="GET">
				<label for="word">Дума:</label>
				<input type="text" class="field" name="word" />
				<input type="submit" class="btn" name="action" value="add" />
				<div class="clear"></div>
			</form>
		<?php } ?>
		
		<?php
		/**
		 *	Fetch and diplay all words
		 *	along with edit and delete buttons
		 */
		global $conn;
		$query = "SELECT * FROM words_vr";
		$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error($conn));
		
		while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="game-row">
				<div class="col10"><?php echo $row['word_vr_id']; ?></div>
				<div class="col50 nopadding"><?php echo $row['word_vr']; ?></div>
				<div class="col10"><a href="?action=delete&id=<?php echo $row['word_vr_id']; ?>">тръканьие</a></div>
				<div class="col10"><a href="?action=select&id=<?php echo $row['word_vr_id']; ?>">променьиане</a></div>
			</div>
		<?php }
		mysqli_free_result($result); ?>
		
	</div>
</body>
</html>
