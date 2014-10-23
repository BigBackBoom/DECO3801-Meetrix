<!DOCTYPE html>

<?php
	session_start();
	
	if(!isset($_SESSION["user_id"])) {
		header("Location:login.php");
	} 
?>

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
    	<!-- tablest css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>
        <meta charset="utf-8">
        <!-- default css -->
        <link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
    	<!-- Bootstrap -->
    	<link href="css/b.min.css" rel="stylesheet">
		<!--jQuery-->
    	<script src='js/scheduler.js'></script>


    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	
    	<!-- Calendar app create by MIT-->
    	<!--Copyright (c) 2013 Adam Shaw

		Permission is hereby granted, free of charge, to any person obtaining
		a copy of this software and associated documentation files (the
		"Software"), to deal in the Software without restriction, including
		without limitation the rights to use, copy, modify, merge, publish,
		distribute, sublicense, and/or sell copies of the Software, and to
		permit persons to whom the Software is furnished to do so, subject to
		the following conditions:

		The above copyright notice and this permission notice shall be
		included in all copies or substantial portions of the Software.

		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
		EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
		MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
		NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
		LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
		OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
		WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.-->
    	<link rel='stylesheet' href='css/fullcalendar/fullcalendar.css' />
    	<!--jQuery-->
    	<script src='js/jquery-1.10.2.min.js'></script>
		<script src='js/fullcalendar/lib/jquery-ui.custom.min.js'></script>
		<script src='js/fullcalendar/lib/moment.min.js'></script>
		<script src='js/fullcalendar/fullcalendar.js'></script>
		<script>
			var user_id = <?php echo $_SESSION["user_id"]; ?>; 
			$(document).ready(init_cal);
		</script>
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
				<div id="main">
					<!--Calendar app is declared here-->
					<div id='calendar'></div>
				</div>
				<!--Main contents ends here-->
			<!--end of content-->
            </div>
        <!--end of sidebar and content-->            
        </div>
	</body>
</html>