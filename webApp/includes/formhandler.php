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
		echo "<br>";
		echo $firstname;
		echo "<br>";
		echo $lastname;
		echo "<br>";
		echo $areacode;
		echo "<br>";
		echo $phone;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $total;
		echo "<br>";
		
		header("Location: ../index.php");
	}
	else {
		header("Location: ../index.php");
	}
