<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if(strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") || strpos($_SERVER['HTTP_USER_AGENT'], "Android")){
    header( 'Location: sp/login.php' ) ;
  }
  $message="";
  
  if(count($_POST)>0) {
    $conn = mysql_connect("localhost","root","Menu6Rainy*guilt");
    mysql_select_db("meetrix_database",$conn);
    $result = mysql_query("SELECT * 
              FROM employee 
              WHERE username='" . $_POST["user_name"] . "' and passwordHash = '". md5($_POST["password"])."'");     
    $row  = mysql_fetch_array($result);
    
    if(is_array($row)) {
      $_SESSION["user_id"] = $row['employee_id'];
      $_SESSION["admin_level"] = $row['admin_group'];
    } else {
      $message = "Invalid Username or Password!";
    }
  }
  if(isset($_SESSION["user_id"])) {
    header("Location:index.php");
  }
?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meetrix Login</title>
    <!-- default css -->
    <link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
    <!-- Bootstrap -->
    <link href="css/b.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--Google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Load the AJAX API-->
    

  </head>
  <body>
    <!--sidebar and content-->
    <div id="wrapper">
   <!--sidebar-->
        <div id="sidebar-wrapper">
            <!--logo-->
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="img/logo.jpg" ></a>
            </div>
            <ul class="sidebar-nav">
                
            </ul>
        </div>
        <!--content-->
        <div id="page-content-wrapper">
            <!--top nav bar-->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav left">
                            <h3>WELCOME TO <span style="color:green">MEETRIX</span></h3>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li>
                              <a href="index.php">HOME</a>
                          </li>
                          <li>
                              <a href="#">HELP</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="main" style="width:350px; height:450px">                   
                      <!--start of login_register-->
                      <div class="login_register">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <?php 
                            if(isset($_SESSION["error_message"])){
                              echo "<li>";
                    } else {
                      echo "<li class='active'>";
                    }
                          ?>
                          <a href="#login" role="tab" data-toggle="tab">Login</a></li>
                          <?php 
                            if(isset($_SESSION["error_message"])){
                              echo "<li class='active'>";
                    } else {
                      echo "<li>";
                    }
                          ?>
                          <a href="#register" role="tab" data-toggle="tab">Register</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <!--start of login form-->
                          <?php 
                            if(isset($_SESSION["error_message"])){
                              echo "<div class='tab-pane' id='login'>";
                    } else {
                      echo "<div class='tab-pane active' id='login'>";
                    }
                          ?>
                            <form role="form" name="form1" method="post" action="">
                              
                  <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="user_name" class="form-control" id="exampleInputUsername1" placeholder="Enter username">
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              </div>
                              <button type="submit" name="Submit" class="btn btn-default">Login</button>
                            </form>
                          <!--end of login form-->
                          </div>
                          <!--start of register form-->
                          <?php 
                            if(isset($_SESSION["error_message"])){
                              echo "<div class='tab-pane active' id='register'>";
                    } else {
                      echo "<div class='tab-pane' id='register'>";
                    }
                          ?>
                            <?php 
                              if(isset($_SESSION["error_message"])) {
                                echo "<span style='color: red;'>";
                                echo $_SESSION["error_message"]; 
                      echo "</span>";
                      unset($_SESSION["error_message"]);
                      } 
                            ?>
                            <form role="form" action="php/register.php" method="post">
                              <div class="form-group">
                                <label for="username">User ID</label>
                                <input type="text" class="form-control" name="userId" placeholder="Enter userID">
                              </div>
                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter username">
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                              <div class="form-group">
                                <label for="password">Confirmed Password</label>
                                <input type="password" class="form-control" name="c_password" placeholder="Confirmed Password">
                              </div>
                              <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                          <!--end of register form-->
                          </div>
                        <!--end of tab panes-->  
                        </div>
                      <!--end of login_register-->
                      </div>
            </div>
        </div>
    </div>

  </body>
</html>