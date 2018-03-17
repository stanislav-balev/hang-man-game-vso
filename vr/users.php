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
	<title>ОБЕСВАНЬИЕ!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div id="game-board">
		<h1>ОБЕСВАНЬИЕ!</h1>
		<hr />
		<div class="col50">
			<h2>УЛАЗАНЬИЕ</h2>
			<form action="login.php" method="POST">
				<label for="username">БАЦЕ:</label>
				<input type="text" class="field" name="username" />
				<label for="password">НЕМА А ТИ КАЖА:</label>
				<input type="password" class="field" name="password" />
				<input type="submit" class="btn" name="action" value="УЛАЗАНЬИЕ" />
				<div class="clear"></div>
			</form>
		</div>
		<div class="col50">
			<h2>ЗАПИСВАНЬИЕ</h2>
			<form action="register.php" method="POST">
				<label for="username">БАЦЕ:</label>
				<input type="text" class="field" name="username" />
				<label for="password">НЕМА А ТИ КАЖА:</label>
				<input type="password" class="field" name="password" />
				<input type="submit" class="btn" name="action" value="ЗАПИСВАНЬИЕ" />
				<div class="clear"></div>
			</form>
		</div>
	</div>
</body>
</html>
