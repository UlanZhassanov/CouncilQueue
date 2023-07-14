<?php
/*
    *index.php 
    * Uses lib/create.php server side script to store customer Details 
    * Uses lib/ReadMe.php to Display current customers in the queue
    * Uses lib/delete.php to remove customer in the queue 
    * Author Ruben Faraj 
    * Email: Reben_f@hotmail.co.uk 
    * Date : 14-05-2017 
    
    */
include 'config/db_connector.php';
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

<body>
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
                  <li class="active"><a href="admin.php">Admin Page</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-sm-10 center">
            <div class="panel panel-info">
               <div class="panel-heading">
                  <h2 class="panel-title"><strong>Добавить в очередь</strong></h2>
               </div>
               <div class="panel-body">
                  <!-- form here where the customer information will be entered -->
                  <form name="myForm" action="lib/create.php" method="post">
                     <label>Образовательная программа</label>
                     <label class="control control--radio">
                        В095 Транспортные услуги
                        <input type="radio" value="В095 Транспортные услуги" name="service" required />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        В067 Воздушный транспорт и технологии
                        <input type="radio" value="В067 Воздушный транспорт и технологии" name="service" />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        В167 Летная эксплуатация летательных аппаратов и двигателей
                        <input type="radio" value="В167 Летная эксплуатация летательных аппаратов и двигателей" name="service" />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        М105 Авиационная техника и технологии (магистратура)
                        <input type="radio" value="М105 Авиационная техника и технологии (магистратура)" name="service" />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        М106 Летная эксплуатация летательных аппаратов и двигателей (магистратура)
                        <input type="radio" value="М106 Летная эксплуатация летательных аппаратов и двигателей (магистратура)" name="service" />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        М151 Транспортные услуги (магистратура)
                        <input type="radio" value="М151 Транспортные услуги (магистратура)" name="service" />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        D105 Авиационная техника и технологии (докторантура)
                        <input type="radio" value="D105 Авиационная техника и технологии (докторантура)" name="service" />
                        <div class="control__indicator"></div>
                     </label>
                     <hr>
                     <label>На базе</label>
                     <label class="control control--radio">
                        На базе общего среднего образования (11 классов)
                        <input type="radio" value="На базе общего среднего образования (11 классов)" name="type" required />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        На базе ТиПО (после колледжа)
                        <input type="radio" value="На базе ТиПО (после колледжа)" name="type" />
                        <div class="control__indicator"></div>
                     </label>
                     <label class="control control--radio">
                        На базе высшего образования (второе высшее)
                        <input type="radio" value="На базе высшего образования (второе высшее)" name="type" />
                        <div class="control__indicator"></div>
                     </label>
                     <hr>
                     <br />
                     <label>Фамилия</label>
                     <input type='text' name='firstname' class='form-control input' placeholder='Фамилия абитуриента' required />
                     <label>Имя</label>
                     <input type='text' name='lastname' class='form-control' placeholder='Имя абитуриента' required />
                     <button type='submit' class='btn btn-info glyphicon glyphicon-floppy-save'> Добавить </button>
                     <button type='reset' class='btn btn-danger glyphicon glyphicon-remove-sign'> Отмена </button>
                  </form><!-- /.form-->
               </div>
            </div>
         </div><!--/Add new Record  -->
      </div> <!--/.row   -->

   </div><!-- /container -->

   <!-- Bootstrap core JavaScripts ============= -->
   <!-- pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script>
      window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
   </script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>