<?php  
session_start();
require_once '../check_session/connect_mysql.php';
require_once '../check_session/needAuth.php';
if(isset($_GET['db']))
    $db = $_GET['db'];
mysqli_select_db($connect, $db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="phpmyadmin">
    <meta name="author" content="belhad_b mazouz_r gentie_r etna">

    <title>My_PhpMyAdmin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var $_GET = {};
                document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
                    function decode(s) { 
                        return decodeURIComponent(s.split("+").join(" "));
                    }
                    $_GET[decode(arguments[1])] = decode(arguments[2]);
                });
                var i = 0;
                var db = $_GET["db"];
                $("#submit").click(function(){
                    var query = $("#query").val();
                    $.ajax({
                        url: "exec_query.php",
                        type: "POST", 
                        data: {query : query , db : db},
                        dataType : 'json',
                        success: function(data) { 
                            $("#resSql").html("<i>"+data.result+"</i>");
                            $("#resSql").css("color","red");
                            if (typeof data.res != 'undefined')
                            {
                                console.log(data.res.rtr);                              
/*                                while (typeof data.res.i != 'undefined')
                                {
                                    console.log(data.res.i);
                                    i++;
                                }
*/                           
                             }
                        },
                        error: function(data) {
                            $("#resSql").html("</i>"+data.result+"</i>"); 
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
                            SQL <small>Code</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                Votre requette seras executer sur la base de donnees : <?php echo strtoupper($db); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row"><p align="center" id="resSql"></p></div>
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-keyboard-o fa-fw"></i> Saisir votre requette sql dans la fenetre ci-dessous :</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label class="pull-right" for="comment"><i class="fa fa-exclamation-triangle"></i> Respecter la Syntaxe Sql.</label>
                                        <br>
                                        <textarea class="form-control" rows="7" id="query"></textarea>
                                    </div>

                                    <br>
                                </form>
                                <div class="text-center">
                                    <button class="btn btn-success" id="submit">Executer</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
                <div class="row">
                   <div class="col-lg-1">
                   </div>
                   <div id="datares" class="col-lg-10">

                   </div>
                   <div class="col-lg-1">
                   </div>    
               </div>
           </div>
       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->

   <!-- jQuery -->
   <script src="../js/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.min.js"></script>

   <!-- Morris Charts JavaScript -->
   <script src="../js/plugins/morris/raphael.min.js"></script>
   <script src="../js/plugins/morris/morris.min.js"></script>
   <script src="../js/plugins/morris/morris-data.js"></script>
</body>

</html>
