<?php include("session.php"); ?>

<html>
<head>
	<title>Hangman</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="game-board">
		<h1>Hangman</h1>
		<img src="img/bg.png" style="margin: 0px 8%; position: relative; bottom: 45px;">
		
		<div style="position: relative; bottom: 45px;">
		<hr />
		<?php
		 
		if($authenticated) { ?>
			<a class="btn wide-btn" href="logout.php">Logout <?php echo $user['username']; ?></a>
			<?php if($user['role'] > 0) { ?>
				<a class="btn wide-btn" href="words.php">Words</a>
			<?php } ?>
		<?php } else { ?>
			<a class="btn wide-btn" href="users.php">Login / Register</a>
		<?php } ?>
		<a class="btn wide-btn" href="new_game.php">New Game</a>
		<a class="btn wide-btn" href="scoreboard.php">Score Board</a>
		</div>
	</div>
</body>
</html>
