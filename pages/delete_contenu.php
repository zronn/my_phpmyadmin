<?php
	session_start();
	require_once '../check_session/connect_mysql.php';
	require_once '../check_session/needAuth.php';
	mysqli_select_db($connect, $_GET['db']);

	$query = $_GET['query'];
	$result = mysqli_query($connect, $query);
	if (!$result)
	{
		header("Location: affiche_contenu.php?db=" . $_GET['db'] . "&tb=". $_GET['tb'] . "&error=" . mysqli_error($connect));
		exit();
	}
	else
	{
		header("Location: affiche_contenu.php?db=" . $_GET['db'] . "&tb=". $_GET['tb'] . "&success=Champs supprimé avec succés!");
		exit();
	}
?>