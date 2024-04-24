<!doctype html>
<html lang="en">
	<head>
		<title>Edward Haymore</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, inital-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<script src="../js/jquery-3.5.1.min.js"></script>
		<script src="../js/bootstrap.bundle.js"></script>
		<script src="../js/script.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-dark navbar-expand-md p-md-3">
			<a href="../index.php"class="navbar-brand text-muted">Edward Haymore</a>
			<button class="navbar-toggler" data-target="#nav-menu" data-toggle="collapse"><span class="navbar-toggler-icon"></span></button>
			<div id="nav-menu" class="collapse navbar-collapse justify-content-center">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="../lookup.php" class="nav-link">Lookup</a></li>
				</ul>
			</div>
		</nav>
		
		<?php
			session_start();
			if (!$_SERVER["REQUEST_METHOD"] == "POST") {
				header("Location: ../index.php");
				exit();
			}
			
			$lastname = $_POST["lastname"];
			if (empty($lastname)) {
				header("Location: ../index.php");
				exit();
			}
			
			try {
				require_once "dbhandler.php";
				$query = "select * from customers where lastname = ?";
				$stmt = $pdo->prepare($query);
				$stmt->execute([$lastname]);
				// Fetch the results
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				// Free Resources
				$pdo=null; 
				$stmt=null;
				echo "<br><br>";
				foreach ($results as $x) {
  					// vulnerable to cross-site-scripting without htmlspecialchars
  					echo htmlspecialchars($x["firstname"]) . " " . htmlspecialchars($x["lastname"]). ", (" . htmlspecialchars($x["areacode"]) . ") " . htmlspecialchars($x["phonenumber"]) . ", " . htmlspecialchars($x["email"]) . ", $" . htmlspecialchars($x["total"]);
  					echo "<br><br>";
				}
			
			} catch (PDOException $e) {
				die("Query failed! Error message: " . $e->getMessage());
			}
		?>
		
	</body>
</html>
