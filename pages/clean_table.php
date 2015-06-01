<?php
  session_start();
  require_once '../check_session/connect_mysql.php';
  require_once '../check_session/needAuth.php';
  mysqli_select_db($connect, $_GET['db']);

  $tb = $_GET['tb'];
  $query = "DELETE FROM $tb";
  $result = mysqli_query($connect, $query);
  if (!$result)
  {
  	header("Location: affiche_table.php?db=" . $_GET['db'] . "&error=" . mysqli_error($connect));
  	exit();
  }
  else
  {
  	header("Location: affiche_table.php?db=" . $_GET['db']);
    exit();
  }
?>