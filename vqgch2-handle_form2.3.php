<!DOCTYPE html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Form Feedback</title>
	</head>

	<body>
		<?php # Script 2.2 - handle_form.php #4

			// Create a shorthand for the form data (Set Input variables to local variables):
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$comments = $_REQUEST['comments'];
			if (isset($_REQUEST['gender'])) {
				$gender = $_REQUEST['gender'];
			}
			else {
				$gender = NULL;
			}

			// Print the submitted information:
			echo "<p>Thank you, <b>$name</b>, for the following comments:<br /><tt>$comments</tt></p>"
			   . "<p>We will reply to you at <i>$email</i>.</p>\n";
			if ($gender == "M") {
				echo '<p><b>Good day, Sir!</b></p>';
			}
			elseif ($gender == "F") {
				echo '<p><b>Good day, Madam!</b></p>';
			}
			else {
				echo '<p><b>You forgot to enter your gender!</b></p>';
			}

		?>
	</body>
</html>
