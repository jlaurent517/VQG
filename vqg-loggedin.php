<?php # Script 12.13 - vqg-loggedin.php
// The user is redirected here from vqg-login.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
// Also validate the HTTP_USER_AGENT!
if (!isset($_SESSION['agent']) OR ($_SESSION['agent'] != md5($_SERVER['HTTP_USER_AGENT']) )) {

	// Need the functions:
	require ('includes/vqg-login_functions.inc.php');
	redirect_user();

}

// Set the page title and include the HTML header:
$page_title = 'logged In!';
include ('includes/header.html');

// Print a customized message:
echo "<h1>Logged In!</h1>
	 <p>You are now logged in, {$_COOKIE['first_name']}</p>
	 <p><a href=\"vqg-logout.php\">Logout</a></p>";

	include ('includes/footer.html');
?>