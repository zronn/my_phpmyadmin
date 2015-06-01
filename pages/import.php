<?php  
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
if ((isset($_GET['db'])) && (!empty($_GET['db']))) {
    $_SESSION['db'] = $_GET['db'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="my_phpmyadmin">
    <meta name="author" content="belhad_b mazouz_r gentier_r">

    <title>My_PhpMyAdmin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- fichier css de base -->
    <link href="../css/import.css" rel="stylesheet" type="text/css">

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
                    <div class="row"><p align="center" id="resSql"></p></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                SQL <small>FILES</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    Import de Fichier SQL 
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-file-code-o fa-fw"></i> Importer vos fichier SQL en cliquant sur le button ci-dessus :</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-6">

                                        <form enctype="multipart/form-data" action="import_file.php" method="post">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                                            
                                            <label for="file">( exemple.sql )</label>
                                            <input type="file" title="Importer depuis votre PC" name="file" />
                                            
                                            <br>                                            
                                            <input type="submit" value="Envoyer le fichier" />
                                        </form>

                                    </div>
                                    <div class="col-lg-3">
                                    </div>
                                </div>
                                                                 <div class="panel-body">

                                <?php
                                if (isset($connect))
                                {
                                  $query = "show databases";
                                  $result = mysqli_query($connect, $query);
                                  if (!$result)
                                  {
                                    echo "ERROR";
                                }
                                while ($data = mysqli_fetch_row($result))
                                {
                                    echo "<ul class='pagination'>";
                                    echo "<li>";
                                    echo "<a href='import.php?db=" . $data[0] . "'><i class='fa fa-fw fa-times-circle'></i> " . $data[0] ."</a>";
                                    echo "</li>";
                                    echo "</ul>";
                                }  
                            }
                            ?>                               
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-1">
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

        <!-- Boostrap-File-input -->
        <script src="../js/bfi.js"></script>

        <script type="text/javascript">
            $('input[type=file]').bootstrapFileInput();
            $('.file-inputs').bootstrapFileInput();
        </script>
    </body>

    </html>
