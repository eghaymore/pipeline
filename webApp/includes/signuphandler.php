<?php
if (!$_SERVER["REQUEST_METHOD"] == "POST") {
	header("Location: ../index.php");
	die();
}

$username = $_POST["username"];
$pwd = $_POST["password"];
$u_email = $_POST["email"];
$email = filter_var($u_email, FILTER_SANITIZE_EMAIL);
$finalizedEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

try {
	require_once 'dbhandler.php';
	//ERROR HANDLERS
	$errors = [];
	if (empty($username) || empty($pwd) || empty($email)) {
		$errors["emptyFields"] = "Please fill in all fields";
	}
	if (!$finalizedEmail) {
		$errors["invalidEmail"] = "Please enter a valid email";
	}	
	// Username already taken
	$query = "SELECT username FROM users WHERE username = ?;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$username]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!empty($result)) { 
		$errors["takenUsername"] = "That username has been taken, please choose another";
	}
	// Email already registered
	$query = "SELECT email FROM users WHERE email = ?;";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$email]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!empty($result)) { 
		$errors["takenEmail"] = "That email address has already been registered";
	}
	
	require_once '../config.php';
	if ($errors) {
		$_SESSION["error_signup"] = $errors;
		header("Location: ../signup.php");
		exit();
	}
	
	// Hash password
	$options = [
		'cost' => 12
	];
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);
	// Sign up user
	$query = "INSERT INTO users(username, pwd, email) VALUES (?, ?, ?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$username, $hashedPwd, $finalizedEmail]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	// Free Resources
	$pdo=null; 
	$stmt=null;
	header("Location: ../success.html");
	exit();	
} catch(PDOException $e) {
	echo "Query failed! Error message: " . $e->getMessage();
}
