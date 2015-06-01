<?php
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
if ((isset($_GET['db'])) && (!empty($_GET['db'])))
{
	$db = $_GET['db'];
	$sql = "DROP DATABASE $db";
	$res = mysqli_query($connect, $sql);
	if (!$res)
	{
		$error = mysqli_error($connect);
		header('Location: index.php?error='.$error);		
	}
	else
	{
		$ok = "Base de donne bien supprimer.";
		header('Location: index.php?ok='.$ok);
	}
}
?>