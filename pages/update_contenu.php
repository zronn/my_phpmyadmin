<?php  
  session_start();
  require_once '../check_session/connect_mysql.php';
  require_once '../check_session/needAuth.php';
    if (isset($_GET['db']))
    {
        $db = $_GET['db'];
        mysqli_select_db($connect, $_GET['db']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My_PhpMyAdmin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include("navig.php");
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tables
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Accueil</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i>
                                <?php
                                    echo "<a href='affiche_table.php?db=" . $_GET['db'] . "'> Table</a>";
                                ?>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Modification de la ligne choisie
                            </li>
                            <?php echo "<a href=\"sql.php?db=$db\">"?>
                            <button class="btn btn-info btn-xs pull-right">
                                <i class="fa fa-code"></i> SQL
                            </button>
                            <?php echo "</a>"?>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Modification d'une ligne dans <?php echo $_GET['tb']; ?></h2>
                        <?php
                            if (isset($_GET['success']))
                                echo "<ol class='breadcrumb' style='background: rgba(112, 255, 141, 1);'>
                                        <li>
                                            <i class='fa fa-check'></i> " . $_GET['success'] ."
                                        </li>
                                    </ol>";
                            else if (isset($_GET['error']))
                                echo "<ol class='breadcrumb' style='background: rgba(255, 112, 112, 1);'>
                                        <li>
                                            <i class='fa fa-remove'></i> MySQL error : " . $_GET['error'] ."
                                        </li>
                                    </ol>";

                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <?php
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
                                ?>
                                <thead>
                                    <tr style="text-align:center;">
                                        <?php 
                                            for ($j = 1; isset($tab_title[$j]); $j+=2)
                                            {
                                                echo '<th>'.$tab_title[$j].'</th>';
                                            }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        echo "<form action='update_contenu_request.php?db=" . $db . "&tb=" . $tb . "' method='POST' accept-charset='UTF-8' enctype='multipart/form-data' role='add'>";
                                    ?>
                                    <tr>
                                        <?php
                                            for ($j = 1; isset($tab_title[$j]); $j+=2)
                                                {
                                                    echo "<td><input type='text' name='value" . $j . "'></td>";
                                                }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                            <button type='submit' class='btn btn-default'>Envoyer</button><br><br>
                            </form>
                            <?php
                                }
                                else
                                {
                            ?>
                                   <span style="font-style:italic; color:green;"> MySQL a retourné un résultat vide (aucune ligne). </span><br>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <!-- Affichage tableau + scroling + search -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable();
        } );
    </script>

</body>

</html>
