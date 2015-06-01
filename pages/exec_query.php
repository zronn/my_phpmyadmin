<?php
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
if ((isset($_POST['db'])) && (!empty($_POST['db'])))
	mysqli_select_db($connect, $_POST['db']);
if ((isset($_POST['query'])) && (!empty($_POST['query'])))
{

	$ex = explode(" ", $_POST['query']);

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
			$reponse = array('result' => "<ol class='breadcrumb' style='background: rgba(255, 112, 112, 1);'>
                                        <li>
                                            <i class='fa fa-remove'></i> MySQL error : $error
                                        </li>
                                    </ol>");
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
		{
			$tab = array();
			while($res = mysqli_fetch_assoc($query))
			{
				array_push($tab, $res);
			}

			$reponse = array('result' => "<ol class='breadcrumb' style='background: rgba(112, 255, 141, 1);'>
                                        <li>
                                            <i class='fa fa-check'></i>Traitement de la requette en :  $time
                                        </li>
                                    </ol>", 'tab' => $tab);
		}
	}

	echo json_encode($reponse);
}	

?>