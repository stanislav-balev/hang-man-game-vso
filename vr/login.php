<?php
if(!isset($_POST['action'])) {
	header('Location: ./index.php');
}

include("db_connect.php");
include("session.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = sprintf("SELECT user_id,username,role FROM player WHERE username = '$username' AND password = '$password'",
		mysqli_real_escape_string($username),
		mysqli_real_escape_string($password));
$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());

if(mysqli_num_rows($result) <= 0) {
	header('Location: ./users.php');
	return;
}

$row = mysqli_fetch_assoc($result);

$user = array("id" => $row['user_id'],
				"username" => $row['username'],
				"role" => $row['role']);

$_SESSION['user'] = $user;

mysqli_free_result($result);
mysqli_close();
header('Location: ./index.php');
