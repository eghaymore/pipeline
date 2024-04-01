<?php
session_start();
//var_dump($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// vulnerable to cross-site-scripting without htmlspecialchars
	$lastname = htmlspecialchars($_POST["lastname"]);
	if (empty($lastname)) {
		exit();
		header("Location: ../index.php");
	}
	try {
		require_once "dbhandler.php";
		$query = "select * from customers where lastname = '$lastname'";
		//$query = "select * from customers where lastname = ' ';select * from dummy_test;-- '";

		$statement = $pdo->query($query);
		// Fetch the results
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		var_dump($results);
	} catch (PDOException $e) {
		die("Query failed! Error message: " . $e->getMessage());
	}
}
else {
	header("Location: ../index.php");
}

