<?php
	session_start();
	if(!isset($_SESSION["user_id"])) {
	header("Location:login.php");
	} 
?>
<!DOCTYPE html>
<html>

	<head>
			<!--Load the AJAX API-->
			<script src="https://www.google.com/jsapi" type="text/javascript"></script>
			<script src="js/google-chart.js" type="text/javascript"></script>
			<script type="text/javascript">
			
			      		// Load the Visualization API and the piechart package.
			
			      		google.load('visualization', '1.0', {'packages':['corechart']});
			
			
			      		// Set a callback to run when the Google Visualization API is loaded.
			
			      		google.setOnLoadCallback(drawChart_at_home);
			      	</script>
			<meta charset="utf-8">
			<!-- default css -->
			<link href="css/s.css" media="all" rel="stylesheet" type="text/css" />
			<!-- Bootstrap -->
			<link href="css/b.min.css" rel="stylesheet">
			<!-- tablest css -->
			<link href="css/tablet.css" media="all" rel="stylesheet" type="text/css" />
			<!-- smartphones css -->
			<link href="css/smart.css" media="all" rel="stylesheet" type="text/css" />
			<title>Meetrix "Meeting Management System"</title>
			<!-- Chosen -->
			<link href="css/chosen.css" media="all" rel="stylesheet" type="text/css" />
			<link href="css/chosen.min.css" media="all" rel="stylesheet" type="text/css" />
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>

	<body onload="drawChart_at_home()">

		<!--sidebar and content-->
		<div id="wrapper">
			<!--sidebar-->
			<div id="sidebar-wrapper">
				<!--logo-->
				<div class="navbar-header">
					<a class="navbar-brand" href="#"><img src="img/logo.jpg"></a> </div>
				<!--sidebar navigation-->
				<ul class="sidebar-nav">
					<?php 
		                        if($_SESSION['admin_level'] == 1){
		                            echo "<li class=\"sidebar-content\"><a href=\"createMeeting.php\"><span class=\"glyphicon glyphicon-plus\"></span>CREATE MEETING</a></li>";
		                            echo "<li class=\"sidebar-content\"><a href=\"manageMeeting.php\"><span class=\"glyphicon glyphicon-plus\"></span>MANAGE MEETING</a></li>";
		                        }
		                    ?>
					<li class="sidebar-content"><a href="viewMeeting.php">
					<span class="glyphicon glyphicon-plus"></span>VIEW MEETING</a></li> <?php 
		                        if($_SESSION['admin_level'] == 1){
		                            echo "<li class=\"sidebar-content\"><a href=\"createGroup.php\"><span class=\"glyphicon glyphicon-plus\"></span>CREATE GROUP</a></li>";
		                            echo "<li class=\"sidebar-content\"><a href=\"manageGroup.php\"><span class=\"glyphicon glyphicon-plus\"></span>MANAGE GROUP</a></li>";
		                        }
		                    ?>
					<li class="sidebar-content"><a href="viewGroups.php">
					<span class="glyphicon glyphicon-plus"></span>VIEW GROUP</a></li>
				</ul>
			</div>
			<!--content-->
			<div id="page-content-wrapper">
				<!--top nav bar-->
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav left">
								<h3>WELCOME TO <span style="color: green">MEETRIX</span></h3>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php">HOME</a> </li>
								<li><a href="#">HELP</a> </li>
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
				<div id="main" style="height: 700px;">
					<h3>Create Groups</h3>
					<hr>
					<!-- A form for Create Groups -->
					<form action="createGroup.php" method="post">
						<br />
						<!-- A table for form inputs -->
						<table>
							<tr>
								<td>Group Name: </td>
								<td><input name="group_name" size="30" type="text" /></td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<!-- Retrieve data from database using a multi-selection drop down list -->
							<tr>
								<td>Group Members:</td>
								<td>
								<select class="chosen-select" multiple name="members[]" style="width: 350px;" tabindex="4">
								<?php
		            
							            $mysqlserver="localhost";
							            $mysqlusername="root";
							            $mysqlpassword="Menu6Rainy*guilt";
							            $conn=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
							            
							            $dbname = 'meetrix_database';
							            mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
							            
							            $query="SELECT `first_name`, `employee_id` FROM employee";
							            $result=mysql_query($query) or die ("Query to get data from firsttable failed: ".mysql_error());
							            
							            while ($row=mysql_fetch_array($result)) {
								            $fname=$row["first_name"];
								            $empid=$row["employee_id"];
							                echo "<option value=$empid>$fname </options>";       
						                    
						                           
						            	}
						         ?>
						         </select>
						         </td>
							</tr>
							<tr>
								<td>Group Description :</td>
								<td>
								<textarea maxlength="400" name="description" style="width: 384px; height: 135px"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td align="right">
								<input name="submit" type="submit" value="Create" /><input type="reset" value="Reset" /></td>
							</tr>
						</table>
					</form>
					<?php 
		         /* Connect to database */
					$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 
						  
					$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected');
					if (isset($_POST['submit'])){
						$group_name = $_POST['group_name'];
						$members = $_POST['members'];
						$description = $_POST['description'];
			
			
					 /* Validation of field inputs */
						if (empty($group_name) || empty($members) || empty($description))
					{
						if (empty($group_name))
						{
							echo "<font color='red'>Please enter a group name.</font><br/>";
						}
				
						if (empty($members))
						{
							echo "<font color='red'>Please select members.</font><br/>";
						}
						if (empty($description))
						{
							echo "<font color='red'>Please enter a description.</font><br/>";
						}
				
					}
					else
					{
			
						
					/* Insert the inputs into database in relevant columns */
						$sql = "INSERT INTO `group`(`group_name`,`description`,`creator_id`) VALUES 
						('$_POST[group_name]', '$_POST[description]','".$_SESSION["user_id"]."')";
						
				
						mysqli_query($conn, $sql);
						$groupId = mysqli_insert_id($conn);
					
						
						foreach ($_POST['members'] as $select){
							$sql1 = "INSERT INTO `group_employee`(`group_id`, `employee_id`) VALUES ('". $groupId ."', '". $select ."')";
					
								if (!mysqli_query($conn, $sql1)){
									die('Error: ' . mysqli_error($conn));
									}
							
								}
								echo "<font color='green'> New Group is created!</font>"; 
								mysqli_close($conn);
							}
					
						}
					?></div>
					</div>
				</div>
				<!-- Chosen-select javascript for dropdown selection -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
				<script src="js/chosen.jquery.js" type="text/javascript"></script>
				<script charset="utf-8" src="js/prism.js" type="text/javascript"></script>
				<script type="text/javascript">
						    var config = {
						      '.chosen-select'           : {},
						      '.chosen-select-deselect'  : {allow_single_deselect:true},
						      '.chosen-select-no-single' : {disable_search_threshold:10},
						      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
						      '.chosen-select-width'     : {width:"95%"}
						    }
				    		for (var selector in config) {
				     			 $(selector).chosen(config[selector]);
				   			 }
				</script>
				 
		</body>

</html>
