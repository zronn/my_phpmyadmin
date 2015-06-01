<?php  
  session_start();
  require_once '../check_session/connect_mysql.php';
  require_once '../check_session/needAuth.php';
  if (isset($_GET['db']))
  {
    $db = $_GET['db'];
    mysqli_select_db($connect, $_GET['db']);
  }
  if (isset($_GET['tb']))
  {
    $tb = $_GET['tb'];
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
                            <?php
                                echo "Insérer du contenu dans la table " . $tb;
                            ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Accueil</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i>
                                <?php
                                    echo "<a href='affiche_table.php?db=" . $db . "'> Table</a>";
                                ?>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Nouvelle ligne
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
                        <h2>Ajoutez les valeurs souhaitées :</h2>
                        <?php
                            if (isset($_GET['error']))
                            {
                                echo "<span style='font-style:italic; color:red;'> MySQL Error : " . $_GET['error'] . "</span><br><br>";
                            }
                        ?>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Type</th>
                                        <th>Taille/Valeurs</th>
                                        <th>NOT NULL</th>
                                        <th>Index</th>
                                        <th>A_I</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        echo "<form action='insert_contenu_request.php?db=" . $db . "&tb=" . $tb . "' method='POST' accept-charset='UTF-8' enctype='multipart/form-data' role='add'>";
                                    ?>
                                    
                                </tbody>
                            </table>
                            <button type='submit' class='btn btn-default'>Envoyer</button><br><br>
                            </form>
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
</body>

</html>
