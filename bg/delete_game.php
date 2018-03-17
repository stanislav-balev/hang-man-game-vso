<?php
include("session.php");

if(!$authenticated || ($authenticated && $user['role'] <= 0)) {
	header('Location: ./users.php');
}

if(!isset($_GET['id'])) {
	header('Location: ./scoreboard.php');
}

$game_id = $_GET['id'];

include("db_connect.php");

$query = sprintf("DELETE FROM game WHERE game_id = %d", $game_id);
$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());

mysqli_close();
header('Location: ./scoreboard.php');
