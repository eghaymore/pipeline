<?php
ini_set('session.use_only_cookies', 1);// Session ID stored only through cookies, not through url or anything else.
ini_set('session.use_strict_mode', 1);// Only use session ID created by server. Makes Session ID more complex.
$timeoutSeconds = 1800;// 30 Minutes

session_set_cookie_params([
	'lifetime' => $timeoutSeconds,
	'domain' => 'localhost',
	'path' => '/',
	'secure' => true,// Only run this cookie under https connection, not http
	'httponly' => true// restrict access through browser
]);

session_start();
//session_regenerate_id(true);

if (!isset($_SESSION['last_regen'])) {
	session_regenerate_id(true);// Creates a new Session ID that is more secure than default
	$_SESSION['last_regen'] = time();
} else {

	if (time() - $_SESSION['last_regen'] >= $timeoutSeconds) {
		session_regenerate_id(true);
		$_SESSION['last_regen'] = time();
	}
}
