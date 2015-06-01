<?php
	session_start();
	require_once '../check_session/connect_mysql.php';
	require_once '../check_session/needAuth.php';
	mysqli_select_db($connect, $_GET['db']);

	$tb = $_POST['tb'];
	$nom = $_POST['nom'];
	$type = $_POST['type'];
	$valeur = $_POST['valeur'];
	$null = $_POST['null'];
	$index = $_POST['index'];
	$auto = $_POST['auto'];

	
?>