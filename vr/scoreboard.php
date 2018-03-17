<?php include("session.php"); ?>

<html>
<head>
	<title>ОБЕСВАНЬИЕ!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div id="game-board">
		<h1 class="title"><a href="index.php">ОБЕСВАНЬИЕ!</a></h1>
		<div class="game-row">
			<div class="col50">БАЦЕ</div>
			<div class="col50">ТОЧКИ</div>
		</div>
		<hr />
		<?php
		include("db_connect.php");

		$per_page = 10; //Number of rows displayed per page

		/**
		 *	Determine which page is selected
		 *	Default: page 1
		 */
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
			$offset = $per_page * ($page-1);
		} else {
			$page = 1;
			$offset = 0;
		}

		/**
		 *	Fetch all games of the selected page
		 */
		$query = sprintf("SELECT * FROM game INNER JOIN player ON game.user_id = player.username ORDER BY score DESC LIMIT %d OFFSET %d", $per_page, $offset);
		$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());

		/**
		 *	Display the results and a delete button
		 *	if the current user is an administrator
		 */
		while($row = mysqli_fetch_assoc($result)) { ?>
			<div class="game-row">
				<div class="col50"><?php echo $row['username']; ?></div>
				<div class="col50"><?php echo $row['score']; ?></div>
				<?php
				if($authenticated && $user['role'] > 0) { ?>
					<div class="col10"><a href="delete_game.php?id=<?php echo $row['game_id']; ?>">ТРЪКАНЬИЕ</a></div>
				<?php }
				?>
			</div>
		<?php }
		mysqli_free_result($result); ?>

		<div class="pages"><?php
			/**
			 *	PAGINATION
			 */
			$query = "SELECT * FROM game";
			$result = mysqli_query($conn,$query) or die("Query error: " . mysqli_error());
			$len = mysqli_num_rows($result);

			// previous page buton
			$prev = $page-1;
			if($prev > 0)
				echo "<a href=\"?page=$prev\"><</a>";

			// page butons
			for($i=1,$j=1; $i<$len; $i+=$per_page,$j++) {
				if($page == $j)
					echo "<a class=\"current\" href=\"?page=$j\">$j</a>";
				else
					echo "<a href=\"?page=$j\">$j</a>";
			}

			// next page buton
			$next = $page+1;
			if($next <= ceil($len/$per_page))
				echo "<a href=\"?page=$next\">></a>";

			mysqli_free_result($result);
			mysqli_close($conn); ?>
		</div>
	</div>
</body>
</html>
