<?php
	session_start();
	require_once '../check_session/connect_mysql.php';
	require_once '../check_session/needAuth.php';
	mysqli_select_db($connect, $_GET['db']);

	$tb = $_GET['tb'];

	$query = "CREATE TABLE " . $tb . " (";
	for ($i = 0; $i < $_GET['col'] - 1; $i++)
		{
			$nom = $_POST['nom' . $i];
			$type = $_POST['type' . $i];
			if (empty($_POST['valeur' . $i]))
				$valeur = 50;
			else
				$valeur = $_POST['valeur' . $i];
			if (!empty($_POST['null' . $i]))
				$null = $_POST['null' . $i];
			else
				$null = '';
			$index = $_POST['index' . $i];
			if (!empty($_POST['auto' . $i]))
				$auto = $_POST['auto' . $i];
			else
				$auto = '';

			$query .= $nom . " " . $type . "(" . $valeur . ") " . $auto . " " . $index . " " . $null . ", ";
		}

	$nom = $_POST['nom' . $i];
	$type = $_POST['type' . $i];
	if (empty($_POST['valeur' . $i]))
		$valeur = 50;
	else
		$valeur = $_POST['valeur' . $i];
	if (!empty($_POST['null' . $i]))
		$null = $_POST['null' . $i];
	else
		$null = '';
	$index = $_POST['index' . $i];
	if (!empty($_POST['auto' . $i]))
		$auto = $_POST['auto' . $i];
	else
		$auto = '';

	$query .= $nom . " " . $type . "(" . $valeur . ") " . $auto . " " . $index . " " . $null . ")";

	$result = mysqli_query($connect, $query);
	if (!$result)
	{
		header("Location: affiche_table.php?db=" . $_GET['db'] . "&error=" . mysqli_error($connect));
		exit();
	}
	else
	{
		header("Location: affiche_table.php?db=" . $_GET['db'] . "&success=La table " . $tb . " a été créee avec succés!");
		exit();
	}
?>