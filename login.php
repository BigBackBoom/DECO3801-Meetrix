<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meetrix Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
    <!--nav bar-->
    <div id ="profile_header">
      <div class="Container">
        <div id="app_name">
          <a class="name" href="#">Meetrix</a>
        </div>
        <div id="account_nav">
          <ul class="account_nav">
            <li class="account_nav"><a href="#" class="account">Profile</a></li>
            <li class="account_nav"><a href="#" class="account">Setting</a></li>
            <li class="account_nav"><a href="#" class="account">Help</a></li>
          <ul>
        </div>
      </div>
    </div>
    <!--end of nav bar-->
    <!--start of container-->
    <div class="Container">
      <br />
      <br />
      <!--start of content-->
      <div class="content">
      <table width="100%" border="0" cellspacing="0">
        <tr>
          <td width="75%">
            <div class="heading">
            <h1><img width="100px" src="img/logo1.png" /> Welcome to Meetrix</h1>
            <br />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Proin mattis porttitor pellentesque. Donec aliquam porta suscipit. 
             Proin eu nibh mauris. Aenean quis odio varius, venenatis sem ac, 
             rutrum magna. Donec rutrum lectus odio. Donec tempus faucibus nibh 
             sit amet volutpat. Sed porta sollicitudin nibh, sed venenatis mauris 
             imperdiet et. Nulla lacinia, nisl eget aliquet rutrum, lorem arcu aliquam 
             libero, eget auctor enim erat nec nibh. Quisque gravida erat ut nulla dapibus, 
             sit amet pretium risus luctus. Nam lacus mi, aliquam scelerisque sagittis sodales, 
             ultrices a nisi. Sed quis imperdiet augue. Vestibulum venenatis, mi ut fermentum aliquet, 
             odio erat consequat purus, id scelerisque massa tellus eget lacus. Quisque posuere magna 
             accumsan pretium egestas. Integer sit amet volutpat diam. Class aptent taciti sociosqu ad 
             litora torquent per conubia nostra, per inceptos himenaeos.</p>
            </div>
            <br />
            <br />
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="img/1.jpg" alt="title1">
                </div>
                <div class="item">
                  <img src="img/2.jpg" alt="title2">
                </div>
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
          </td>
          <td width="25%">
            <br />
            <!--start of login_register-->
            <div class="login_register">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                <li><a href="#register" role="tab" data-toggle="tab">Register</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!--start of login form-->
                <div class="tab-pane active" id="login">
                  <form role="form">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                <!--end of login form-->
                </div>
                <!--start of register form-->
                <div class="tab-pane" id="register">
                  <form role="form">
                    <div class="form-group">
                      <label for="username">First Name</label>
                      <input type="text" class="form-control" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                      <label for="username">Last Name</label>
                      <input type="text" class="form-control" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="password">Confirmed Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmed Password">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                <!--end of register form-->
                </div>
              <!--end of tab panes-->  
              </div>
            <!--end of login_register-->
            </div>
          </td>
        </tr>
      </table>
      <!--end of content-->
      </div>
      <br />
      <br />
      <!--start of footer-->
      <div class="footer">
        <table  width="100%" border="0" cellspacing="0">
          <tr>
            <td align="left" class="footer-link" width="1%"> 
              <a href="#">About </a>
            </td>
            <td align="left" class="footer-link" width="1%">
              <a href="#">Help</a>
            </td>
            <td  width="20%" align="right" class="footer-link">
              <a href="#">@2014 Meetrix</a>
            </td>
          </tr>
        </table>
      <!--end of footer-->
      </div>
      <br />
    <!-- end of container-->
    </div>

  </body>
</html>