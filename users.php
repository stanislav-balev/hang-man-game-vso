<?php
include("session.php");

/**
 *	Logged in users can't access this page
 */
if($authenticated) {
	header('Location: ./index.php');
}
?>

<html>
<head>
	<title>hangman</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="game-board">
		<h1>hangman</h1>
		<hr />
		<div class="col50">
			<h2>login</h2>
			<form action="login.php" method="POST">
				<label for="username">username:</label>
				<input type="text" class="field" name="username" />
				<label for="password">password:</label>
				<input type="password" class="field" name="password" />
				<input type="submit" class="btn" name="action" value="login" />
				<div class="clear"></div>
			</form>
		</div>
		<div class="col50">
			<h2>register</h2>
			<form action="register.php" method="POST">
				<label for="username">username:</label>
				<input type="text" class="field" name="username" />
				<label for="password">password:</label>
				<input type="password" class="field" name="password" />
				<input type="submit" class="btn" name="action" value="register" />
				<div class="clear"></div>
			</form>
		</div>
	</div>
</body>
</html>
