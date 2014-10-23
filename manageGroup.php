<!DOCTYPE html>
<html>
	<?php 
		if(strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") || strpos($_SERVER['HTTP_USER_AGENT'], "Android")){
			header( 'Location: sp/index.php' ) ;
		}
		session_start();
		if(!isset($_SESSION["user_id"])) {
			header("Location:login.php");
		}
	?>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
    	<script type="text/javascript" src="js/scheduler.js"></script>
		<script type="text/javascript" src="js/scheduler1.js"></script>

   		<meta charset="utf-8">
   		<!-- default css -->
        <link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
    	<!-- Bootstrap -->
    	<link href="css/b.min.css" rel="stylesheet">
    	<!-- tablest css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>


    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
  	<?php
  		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='group'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		$userId = $_SESSION["user_id"];
		$st = $pdo->query("SELECT `group`.*
					FROM `group`
					WHERE `group`.creator_id=$userId;");
		
		$posts = $st->fetchAll();
		
  	?>
	<body onload="drawChart_at_home()">
		<!--sidebar and content-->
        <div id="wrapper">
             <!--sidebar-->
            <div id="sidebar-wrapper">
                <!--logo-->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="img/logo.jpg" ></a>
                </div>
                <ul class="sidebar-nav">                                      
                    <?php 
                        if($_SESSION['admin_level'] == 1){
                            echo "<li class=\"sidebar-content\"><a href=\"createMeeting.php\"><span class=\"glyphicon glyphicon-plus\"></span>CREATE MEETING</a></li>";
                            echo "<li class=\"sidebar-content\"><a href=\"manageMeeting.php\"><span class=\"glyphicon glyphicon-plus\"></span>MANAGE MEETING</a></li>";
                        }
                    ?>
                    <li class="sidebar-content"><a href="viewMeeting.php"><span class="glyphicon glyphicon-plus"></span>VIEW MEETING</a></li>
                    <?php 
                        if($_SESSION['admin_level'] == 1){
                            echo "<li class=\"sidebar-content\"><a href=\"createGroup.php\"><span class=\"glyphicon glyphicon-plus\"></span>CREATE GROUP</a></li>";
                            echo "<li class=\"sidebar-content\"><a href=\"manageGroup.php\"><span class=\"glyphicon glyphicon-plus\"></span>MANAGE GROUP</a></li>";
                        }
                    ?>
                    <li class="sidebar-content"><a href="viewGroups.php"><span class="glyphicon glyphicon-plus"></span>VIEW GROUP</a></li>
                </ul>
            </div>
            <!--content-->
            <div id="page-content-wrapper">
                <!--top nav bar-->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <h3>WELCOME TO <span style="color:green">MEETRIX</span></h3>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#">HELP</a>
                                </li>
                                <?php
                                    if(isset($_SESSION["user_id"])) {
                                        echo "<li><a href=\"php/logout.php\">LOGOUT</a></li>";
                                        //echo "<button type='button' class='account_nav' onclick='location.href = \"php/logout.php\";'>Logout</button>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--Main contents comes in side here please edit or enter contents in here-->
			<div id="main" style="height:650px;" <?php echo (200+(35*sizeof($posts))). "px"; ?>;">
				<h2>Manage Group</h2>
				<hr>
				<div id="meetingLists" style="height: <?php echo (200+(28*sizeof($posts))). "px"; ?>;">
					<table style="width:90%; text-align: center;" class="manTable" >
						<tr style="background-color: rgba(150,150,150,1);">
						    <th style="text-align: center;"><strong>Group ID</strong></th>
						    <th style="text-align: center;"><strong>Group Name</strong></th>
						    <th></th>
						    <th></th>    
						</tr>
 						 <?php
 						 	for($i = 0; $i<sizeof($posts); $i++){
		 						echo '<tr class="meetingRow">';
								echo '<td class="meetingRow">' .$posts[$i]['group_id']. '</td>';
		    					echo '<td class="meetingRow">' .$posts[$i]['group_name']. '</td>';
								echo '<td class="meetingRow"><button type="button" onclick="redirect_editG(' .$posts[$i]['group_id']. ')">Edit</button></td>' ;
								echo '<td class="meetingRow"><button type="button" onclick="redirect_deleteG(' .$posts[$i]['group_id']. ')">Delete</button></td>';
								echo '</tr>';
							}
						  ?>
					</table>
				</div>
			</div>
			<!--Main contents ends here-->
		</div>
	</body>
</html>