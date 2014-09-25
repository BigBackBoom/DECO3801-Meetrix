<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Agenda</title>
  	<link rel="stylesheet" href="css/style.css">
    <style>
      #container { width: 1020px; }
      #container h4 { text-align: center; margin: 0; margin-bottom: 5px; }
      .main-header {margin-left: 15px;}
      .resizable { background-position: top left; width: 1000px; height: 100px; background:#99CCFF;}
      #resizable1 { background-position: top left; width: 1000px; height: 180px; background:#FF99FF;}
      #resizable2 { background-position: top left; width: 1000px; height: 200px; background:#99FF99; }
      #resizable3 { background-position: top left; width: 1000px; height: 150px; background:#FFCC66; }
      #resizable,#resizable1,#resizable2,#resizable3, #container { padding: 0.5em; margin-left: auto; margin-right: auto;}
    </style>
    <script>
      $(function() {
        $( "#resizable" ).resizable({
          containment: "#container"
        });
      });
    </script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!--draggable jquery-->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <style>
      #sortMe { list-style-type: none; margin: 0; padding: 0; width: 60%; }
      #sortMe li { margin: 13px 13px 13px 13px; padding: 0.4em; font-size: 1.4em; }
      #sortMe li span { position: absolute; }
    </style>
    <script src='js/custom.js'></script>
    <!--Resizable-->
    <style>
      .resizable { width: 1000px; height: 150px; padding: 5px; }
      .resizable h3 { text-align: center; margin: 0; }
    </style>
    <script>
      $(function() {
        $( ".resizable" ).resizable({          
          maxHeight: 250,
          maxWidth: 1000,
          minHeight: 150,
          minWidth: 1000
        });
      });
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Load the AJAX API-->      
  </head>

  <body>
    <!--Header on top of the page where all user account setting navigation should be done-->
    <div id ="profile_header">
      <!-- Meetrix typography div-->
      <div id="app_name"> 
        <a class="name" href="index.php">Meetrix</a>
      </div>
      <!--Account navigation bars-->
      <div id="account_nav">
        <ul class="account_nav">
          <li class="account_nav"><a href="#" class="account">Profile</a></li>
          <li class="account_nav"><a href="#" class="account">Setting</a></li>
          <li class="account_nav"><a href="#" class="account">Help</a></li>
        <ul>
      </div>
    </div>
    <!--main contents comes inside here-->
    <div id ="contents">
      <!--left side of the contents such as icon and navigation bar-->
      <div id ="left">
        <!--icon img-->
        <div id="icon">
          <img class="logo" src="img/testlogo2.png"/>
        </div>
        <!--navigation bars-->
        <div id="navigation">
          <ul class="navigation">
            <li class="navigation"><p class="nav_man">Meetings</p></li>
              <ul class="sub_navigation">
                <li class="sub_navigation"><p class="sub_nav_man">View Meetings</p></li>
                <li class="sub_navigation"><p class="sub_nav_man">Create Meeting</p></li>
                <li class="sub_navigation"><p class="sub_nav_man">Delete Meeting</p></li>
              </ul>
            <li class="navigation"><p class="nav_man">Groups</p></li>
              <ul class="sub_navigation">
                <li class="sub_navigation"><p class="sub_nav_man">View Groups</p></li>
                <li class="sub_navigation"><p class="sub_nav_man">Create Group</p></li>
                <li class="sub_navigation"><p class="sub_nav_man">Delete Group</p></li>
              </ul>
          </ul>
        </div>
      </div>
      <!--Main contents comes in side here please edit or enter contents in here-->
      <div id="main">
        <h4 class="main-header">Meeting Agenda</h4>
          <ul id="sortMe">
          <?php            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="Menu6Rainy*guilt";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'meetrix_database';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT * FROM `agenda`";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
              $Title=$cdrow["title"];
              $Contents=$cdrow["content"];
              $Order=$cdrow["agenda_order"];
              $it= 'item-'.$Order;
              echo "<li id=\"$it\">";
              echo "<div class=\"resizable\">";
              echo "<h4>$Title</h4>";
              echo "$Contents";
              echo "</div>";
              echo "</li>";            
            }
                
          ?>
        </ul>                               
      </div>
      <!--Main contents ends here-->
    </div>
  </body>
</html>