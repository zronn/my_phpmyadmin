<?php
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
if ((isset($_POST['db'])) && (!empty($_POST['db'])))
	mysqli_select_db($connect, $_POST['db']);
if ((isset($_POST['query'])) && (!empty($_POST['query'])))
{

	$ex = explode(" ", $query);

	if (strtolower($ex[0]) != "select")
	{
		$query;
		$sql = $_POST['query'];
		$msc = microtime(true);
		$query = mysqli_query($connect, $sql);
		$msc = microtime(true)-$msc;
		$time = ($msc * 1000) . ' ms';
		if (!$query)
		{
			$error = mysqli_error($connect);
			$reponse = array('result' => "SQL error : $error");
		}
		else
			$reponse = array('result' => "Requette Sql Ok -> Traitement en $time");
	}
	else
	{
		$query;
		$sql = $_POST['query'];
		$msc = microtime(true);
		$query = mysqli_query($connect, $sql);
		$msc = microtime(true)-$msc;
		$time = ($msc * 1000) . ' ms';
		if (!$query)
		{
			$error = mysqli_error($connect);
			$reponse = array('result' => "SQL error : $error");
		}
		else
			$reponse = array('result' => "Requette Sql Ok -> Traitement en $time");

	}





	
	echo json_encode($reponse);

}	

?>