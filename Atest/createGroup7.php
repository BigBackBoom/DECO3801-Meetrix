<!DOCTYPE html>
<html>
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
			<div id="main">
			<h3>Create Groups</h3>
			<br /> 
			Group Name: <input type="text" size="30" />
			<form method="post" action="formsubmit.php">
        
        Group Members: <select name="options[]" multiple="multiple">
        
            <?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="Menu6Rainy*guilt";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'test';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT empFname FROM testtable";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["empFname"];
                echo "<option>
                    $cdTitle
                </option>";
            
            }
                
            ?>
    
        </select>
        
    </form>
			
			<br />
			<br />
			<br />
<br />
<br />
												<input type="submit" value="Create" name="create" />
                        						<input type="reset" value="Reset"/>
</div>
		
			
			</div>
										
	</body>
</html>