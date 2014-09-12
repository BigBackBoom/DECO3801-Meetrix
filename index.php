<!DOCTYPE html>
<html>
	<?php 
		if(strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") || strpos($_SERVER['HTTP_USER_AGENT'], "Android")){
			header( 'Location: sp/index.php' ) ;
		}
	?>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
    	<script type="text/javascript">
      		// Load the Visualization API and the piechart package.
      		google.load('visualization', '1.0', {'packages':['corechart']});

      		// Set a callback to run when the Google Visualization API is loaded.
      		google.setOnLoadCallback(drawChart_at_home);
      	</script>
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
					<img class="logo" src="img/testlogo2.png"/>
				</div>
				<!--navigation bars-->
				<div id="navigation">
					<ul class="navigation">
						<li class="navigation"><p class="nav_man">Meetings</p></li>
							<ul class="sub_navigation">
								<li class="sub_navigation"><p class="sub_nav_man"><a href="viewMeeting.php">View Meetings</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man"><a href="createMeeting.php">Create Meeting</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Delete Meeting</p></li>
							</ul>
						<li class="navigation"><p class="nav_man">Groups</p></li>
							<ul class="sub_navigation">
								<li class="sub_navigation"><p class="sub_nav_man"><a href="viewGroups.php">View Groups</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man"><a href="createGroup.php">Create Group</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Delete Group</p></li>
							</ul>
					</ul>
				</div>
			</div>
			<!--Main contents comes in side here please edit or enter contents in here-->
			<div id="main">
				<h2>Recent Meeting</h2>
				<hr>
				<div class="post">
					<div class="information">
						<h3>Meetin Trick Studio Meeting 1</h3>
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
					<div id="recent" class="chart">
					</div>
				</div>
				<h2>Future Meeting</h2>
				<hr>
				<div class="post">
					<div class="information">
						<h3>Meetin Trick Studio Meeting 2</h3>
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
					<div id="future" class="chart">
						<img src="img/Placeholder.jpg" alt="future graph" height="250px" width="250px"/>
					</div>
				</div>
			</div>
			<!--Main contents ends here-->
		</div>
	</body>
</html>