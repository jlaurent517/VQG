<?php # Script 10.4 - edit_user.php
// This script retrieves all the records from the users table.
// This new version paginates the query results.

$page_title = 'View Current Users';
include ('includes/header.html');
echo '<h1>Registered Users</h1>';

require_once ('mysqli_connect.php'); // Connect to the db.

// Number of records to show per page:
$display  = 10;
$order_by = "";

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) {  // Already been determined.
	$pages = $_GET['p'];
}
else { // Need to determine...

	// Count the number of records:
	$q = "SELECT COUNT(user_id) FROM users";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM);
	$records = $row[0];

	// Calculate the number of pages...
	if ($records > $display) {
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}

} // End of p IF.

$start = "";
$sort = 'rd';
// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];

	// Determine the sort...Default is by Registration Date.
	$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';
	// Determine the sorting order:
	switch ($sort) {
		case 'ln':
			$order_by = 'last_name ASC';
			break;
		case 'fn':
			$order_by = 'first_name ASC';
			break;
		case 'rd':
			$order_by = 'registration_date ASC';
			break;
		default:
			$order_by = 'registration_date ASC';
			$sort = 'rd';
			break;
	}
}

if ($order_by != "" ) {
	$order_clause .= " ORDER BY " . $order_by . " LIMIT " . $start . ", " . $display;
}
else {
	$order_clause = "";
	$order_by = "DEFAULT";
}
echo "Order by: $order_by\n\n";
// Define the query:
$q  = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users" . $order_clause;
$r = @mysqli_query($dbc, $q);

// Table header:
echo 	'<table aligh="center" cellspacing="0" cellpadding="5" width="75%"
			<tr>
				<td align="left"><b>Edit</b></td>
				<td align="left"><b>Delete</b></td>
				<td align="left"><b><a href="vqg-edit_user.php?sort=ln">Last Name</a></b></td>
				<td align="left"><b><a href="vqg-edit_user.php?sort=fn">First Name</a></b></td>
				<td align="left"><b><a href="vqg-edit_user.php?sort=rd">Date Registered</a></b></td>
			</tr>
		';

// Fetch and print all the records...
$bg = '#eeeeee'; // Set the initial background color.
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee');
	echo '<tr bgcolor="' . $bg . '">
		<td align="left"><a href="vqg-edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
		<td align="left"><a href="vqg-delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
		<td align="left">' . $row['last_name'] . '</td>
		<td align="left">' . $row['first_name'] . '</td>
		<td align="left">' . $row['dr'] . '</td>
	</tr>
	';
} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($dbc);

// Make the links to other pages, if necessary.
if ($pages > 1) {
	// Add some spacing and start a paragraph:
	echo '<br /><p>';
	// Determine what page the script is on:
	$current_page = ($start / $display) + 1;
	// If it's not the first page, make a Previous link:
	if ($current_page != 1) {
		echo '<a href="vqg-view_users.php?s=' . ($start - $display) . '&p' . $pages .  '&sort=' . $sort . '">Previous</a> ';
	}

	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="vqg-view_users.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">'. $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.

	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
			echo '<a href="vqg-view_users.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a> ';
	} 

	echo '</p>'; // Close the paragraph.

} // End of links section.

include ('includes/footer.html');
?>
