<?php include("session.php"); ?>

<html>
<head>
	<title>Бесеница!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/style.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
</head>
<body>
	<div id="game-board" style="margin-top: 10px;">
		<h1>Бесеница!</h1>
		<img src="../img/bg.png" id="mainImg" alt="hangman_welcome_image">
		<div class="indexButtons">
			<div class="col-md-12">
				<div class="col-md-4">
					<a class="btn wide-btn" href="index.php"><img width="35" height="35" src="../img/flag_BG.png"> БЕСЕНИЦА!</a>
				</div>
				<div class="col-md-4">
					<a class="btn wide-btn" href="../index.php"><img width="35" height="35" src="../img/flag_EN.png"> HANGMAN</a>
				</div>
				<div class="col-md-4">
					<a class="btn wide-btn" href="../vr/index.php"><img width="35" height="35" src="../img/flag_VR.png"> ОБЕСВАНЬИЕ</a>
				</div>

				<div class="col-md-12">
					<a class="btn wide-btn" href="new_game.php"> >>> Нова игра <<< </a>
				</div>
				<?php
				if($authenticated) { ?>
				<div class="col-md-6">	<a class="btn wide-btn" href="logout.php">Излез > <?php echo $user['username']; ?></a> </div>
					<?php if($user['role'] > 0) { ?>
						<a class="btn wide-btn" href="words.php">Думи</a>
					<?php } ?>
				<?php } else { ?>
					<div class="col-md-6"> <a class="btn wide-btn" href="users.php">Вход / Регистрация</a> </div>
				<?php } ?>
				<div class="col-md-6">
					<a class="btn wide-btn" href="scoreboard.php">* Класиране *</a>
				</div>
				<div class="col-md-12" style="margin-top:2%;">
					<p class="copy">Разработено от Димитър Господинов § Станислав Балев</p>
					<p class="copy">Враца Софтуер Общество @ PHP 2018</a>
				</div>
		</div>
	</div>
</body>
</html>
