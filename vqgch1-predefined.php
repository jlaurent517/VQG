<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Predefined Variables</title>
	</head>

	<body>
		<?php # Script 1.5 - predefined.php

			// Create a shorthand version of the variable names:
			$file = $_SERVER['SCRIPT_FILENAME'];
			$user = $_SERVER['HTTP_USER_AGENT'];
			$server = $_SERVER['SERVER_SOFTWARE'];

			// Print the name of this script:
			echo "<p>You are running the file (SCRIPT_FILENAME):<br /><b>$file</b>.</p>\n";

			// Print the user's information:
			echo "<p>You are viewing this page using (HTTP_USER_AGENT):<br /><b>$user</b></p>\n";

			// Print the server's information:
			echo "<p>This server is running (SERVER_SOFTWARE):<br /><b>$server</b>.</p>\n";

		?>
	</body>
</html>