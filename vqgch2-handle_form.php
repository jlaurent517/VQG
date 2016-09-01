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
			if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments'])) {
				echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:<br /><tt>{$_POST['comments']}</tt></p>"
				   . "<p>We will reply to you at <i>{$_POST['email']}</i>.</p>\n";
			}
			else {
				echo '<p class="error">Please go back and fill out the form again</p>';
			}

		?>
	</body>
</html>
