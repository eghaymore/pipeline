<!doctype html>
<html lang="en">
	<head>
		<title>Edward Haymore</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, inital-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.bundle.js"></script>
		<script src="js/script.js"></script>
	</head>
		<?php
		require_once "config.php";
		require_once "includes/view.php";
		checkSignupErrors();
		?>
	<!-- NOTE: the required attribute is not enough to stop the user from submitting an empty form! user can still submit the form by using the inspect tool-->
	<!-- Frontend stuff does not provide security! -->
	<body>
		<nav class="navbar navbar-dark navbar-expand-md p-md-3">
			<a href="index.php"class="navbar-brand text-muted">Edward Haymore</a>
			<button class="navbar-toggler" data-target="#nav-menu" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
			<div id="nav-menu" class="collapse navbar-collapse justify-content-center">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="lookup.php" class="nav-link">Lookup</a></li>
					<li class="nav-item"><a href="signup.php" class="nav-link">Register</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">Log in</a></li>
				</ul>
			</div>
		</nav>
		<main class="jumbotron shadow-lg">
		<form action="includes/formhandler.php" method="post">
		<div class="form-group">
			<input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
        		<br><br>
        		<input type="text" id="lastname" name="lastname" placeholder="Lastname" required>
        		<br><br>
			<input type="text" id="areacode" name="areacode" placeholder="Areacode" required>
        		<br><br>
			<input type="text" id="phone" name="phone" placeholder="Phone" required>
        		<br><br>
			<input type="text" id="email" name="email" placeholder="Email" required>
        		<br><br>
			<input type="text" id="total" name="total" placeholder="Total" required>
        		<br><br>
        		<button type="submit">Submit</button>
        </div>
		</form>
		
		<form action="includes/logout.php" method="post">
		<button>Log out</button>
		</form>
		</main>
		
	</body>
</html>
