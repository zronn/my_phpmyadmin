<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="../img/logo_php.png" class="img-responsive" width="150px" alt="" /></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Mon profil</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Paramètres</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-home"></i> Accueil</a>
            </li>
            <li>
                <a href="export.php"><i class="fa fa-fw fa-send"></i> Exporter</a>
            </li>
            <li>
                <a href="import.php"><i class="fa fa-fw fa-file-code-o"></i> Importer</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Databases <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
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
                            echo "<li>";
                            echo "<a href='affiche_table.php?db=" . $data[0] . "'><i class='fa fa-fw fa-tasks'></i> " . $data[0] ."</a>";
                            echo "</li>";
                          }  
                        }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>