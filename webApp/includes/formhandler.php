<?php
//var_dump($_SERVER["REQUEST_METHOD"]);

//this should be private
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// vulnerable to cross-site-scripting without htmlspecialchars
		$firstname = htmlspecialchars($_POST["firstname"]);
		$lastname = htmlspecialchars($_POST["lastname"]);
		$areacode = htmlspecialchars($_POST["areacode"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$email = htmlspecialchars($_POST["email"]);
		$total = htmlspecialchars($_POST["total"]);
		if (empty($firstname)) {
			exit();
			header("Location: ../index.php");
		}

		try {
			require_once "dbhandler.php";
			// vulnerable to sql injection!
			$query = "INSERT INTO customers (firstname, lastname, areacode, phonenumber, email, total) VALUES ('$firstname', '$lastname', '$areacode', '$phone', '$email','$total');
";
			$pdo->query($query);
			echo "<h1>success?</h1>";
		} catch (PDOException $e) {
			die("Query failed! Error message: " . $e->getMessage());
		}
	}
	else {
		//header("Location: ../index.php");
		echo "<p>whoops!</p>";
	}
