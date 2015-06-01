<?php  
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
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

    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#submit").click(function(){
                    var db = $("#database").val();
                    $.ajax({
                        url: "db.php",
                        type: "POST", 
                        data: {db : db},
                        dataType : 'json',
                        success: function(data) { 
                            console.log(data.rtr);
                        },
                        error: function() {
                            console.log("nonono");                                                            
                        }
                    });
                });
            });
        </script>

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
                                Accueil <small>Phpmyadmin</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Accueil
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> Bienvenue sur votre interface Phpmyadmin!
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->  
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Serveur de base de données</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <span class="badge">
                                                <?php
                                                echo mysqli_get_host_info($connect);
                                                ?>
                                            </span>
                                            <i class="fa fa-fw fa-calendar"></i> Serveur
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge">
                                                <?php
                                                echo "MySQL";
                                                ?>
                                            </span>
                                            <i class="fa fa-fw fa-comment"></i> Type de serveur
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge">
                                                <?php
                                                echo mysqli_get_server_info($connect);
                                                ?>
                                            </span>
                                            <i class="fa fa-fw fa-truck"></i> Version du serveur
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge">
                                                <?php
                                                echo mysqli_get_proto_info($connect);
                                                ?>
                                            </span>
                                            <i class="fa fa-fw fa-money"></i> Version du protocole
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge">
                                                <?php
                                                echo $_SESSION['user'] . "@" . $_SESSION['server'];
                                                ?>
                                            </span>
                                            <i class="fa fa-fw fa-user"></i> Utilisateur 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Ajouter une Nouvelle Base de donnees :</h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form">
                                        <div class=" col-lg-10 form-group">
                                            <br>
                                            <label class="pull-right" for="comment"><i class="fa fa-exclamation-triangle"></i> Uniquement Alphanumerique et "_" ou "-"</label>
                                            <br>
                                            <br>
                                            <input class="form-control" type="text" id="database" />
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-success btn-md" id="submit">Ajouter</button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
