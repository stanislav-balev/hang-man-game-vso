<?php

require_once('configuration.php');

$conn = mysqli_connect('localhost:3307', 'root', '1234555','hangman') or die(mysqli_error($conn));
global $conn;
