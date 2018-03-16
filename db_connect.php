<?php

require_once('configuration.php');

$conn = mysqli_connect($host,$db_user,$db_pass) or die(mysqli_error());
mysqli_select_db($conn,$db_name) or die(mysqli_error());
mysqli_query($conn,"SET NAMES 'utf8_general_ci'");
mysqli_query($conn,"SET CHARACTER SET 'utf8_general_ci'");
