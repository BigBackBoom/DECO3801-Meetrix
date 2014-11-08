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
				
				<meta charset="utf-8">
				<!-- tablest css -->
				<link href="css/tablet.css" media="all" rel="stylesheet" type="text/css" />
				<!-- smartphones css -->
				<link href="css/smart.css" media="all" rel="stylesheet" type="text/css" />
				<title>Meetrix "Meeting Management System"</title>
				<!-- default css -->
				<link href="css/s.css" media="all" rel="stylesheet" type="text/css" />
				<!-- Bootstrap -->
				<link href="css/b.min.css" rel="stylesheet">
				<link href="css/chosen.css" media="all" rel="stylesheet" type="text/css" />
				<link href="css/chosen.min.css" media="all" rel="stylesheet" type="text/css" />
				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
				<![endif]-->
		</head>

		<body>
		
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
				<div id="main" style="height: 800px;">
					<h2>Create Meeting</h2>
					<hr>
					<!-- A form for Create Meetings -->
					<form action="createMeeting.php" method="post">
						<!-- A table for form inputs -->
						<table>
							<tr>
								<td>Meeting Name :</td>
								<td><input name="name" type="text" /></td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<!-- Retrieve data from database using a single-selection drop down list -->
							<tr>
								<td>Department :</td>
								<td>
								<select class="chosen-select" data-placeholder="Choose a Department..." name="department" tabindex="4">
								<?php
			            
							            $mysqlserver="localhost";
							            $mysqlusername="root";
							            $mysqlpassword="Menu6Rainy*guilt";
							            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
							            
							            $dbname = 'meetrix_database';
							            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
							            
							            $cdquery="SELECT `department_name`, `department_id` FROM `department`";
							            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
							            
							            while ($cdrow=mysql_fetch_array($cdresult)) {
							            $cdTitle=$cdrow["department_name"];
							            $departmentid=$cdrow["department_id"];
							                echo "<option value=$departmentid>$cdTitle </options>";
							            
							            }
							                
							    ?></select> </td>
							</tr>
							<tr>
								<td>Meeting Description :</td>
								<td>
								<textarea maxlength="400" name="description" style="width: 384px; height: 135px"></textarea></td>
							</tr>
							<!-- Retrieve data from database using a single-selection drop down list -->
							<tr>
								<td>Room :</td>
								<td>
								<select class="chosen-select" data-placeholder="Choose a Room..." name="room">
								<?php
			            
							            $mysqlserver="localhost";
							            $mysqlusername="root";
							            $mysqlpassword="Menu6Rainy*guilt";
							            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
							            
							            $dbname = 'meetrix_database';
							            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
							            
							            $cdquery="SELECT `room_name`, `room_id` FROM `room`";
							            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
							            
							            while ($cdrow=mysql_fetch_array($cdresult)) {
							            $cdTitle=$cdrow["room_name"];
							            $roomid=$cdrow["room_id"];
							                echo "<option value=$roomid>$cdTitle </options>";
							            
							            }
							                
							    ?>
							    </select> </td>
							</tr>
							<tr>
								<td>Meeting Date :</td>
								<td><input name="date" type="date" /></td>
							</tr>
							<tr>
								<td>Meeting Time :</td>
								<td><input name="time" type="time" /></td>
							</tr>
							<tr>
								<td>Duration :</td>
								<td>H:
								<input name="duration" style="width: 60px" type="number" /> 
								M:
								<input name="duration1" style="width: 60px" type="number" /> 
								S:
								<input name="duration2" style="width: 60px" type="number" />
								</td>
							</tr>
							<!-- Retrieve data from database using a multi-selection drop down list -->
							<tr>
								<td>Group : </td>
								<td>
								<select class="chosen-select" data-placeholder="Choose a Group..." multiple name="group[]" style="width: 350px;" tabindex="4">
								<?php
			            
							            $mysqlserver="localhost";
							            $mysqlusername="root";
							            $mysqlpassword="Menu6Rainy*guilt";
							            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
							            
							            $dbname = 'meetrix_database';
							            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
							            
							            $cdquery="SELECT `group_name`, `group_id` FROM `group` WHERE `creator_id` =". $_SESSION["user_id"];
							            $cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());
							            
							            while ($cdrow=mysql_fetch_array($cdresult)) {
											$cdTitle=$cdrow["group_name"];
											$groupid=$cdrow["group_id"];
							                echo "<option value=$groupid>$cdTitle </options>";							            
							            }
										
										$cdquery2="SELECT `group_name`, `group`.`group_id` FROM `group`, `group_employee` WHERE `group_employee`.`employee_id` =".$_SESSION["user_id"]." AND `group_employee`.`group_id` = `group`.`group_id`";
										$cdresult2=mysql_query($cdquery2);
										while ($cdrow2=mysql_fetch_array($cdresult2)) {
											$cdTitle2=$cdrow2["group_name"];
											$groupid2=$cdrow2["group_id"];
							                echo "<option value=$groupid2>$cdTitle2 </options>";							            
							            }
							                
							   ?></select> </td>
							</tr>
							<tr>
								<td><br />
								<br />
								</td>
								<td align="right">
								<input name="submit" type="submit" value="Create" /><input type="reset" value="Reset" /></td>
							</tr>
						</table>
					</form>
					<?php 
			             /* Connect to database */
						$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 
							  
						$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected'); 
						if(isset($_POST['submit'])) 
						{ 
						      
						    $name=$_POST['name']; 
						    $date=$_POST['date'];
						    $time=$_POST['time'];
						    $description=$_POST['description'];
						    $group=$_POST['group'];  
						    $room=$_POST['room'];
						    $department=$_POST['department'];  
		
						      /* Validation of field inputs */
						if(empty($name) || empty($date) || empty($time) || empty($description) || empty($group))
						    { 
						          
						        if(empty($name)) 
						        { 
						            echo "<font color='red'>Name field is empty.</font><br/>"; 
						        } 
						        if(empty($date)) 
						        { 
						            echo "<font color='red'>Date field is empty.</font><br/>"; 
						        } 
						        if(empty($time)) 
						        { 
						            echo "<font color='red'>Time field is empty.</font><br/>"; 
						        } 
						        if(empty($description)) 
						        { 
						            echo "<font color='red'>Description field is empty.</font><br/>"; 
						        } 
						        if(empty($group)) 
						        { 
						            echo "<font color='red'>Group field is empty.</font><br/>"; 
						        } 
		
						    } 
						    else {
						    
					/* Insert the inputs into database in relevant columns */
						$sql="INSERT INTO `meeting`(`name`, `date`, `duration`, `description`, `creator_id`, `room_id`, `department_id`) VALUES 
						('$_POST[name]', CONCAT_WS(' ', '$_POST[date]', '$_POST[time]'), CONCAT_WS(':', '$_POST[duration]', '$_POST[duration1]', '$_POST[duration2]'), '$_POST[description]','".$_SESSION["user_id"]."', '$_POST[room]' , '$_POST[department]')"; 
						
		
						mysqli_query($conn, $sql);
						$meetingId = mysqli_insert_id($conn);
			 
			 			foreach ($_POST['group'] as $select){
								$sql1 = "INSERT INTO `meeting_group`(`meeting_id`, `group_id`) VALUES ('". $meetingId ."', '". $select ."')";
						
								if (!mysqli_query($conn, $sql1)){
									die('Error: ' . mysqli_error($conn));
								}
								
							}
							echo "<font color='green'> New Meeting is created!</font>"; 
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
