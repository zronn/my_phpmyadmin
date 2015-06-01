<?php
	if (empty($_SESSION['user']))
	{
		header("Location: ../index.php");
		exit;
	}
	else
	{
		$connect = mysqli_connect($_SESSION['server'],$_SESSION['user'], $_SESSION['password']) or die ('Erreur : '.mysqli_error());
		if (mysqli_connect_error())
		{
			header("Location: ../index.php?statut=ERROR");
		}
	}	
?>