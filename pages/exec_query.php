<?php
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';

$res = FALSE;
if ((isset($_POST['query'])) && (!empty($_POST['query'])))
{
	$sql = $_POST['query'];
	if (mysqli_query($connect, $sql) === TRUE)
		$res = TRUE;
	else
		$res = FALSE;

	if ($res === TRUE)
		$reponse = array("ok" => "ok");
	else
		$reponse = array("ko" => "ko");

	echo json_encode($reponse);
}	

?>