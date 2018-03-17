<?php
if(!isset($_POST['action'])) {
	header('Location: ./index.php');
}

include("db_connect.php");
include("session.php");

$username = $_POST['username'];
$password = $_POST['password'];

/**
 *	Check if username exists
 */
$query = sprintf("SELECT username FROM player WHERE username = '%s'", mysqli_real_escape_string($conn,$username));
$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());

if(mysqli_num_rows($result) < 0) {
	die("Username $username already exists!");
}

mysqli_free_result($result);

/**
 *	Add user to the database
 */
$query = sprintf("INSERT INTO player VALUES (NULL, '%s', '%s', 0)",
		mysqli_real_escape_string($conn,$username),
		mysqli_real_escape_string($conn,$password));
$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());

/**
 *	Automatic login for the new user
 */
$uid = mysqli_insert_id();
$user = array("id" => $uid,
				"username" => $username,
				"role" => 0);
$_SESSION['user'] = $user;

mysqli_close();
header('Location: ./index.php');
?>
