<?php #Script 12.12 - vqg-login.php ##
	// This page processes the login form submission.
	// The script now uses sessions.

	// Check if the form has been submitted:
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Need two helper files:
		require ('includes/vqg-login_functions.inc.php');
		require ('mysqli_connect.php');

		// Check the login:
		list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);

		if ($check) { // OK!

			// Set the session data:
			session_start();
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['first_name'] = $data['first_name'];

			// Store the HTTP_USER_AGENT:
			$_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

			// Redirect:
			redirect_user('vqg-loggedin.php');

		} else { // Unsuccessful!

			// Assign $data to $errors for login_page.inc.php:
			$errors = $data;

		}

		mysqli_close($dbc); // Close the database connection.

	} // End of the main submit conditional.

	// Create the page:
	include ('includes/vqg-login_page.inc.php');
?>
