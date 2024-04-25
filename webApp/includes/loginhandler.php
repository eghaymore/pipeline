<?php
if (!$_SERVER["REQUEST_METHOD"] == "POST") {
	header("Location: ../index.php");
	die();
}

$username = $_POST["username"];
$pwd = $_POST["password"];


try {
	require_once 'dbhandler.php';
	if (empty($username) || empty($pwd)) {
		$errors["emptyFields"] = "Please fill in all fields";
	}
	// Username does not exist
	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$username]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if (empty($result)) { 
		$errors["noUsername"] = "Username not recognized";
	}
	
	$storedHash = $result["pwd"];
	if (!password_verify($pwd, $storedHash)) {
		$errors["emptyFields"] = "Wrong password or username";
	}

	
	require_once '../config.php';
	if ($errors) {
		$_SESSION["error_login"] = $errors;
		header("Location: ../login.php");
		exit();
	}
	
	$newSessionId = session_create_id();
	$sessionId = $newSessionId . "_" . $result["id"];
	session_id($sessionId);
	
	$_SESSION["user_id"] = $result["id"];
	$_SESSION["username"] = htmlspecialchars($result["username"]);
	$_SESSION['last_regen'] = time();
	header("Location: ../success.html");
	exit();
} catch(PDOException $e) {
	echo "Query failed! Error message: " . $e->getMessage();
}
