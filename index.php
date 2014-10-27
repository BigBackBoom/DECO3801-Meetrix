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
    	<script type="text/javascript">
      		// Load the Visualization API and the piechart package.
      		google.load('visualization', '1.0', {'packages':['corechart']});

      		// Set a callback to run when the Google Visualization API is loaded.
      		google.setOnLoadCallback(drawChart_at_home);
      	</script>
	<script>
		function startmeeting(url) {
			window.open(url);
		}
	</script>
   	<meta charset="utf-8">
    	<!-- tablest css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>
        <!-- default css -->
        <link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
    	<!-- Bootstrap -->
    	<link href="css/b.min.css" rel="stylesheet">
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
		$tbl_name='meeting'; // Table name
		date_default_timezone_set('Australia/Brisbane');
		$start = date("Y-m-d"). " 00:00:00";
		$end = date("Y-m-d"). " 23:59:59";
		
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		/*search meeting that user have today*/			
		$st = $pdo->query("SELECT `meeting`.* 
					FROM `meeting`
					INNER JOIN `meeting_group` ON `meeting`.meeting_id=`meeting_group`.meeting_id
					INNER JOIN `group` ON `meeting_group`.group_id=`group`.group_id
					INNER JOIN `group_employee` ON `meeting_group`.group_id=`group_employee`.group_id
					WHERE (`meeting`.date BETWEEN '$start' AND '$end') and
					(`group_employee`.employee_id=$_SESSION[user_id] or `meeting`.creator_id = $_SESSION[user_id])
					GROUP BY `meeting`.meeting_id
					ORDER BY `meeting`.date DESC
						");
		
		/*feth all data*/
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
			<div id="main" style="width:1000px;" >
				<h2>Meeting Today</h2>
				<hr style='margin-bottom: 0px;'>
				<div id="posts" style="margin-top: 10px; padding-top: 10px; ">
				<?php
					/*if at least one meeting exist*/
					if(sizeof($posts) > 0){
						foreach($posts as $post){
							/*foreach meeting, create a posts looks like sticky notes*/
							echo "<div class='post' style='background-color: rgba(253, 240, 192, 1.0)'>";
								echo "<div class='information'>";
									echo "<img style='position: relative; bottom: 15px; display: block; margin-right: auto; margin-left: auto; ' src='img/pin.png' height='32px' width='32px'/>";
									echo "<h3 style='margin-top: 0px;'>$post[name]</h3>";
									echo "<p><strong>starts: </strong> $post[date]</p>";
									echo "<p><strong>duration: </strong> $post[duration]</p>";
									echo "<strong>description: </strong></br>";
									echo "<p>$post[description]</p>";
								echo "</div>";
							echo "</div>";
						}
					} else {
						/*if there are no meeting, create a sticky note with "no meeting today" on it. */
						echo "<div class='post' style='background-color: rgba(253, 240, 192, 1.0)'>";
							echo "<div class='information'>";
								echo "<img style='position: relative; bottom: 15px; display: block; margin-right: auto; margin-left: auto; ' src='img/pin.png' height='32px' width='32px'/>";
								echo "<h3 style='margin-top: 0px;'>There are no Meetings Today</h3>";
							echo "</div>";
						echo "</div>";	
					}
					
				?>
				</div>
			</div>
			<!--Main contents ends here-->
		</div>
	</body>
</html>