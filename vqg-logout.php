<?php # Script 12.11 - vqg-logout.php
// This page lets the user logout.
// This version uses sessions.

session_start(); // Access the existing session.

// If no session variables exists, redirect the user:
if (!isset($_SESSION['user_id'])) {

	// Need the function:
	require ('includes/vqg-login_functions.inc.php');
	redirect_user();

} else {
	$_SESSION = array(); //Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0,0);

}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ('includes/header.html');

// Print a customized message:
echo "<h1>Logged Out!</h1>
		<p>You are now logged out!</p>";

		include ('includes/footer.html');
?>
