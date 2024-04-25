<?php
session_start();

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
	header("Location: ../index.php");
	exit();
}

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$areacode = $_POST["areacode"];
$phone = $_POST["phone"];
$u_email = $_POST["email"];
$total = $_POST["total"];

if (empty($firstname) || empty($lastname) || empty($areacode) || empty($phone) || empty($email) || empty($total)) {
	header("Location: ../index.php");
	exit();
}

$_email = filter_var($u_email, FILTER_SANITIZE_EMAIL);
$email = filter_var($_email, FILTER_VALIDATE_EMAIL);

if (!email) {
	//TODO: include error message
	header("Location: ../index.php");
	exit();
}

try {
	require_once "dbhandler.php";
	$query = "INSERT INTO customers (firstname, lastname, areacode, phonenumber, email, total) VALUES (?,?,?,?,?,?);";
	$stmt = $pdo->prepare($query);
	$stmt->execute([$firstname, $lastname, $areacode, $phone, $email, $total]);	
	// Free Resources
	$pdo=null; 
	$stmt=null;
	// Display success message
	header("Location: ../success.html");
	die();
} catch (PDOException $e) {
	die("Query failed! Error message: " . $e->getMessage());
}


