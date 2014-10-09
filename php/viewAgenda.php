<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Agenda</title>
  	<link rel="stylesheet" href="css/style.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->    
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script src="js/sortable.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!--Resizable-->
    <script src="js/resizable.js"></script>
  
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
        <h4>Meeting Agenda</h4>
        <ul id="sortable">
          <?php
            $con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
            $result = mysqli_query($con,"select * from agenda where meeting_id=1 order by agenda_order");
            while($row=mysqli_fetch_array($result)){
              $order=$row['agenda_order'];
              $value=$row['content'];
              $duration=$row['duration'] * 5;
              $agenda_item=$row['id'];
              echo "<li id='item_$order' data-id='".$agenda_item."'><div style=\"display:block; height:".$duration."px;\" class=\"resizable\">".$value."</div></li>";
            }
          //foreach($items as $key => $value) echo "<li id='item_$value'>".$value."</li>"; 
          ?>
        </ul>
        <button id="save_position">save position</button>
        <button id="save_height">save height</button>                         
      </div>
      <!--Main contents ends here-->
    </div>
  </body>
</html>