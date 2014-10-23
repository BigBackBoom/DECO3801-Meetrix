	<?php
		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='group'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		$groupId = $_GET['id'];
		echo $groupId;
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("DELETE FROM `group`
							WHERE group_id = $groupId;");
							
		header('location: /manageGroup.php');
	?>