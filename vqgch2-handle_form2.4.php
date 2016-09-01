<!DOCTYPE html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Form Feedback</title>
		<style type="text/css" title="text/css" media="all>">
			.error {
				font-weight: bold;
				color: #C00;
			}
		</style>
	</head>

	<body>
		<?php # Script 2.4 - handle_form.php #4

			// Create a shorthand for the form data (Set Input variables to local variables):
			if (!empty($_REQUEST['name'])) {
				$name = $_REQUEST['name'];
			}
			else {
				$name = NULL;
				echo '<p class="error">You forgot to enter your name!</p>';
			}
			if (!empty($_REQUEST['email'])) {
				$email = $_REQUEST['email'];
			}
			else {
				$email = NULL;
				echo '<p class="error">You forgot to enter your email address!</p>';
			}
			if (!empty($_REQUEST['comments'])) {
				$comments = $_REQUEST['comments'];
			}
			else {
				$comments = NULL;
				echo '<p class="error">You forgot to enter any comments!</p>';
			}
			if (isset($_REQUEST['gender'])) {
				$gender = $_REQUEST['gender'];
			}
			else {
				$gender = NULL;
			}
			if ($gender == "M") {
				echo '<p"><b>Good day, Sir!</b></p>';
			}
			elseif ($gender == "F") {
				echo '<p><b>Good day, Madam!</b></p>';
			}
			else {
				echo '<p class="error"><b>You forgot to select your gender!</b></p>';
			}

			// Print the submitted information:
			if ($name && $email  && $comments) {
				echo "<p>Thank you, <b>$name</b>, for the following comments:<br /><tt>$comments</tt></p>"
				   . "<p>We will reply to you at <i>$email</i>.</p>\n";
			}
			else {
				echo '<p class="error">Please go back and fill out the form again</p>';
			}

		?>
	</body>
</html>
