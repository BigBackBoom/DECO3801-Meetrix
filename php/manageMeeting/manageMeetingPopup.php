<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
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
  		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='meeting'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		$meetingId = $_GET['id'];
		
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("SELECT `meeting`.*, `room`.room_name, `group`.group_name, `department`.department_name
						FROM `meeting`
						INNER JOIN `group` ON `meeting`.group_id=`group`.group_id
						INNER JOIN `room` ON `meeting`.room_id=`room`.room_id
						INNER JOIN `department` ON `meeting`.department_id=`department`.department_id
						WHERE `meeting`.meeting_id=". $meetingId . ";");
		
		/*get all deparment name*/				
		$st2 = $pdo->query("SELECT `department`.*
						FROM `department` 
						WHERE 1");
		
		$posts = $st1->fetchAll();
		$posts2 = $st2->fetchAll();
  	?>
  	
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="meetingPopUp">
			<form action="editMeeting.php" id="edit" method="post">
				<?php
				echo "<label for='meeting_title'>Meeting ID</label><input type='text' name='id' value='". $posts[0]['meeting_id'] ."'>";
  				echo "<label for='meeting_title'>Meeting Title</label><input type='text' name='meeting_name' value='". $posts[0]['name'] ."'>";
				echo "<label for='department'>Department</label>";
				echo "<select name='department'>";
					foreach($posts2 as $post){
						if(strcmp($posts[0]['department_name'], $post['department_name']) == 0){
							echo "<option selected='selected' value='". $post['department_id'] ."'>". $post['department_name'] ."</option>";
						} else {
							echo "<option value='". $post['department_id'] ."'>". $post['department_name'] ."</option>";
						}
					}
				echo "</select>";
				echo "<label>Supervisor</label>";
				echo "<input type='text' name='super_visor' value='". $posts[0]['supervisor_id']. "'>";
				echo "<label>Start</label>";
				echo "<input type='text' name='date' value='". $posts[0]['date'] ."'>";
				echo "<label>Duration</label>";
				echo "<input type='text' name='duration' value='". $posts[0]['duration'] ."'>";
				echo "<label>Description</label>";
				echo "<input type='text' name='description' value='". $posts[0]['description'] ."'>";
				echo "<label>Group</label>";
				echo "<input type='text' name='group' value='". $posts[0]['group_name']."'>";
				echo "<label>Room</label>";
				echo "<input type='text' name='room' value='". $posts[0]['room_name'] ."'>";
				echo "<input type='submit' value='Submit'>";
				?>
			</form>	
		</div>
	</body>
</html>