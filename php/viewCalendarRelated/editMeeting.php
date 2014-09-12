<?php
	/*initial connection to database*/
	$host="localhost"; // Host name 
	$username='root'; // Mysql username 
	$password='Menu6Rainy*guilt'; // Mysql password 
	$db_name='meetrix_database'; // Database name 
	$tbl_name='meeting'; // Table name 
	$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
	$id = $_POST['id'];
	$name = $_POST['meeting_name'];
	$department = $_POST['department'];
	$super_visor = $_POST['super_visor'];
	$date = $_POST['date'];
	$duration = $_POST['duration'];
	$description = $_POST['description'];
	$group = $_POST['group'];
	$room = $_POST['room'];
	// get the q parameter from URL
	
	/*turn sec to date*/
	//$duration = ($end - $start)/1000;
	//$duration = new DateTime("@$duration");
	//$duration = $duration->format('H:i:s');
	//$start = $_GET['start']/1000;
	//$start = new DateTime("@$start");
	//$start = $start->format('Y-m-d H:i:s');
	
	/*search group from group name and supervisor_id*/
	$posts1 = $pdo->query("SELECT `group`.*
					FROM `group`
					WHERE `group`.supervisor_id=$super_visor AND
					`group`.group_name = '$group'");
	
	/*search room from room name*/
	$posts2 = $pdo->query("SELECT `room`.*
					FROM `room`
					WHERE `room`.room_name ='$room'");
	
	$posts1 = $posts1->fetchAll();
	$posts2 = $posts2->fetchAll();
	/*if(sizeof($posts1) == 0 && sizeof($posts2) == 0){
		echo("You do not have group called, $group or room called, $room");
	}*/
	/*edit data*/
	$posts3 = $pdo->query("UPDATE `meeting` 
						SET `name`='". $name ."', `department_id`='". $department ."', 
						`supervisor_id`='". $super_visor ."', `date`='". $date ."',
						`duration`='". $duration ."', `description`='". $description ."',
						`group_id`='". $posts1[0]['group_id'] ."', `room_id`='". $posts2[0]['room_id'] ."'
						WHERE `meeting_id`=$id");
?>