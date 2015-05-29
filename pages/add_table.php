<?php
  session_start();
  require_once '../check_session/connect_mysql.php';
  require_once '../check_session/needAuth.php';
  mysqli_select_db($connect, $_GET['db']);

  $table = $_POST['tab'];
  $col = $_POST['col'];
  
  $query = "DROP TABLE $tb";
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