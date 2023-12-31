<?php
session_start();
include 'config/db_connector.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SEO -->
    <meta name="description" content=" Council Queue System">
    <meta name="author" content="Ruben Faraj">
    <link rel="icon" href="favicon.ico">
    <title>Queue App System</title>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- Custom styles for the queue App
         <link href="css/navbar-fixed-top.css" rel="stylesheet"> -->
    <link href="css/site.min.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body onload="startTime()">
    <!--=============Navbars ================= -->
    <div class="navbar">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Queue CAA</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">HOME</a></li>
                        <li><a href="add.php">ADD</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    echo $_SESSION['username'];
                                } else {
                                    echo 'Username';
                                }
                                ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="admin.php">Profile</a></li>
                                <li><a href="#">Setting</a></li>
                                <li><a href="#">Edit Account</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>
                            <center>Очередь
                                <span id="txt"> </span> <?php echo date("d/m/Y"); ?>
                            </center>
                        </strong>
                    </div>
                    <div class="panel-body" id="mainqueue">
                    </div>
                </div>
            </div><!--/Add new Record  -->


            <!-- Display list Of Customer in the queue  -->
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>
                            <center>Мой список
                                <span id="txt"> </span> <?php echo date("d/m/Y"); ?>
                            </center>
                        </strong>
                    </div>
                    <div class="panel-body" id="adminqueue">
                        <?php
                        require('lib/queued-today-admin.php');
                        ?>
                    </div><!--/.panel-body -->
                </div> <!--/.panel panel-info   -->
            </div><!-- /.col-md-7 -->


        </div> <!--/.row   -->

    </div><!-- /container -->

    <!-- Bootstrap core JavaScripts ============= -->
    <!-- pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"> <\ / script > ')
    </script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
   <script type="text/javascript" src="jquery.js"></script>
   <script type="text/javascript">
      refreshTables();
      setInterval(refreshTables, 3000);
      var inRequest = false;
      function refreshTables() {
         $('#mainqueue').load('lib/queued-today.php');     
      }
   </script>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        /* control checkbox for type of customers, one type selected at a time */
        $(':checkbox').on('change', function() {
            var th = $(this),
                name = th.prop('name');
            if (th.is(':checked')) {
                $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
            }
        });
    </script>
</body>

</html>