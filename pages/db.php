<?php
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';

if ((isset($_POST['db'])) && (!empty($_POST['db'])))
{
	$db = $_POST['db'];
	$query = "CREATE DATABASE $db";

	if (!mysqli_select_db($db))
	{
		$rtr = "Database $db a bien ete creer.";
		mysqli_query($connect, $query);
		mysqli_select_db($connect, $db);
	}
	else
		$rtr = "Desole la Database $db est deja existante";

		$res = array("rtr" => $rtr);
	
		echo json_encode($res);
}
?>