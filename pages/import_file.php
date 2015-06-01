<?php
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
if (isset($_FILES['file'])) {

	mysqli_select_db($connect, $_SESSION['db']) or die('Error selecting MySQL database: ' . mysqli_error());

// Temporary variable, used to store current query
	$templine = '';
// Read in entire file
	$lines = file($_FILES['file']['name']);
// Loop through each line
	foreach ($lines as $line)
	{
// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

// Add this line to the current segment
		$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
    // Perform the query
			mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
			$templine = '';
		}
	}
	echo "Tables imported successfully";

}

?>