<!DOCTYPE html>
<html>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
    	<script type="text/javascript" src="js/scheduler.js"></script>

   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<!-- tablest css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">

    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
  	<?php
  		session_start();
  		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='meeting'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		$userId = $_SESSION["user_id"];
		$st = $pdo->query("SELECT `meeting`.*
					FROM `meeting`
					INNER JOIN `meeting_group` ON `meeting`.meeting_id=`meeting_group`.meeting_id
					INNER JOIN `group_employee` ON `meeting_group`.group_id=`group_employee`.group_id
					WHERE `group_employee`.employee_id=$userId;");
		
		$posts = $st->fetchAll();
		
  	?>
	<body onload="drawChart_at_home()">
		<!--Header on top of the page where all user account setting navigation should be done-->
		<div id ="profile_header">
			<!-- Meetrix typography div-->
			<div id="app_name"> 
				<a class="name" href="#">Meetrix</a>
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
					<img class="logo" src="img/logo.png"/>
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
			<div id="main" style="height: 700px;">
				<h2>Manage Meeting</h2>
				<hr>
				<div id="meetingLists">
					<table style="width:90%; text-align: center;" class="manTable" >
						<tr style="background-color: rgba(150,150,150,1);">
						    <th style="text-align: center;"><strong>Meeting ID</strong></th>
						    <th style="text-align: center;"><strong>Meeting Title</strong></th>
						    <th></th>
						    <th></th>    
						</tr>
 						 <?php
 						 	for($i = 0; $i<sizeof($posts); $i++){
		 						echo '<tr class="meetingRow">';
								echo '<td class="meetingRow">' .$posts[$i]['meeting_id']. '</td>';
		    					echo '<td class="meetingRow">' .$posts[$i]['name']. '</td>';
								echo '<td class="meetingRow"><button type="button" onclick="redirect_edit(' .$posts[$i]['meeting_id']. ')">Edit</button></td>' ;
								echo '<td class="meetingRow"><button type="button" onclick="redirect_delete(' .$posts[$i]['meeting_id']. ')">Delete</button></td>';
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