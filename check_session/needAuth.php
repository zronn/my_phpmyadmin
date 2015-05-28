<?php
	// last request was more than 60 minutes ago
	if (isset($_SESSION['LAST_ACTIVITY'])
	&& is_numeric($_SESSION['LAST_ACTIVITY'])
	&& (time() - $_SESSION['LAST_ACTIVITY'] > 3600))
	{
		session_destroy();
		session_unset();
		header("Location: ../index.php");
		exit;
	}		
?>