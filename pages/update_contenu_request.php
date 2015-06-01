<?php
	session_start();
	require_once '../check_session/connect_mysql.php';
	require_once '../check_session/needAuth.php';
	mysqli_select_db($connect, $_GET['db']);

	$requete = $_GET['requete'];
	$tb = $_GET['tb'];
    $query = "SELECT * FROM $tb";
    $result = mysqli_query($connect, $query);
    if (!$result) {
       echo "ERROR";
       exit;
    }
    $result_table = mysqli_query($connect, $query);
    $i = 0;
    while ($data = mysqli_fetch_array($result_table))
       $i++;
    if ($i != 0)
    {
        $tab_title = array_keys(mysqli_fetch_array(mysqli_query($connect, $query)));
    }

	$sql = "UPDATE $tb SET ";

	for ($i = 1; isset($tab_title[$i]); $i+=2)
	{
		if (!empty($_POST['value' . $i]))
			if ($i != 1)
				$sql .= ", " . $tab_title[$i] . " = " . "\"" . $_POST['value' . $i] . "\"";
			else
				$sql .= $tab_title[$i] . " = " . "\"" . $_POST['value' . $i] . "\"";
	}

	$sql .= $requete;
	echo $sql;
?>