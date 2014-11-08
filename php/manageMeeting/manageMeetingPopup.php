<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
		<link href="../../css/b.min.css" rel="stylesheet">
		<link href="../../css/chosen.css" media="all" rel="stylesheet" type="text/css" />
		<link href="../../css/chosen.min.css" media="all" rel="stylesheet" type="text/css" />
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
		$meetingId = $_REQUEST['id'];
		$_SESSION['meeting_id'] = $meetingId;
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("SELECT `meeting`.*, `room`.room_name, `group`.group_name, `department`.department_name, `employee`.first_name, `employee`.last_name
						FROM `meeting`
						INNER JOIN `meeting_group` ON `meeting`.meeting_id=`meeting_group`.meeting_id
						INNER JOIN `group` ON `meeting_group`.group_id=`group`.group_id
						INNER JOIN `room` ON `meeting`.room_id=`room`.room_id
						INNER JOIN `department` ON `meeting`.department_id=`department`.department_id
						INNER JOIN `employee` ON `meeting`.creator_id=`employee`.employee_id
						WHERE `meeting`.meeting_id=". $meetingId . ";");
		
		/*get all deparment name*/				
		$st2 = $pdo->query("SELECT `department`.*
						FROM `department` 
						WHERE 1");
		
		$st3 = $pdo->query("SELECT * FROM `room` WHERE 1");
		
		$posts = $st1->fetchAll();
		$posts2 = $st2->fetchAll();
		$posts3 = $st3->fetchAll();
		$i = 1;
  	?>
  	
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="meetingPopUp">
			<form action="editMeeting.php" id="edit" method="post">
				<?php
				/*create table from retrieved data.*/
				echo "<table>";
					echo "<tr style='text-align: left'>";
						echo "<th><label for='meeting_title'>Meeting ID: </label></th>";
						echo "<th>". $posts[0]['meeting_id']. "</th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th><label for='meeting_title'>Meeting Title: </label></th>";
						echo "<th><input type='text' name='meeting_name' value='". $posts[0]['name'] ."'></th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th><label for='department'>Department: </label></th>";
						echo "<th>";
							echo "<select name='department'>";
								foreach($posts2 as $post){
									if(strcmp($posts[0]['department_name'], $post['department_name']) == 0){
										echo "<option selected='selected' value='". $post['department_id'] ."'>". $post['department_name'] ."</option>";
									} else {
										echo "<option value='". $post['department_id'] ."'>". $post['department_name'] ."</option>";
									}
								}
							echo "</select>";
						echo "</th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th><label>Meeting Creator: </label></th>";
						echo "<th>". $posts[0]['first_name']. " " .$posts[0]['last_name'] ."</th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th><label>Start: </label></th>";
						echo "<th><input type='text' name='date' value='". $posts[0]['date'] ."'></th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th><label>Duration: </label></th>";
						echo "<th><input type='text' name='duration' value='". $posts[0]['duration'] ."'></th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th><label>Description: </label></th>";
						echo "<th><input type='text' name='description' value='". $posts[0]['description'] ."'></th>";
					echo "</tr>";
				?>
					<tr>
						<th><label>Groups: </label></th>
						<td>
						<select class="chosen-select" data-placeholder="Choose a Group..." multiple name="members[]" style="width: 350px;" tabindex="4">
							<?php			            
							    $mysqlserver="localhost";
							    $mysqlusername="root";
							    $mysqlpassword="Menu6Rainy*guilt";
							    $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
							            
							    $dbname = 'meetrix_database';
							    mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
							    
								$cdquery3="SELECT `group_name`, `meeting_group`.`group_id` FROM `meeting_group`, `group` WHERE `meeting_group`.`meeting_id` = $meetingId AND `group`.`group_id` = `meeting_group`.`group_id`";
								$cdresult3=mysql_query($cdquery3);
								$resultarr = array();
								while ($cdrow3=mysql_fetch_array($cdresult3)) {
									$cdTitle3=$cdrow3["group_name"];
									$groupid3=$cdrow3["group_id"];								
							        echo "<option selected value=$groupid3>$cdTitle3 </options>";
									$resultarr[]=$groupid3;									
							    }
								
							    $cdquery="SELECT `group_name`, `group_id` FROM `group` WHERE `creator_id` =". $_SESSION["user_id"];
							            $cdresult=mysql_query($cdquery) or die ("Query to get data from first table failed: ".mysql_error());
							            
							    while ($cdrow=mysql_fetch_array($cdresult)) {
									
									$cdTitle=$cdrow["group_name"];
									$groupid=$cdrow["group_id"];
									if(!in_array($groupid, $resultarr)) {
										echo "<option value=$groupid>$cdTitle </options>";
										$resultarr[]=$groupid;	
									}							            
							    }
										
								$cdquery2="SELECT `group_name`, `group`.`group_id` FROM `group`, `group_employee` WHERE `group_employee`.`employee_id` =".$_SESSION["user_id"]." AND `group_employee`.`group_id` = `group`.`group_id`";
								$cdresult2=mysql_query($cdquery2);
								while ($cdrow2=mysql_fetch_array($cdresult2)) {
									$cdTitle2=$cdrow2["group_name"];
									$groupid2=$cdrow2["group_id"];
									if(!in_array($groupid2, $resultarr)) {
										echo "<option value=$groupid2>$cdTitle2 </options>";
										$resultarr[]=$groupid2;	
									}
							    }
							    
																
							?>
						</select> 
						</td>
					</tr>
				<?php	
					echo "<tr style='text-align: left'>";
						echo "<th><label>Room: </label></th>";
						echo "<th>";
							echo "<select name='room'>";
								foreach($posts3 as $post){
									if(strcmp($posts[0]['room_name'], $post['room_name']) == 0){
										echo "<option selected='selected' value='". $post['room_name'] ."'>". $post['room_name'] ."</option>";
									} else {
										echo "<option value='". $post['room_name'] ."'>". $post['room_name'] ."</option>";
									}
								}
							echo "</select>";
						echo "</th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th></th>";
						echo "<th><input type='submit' value='Submit'></th>";
					echo "</tr>";
				echo "</table>";
				
				?>
			</form>
		</div>
		<!-- Chosen-select javascript for dropdown selection -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
		<script src="../../js/chosen.jquery.js" type="text/javascript"></script>
		<script charset="utf-8" src="../../js/prism.js" type="text/javascript"></script>
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