<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
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
		
		$posts = $st1->fetchAll();
		$posts2 = $st2->fetchAll();
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
					
					foreach($posts as $post){
						echo "<tr style='text-align: left'>";
							echo "<th><label>Group $i: </label></th>";
							echo "<th><input type='text' name='group$i' value='". $post['group_name']."'></th>";
						echo "</tr>";
						$i++;
					}
					
					echo "<tr style='text-align: left'>";
						echo "<th><label>Room: </label></th>";
						echo "<th><input type='text' name='room' value='". $posts[0]['room_name'] ."'></th>";
					echo "</tr>";
					echo "<tr style='text-align: left'>";
						echo "<th></th>";
						echo "<th><input type='submit' value='Submit'></th>";
					echo "</tr>";
				echo "</table>";
				
				?>
			</form>	
		</div>
	</body>
</html>