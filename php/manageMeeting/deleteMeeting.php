	<?php
		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='meeting'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		$meetingId = $_GET['id'];
		echo $meetingId;
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("DELETE FROM `meeting`
							WHERE meeting_id = $meetingId;");
							
		header('location: /manageMeeting.php');
	?>