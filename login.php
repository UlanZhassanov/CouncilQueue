<?php
session_start();
include 'config/db_connector.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $con->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if ($password == $result['password']) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['window'] = $result['window'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
            header('Location: admin.php');
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
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

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            text-transform: uppercase;
        }

        label {
            width: 150px;
            display: inline-block;
            text-align: left;
            font-size: 1.5rem;
        }

        input {
            border: 2px solid #ccc;
            font-size: 1.5rem;
            font-weight: 100;
            padding: 10px;
        }

        form {
            margin: 25px auto;
            padding: 20px;
            border: 5px solid #ccc;
            width: 500px;
            background: #eee;
        }

        div.form-element {
            margin: 20px 0;
        }

        button {
            padding: 10px;
            font-size: 1.5rem;
            font-weight: 100;
            background: darkblue;
            color: white;
            border: none;
        }

        p.success,
        p.error {
            color: white;
            background: yellowgreen;
            display: inline-block;
            padding: 2px 10px;
        }

        p.error {
            background: orangered;
        }
    </style>
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
                  <li class="active"><a href="admin.php">Admin Page</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
   </div>

    <form method="post" action="" name="signin-form">
        <div class="form-element">
            <label>Username</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="login" value="login">Log In</button>
    </form>
</body>

</html>