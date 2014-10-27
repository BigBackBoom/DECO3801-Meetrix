<?php
	session_start();
	function endDate($date, $duration){
		$startSec = strtotime($date);
		$durSec = explode(":", $duration);
		$sec =  (intval($durSec[0]) * 3600) + (intval($durSec[1]) * 60) + intval($durSec[2]);
		$temp = intval($startSec) + $sec;
		$date = new DateTime("@$temp");
		$end = date('Y-m-d H:i:s', strval($temp));
		return $date->format('Y-m-d H:i:s');
	}
	
	/*initial connection to database*/
	$host="localhost"; // Host name 
	$username='root'; // Mysql username 
	$password='Menu6Rainy*guilt'; // Mysql password 
	$db_name='meetrix_database'; // Database name 
	$tbl_name='meeting'; // Table name 
	$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
	$userId = $_POST['userId'];
	
	/*temporary only searching meeting where employee id 1 is in*/			
	$st = $pdo->query("SELECT `meeting`.* 
					FROM `meeting`
					INNER JOIN `meeting_group` ON `meeting`.meeting_id=`meeting_group`.meeting_id
					INNER JOIN `group` ON `meeting_group`.group_id=`group`.group_id
					INNER JOIN `group_employee` ON `meeting_group`.group_id=`group_employee`.group_id
					WHERE `group_employee`.employee_id=$userId or `meeting`.creator_id = $userId
					GROUP BY `meeting`.meeting_id
					ORDER BY `meeting`.date DESC");
	/*feth all data*/
	$posts = $st->fetchAll();
	$arr = array();
	
	/*insert all fetched data into calendar*/
	for($i=0; $i<sizeof($posts); $i++){
		$end = endDate($posts[$i]['date'], $posts[$i]['duration']);
		$arr[] = array('id' => $posts[$i]['meeting_id'], 'title' => $posts[$i]['name'],
					'department' => $posts[$i]['department'], "creator_id" => $posts[$i]['creator_id'],
					'start' => $posts[$i]['date'], 'end' =>$end, 
					'description' => $posts[$i]['description'], 'voting_id' => $posts[$i]['voting_id'], 
					"group_id" => $posts[$i]['group_id'], 'room_id' => $posts[$i]['room_id'],);
	}
	print json_encode($arr);
	// Output "no suggestion" if no hint were found
	// or output the correct values 
?>