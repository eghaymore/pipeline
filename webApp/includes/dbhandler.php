<?php

	$dsn = "pgsql:host=localhost;port=5433;dbname=customers";
	$dbusername = "dba";
	$dbpassword = "haha";

	try {
		// php data object
		$pdo = new PDO($dsn, $dbusername, $dbpassword);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connection successful!";

	} catch(PDOException $e) {
		echo "Connection failed! Error message: " . $e->getMessage();
	}



