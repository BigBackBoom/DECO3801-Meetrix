<?php
	
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
	// get the q parameter from URL
				
	$st = $pdo->query("SELECT `meeting`.*
					FROM `meeting`
					INNER JOIN `group` ON `meeting`.group_id=`group`.group_id
					WHERE `group`.employee_id=1;");
	$posts = $st->fetchAll();
	$arr = array();
	
	for($i=0; $i<sizeof($posts); $i++){
		$end = endDate($posts[$i]['date'], $posts[$i]['duration']);
		$arr[] = array('id' => $posts[$i]['meeting_id'], 'title' => $posts[$i]['name'],
					'department' => $posts[$i]['department'], "supervisor_id" => $posts[$i]['supervisor_id'],
					'start' => $posts[$i]['date'], 'end' =>$end, 
					'description' => $posts[$i]['description'], 'voting_id' => $posts[$i]['voting_id'], 
					"group_id" => $posts[$i]['group_id'], 'room_id' => $posts[$i]['room_id'],);
	}
	print json_encode($arr);
	// Output "no suggestion" if no hint were found
	// or output the correct values 
?>