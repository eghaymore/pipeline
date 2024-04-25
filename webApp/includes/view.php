<?php
declare(strict_types=1);

function checkSignupErrors() {
	if (isSet($_SESSION["error_signup"])) {
		$errors = $_SESSION["error_signup"];
		
		echo "<br>";
		foreach ($errors as $error) {
			echo "<p>" . $error . "</p>";
		}
		unset($_SESSION["error_signup"]);
	}
}

function checkLoginErrors() {
	if (isSet($_SESSION["error_login"])) {
		$errors = $_SESSION["error_login"];
		
		echo "<br>";
		foreach ($errors as $error) {
			echo "<p>" . $error . "</p>";
		}
		unset($_SESSION["error_login"]);
	}
}
