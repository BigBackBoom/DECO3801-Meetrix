<?php
	
	/*initial connection to database*/
	$host="localhost"; // Host name 
	$username='root'; // Mysql username 
	$password='Menu6Rainy*guilt'; // Mysql password 
	$db_name='meetrix_database'; // Database name 
	$tbl_name='meeting'; // Table name 
	$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
	$id = $_GET['id'];
	$start = $_GET['start'];
	$end = $_GET['end'];
	
	/*turn sec to date*/
	$duration = ($end - $start)/1000;
	$duration = new DateTime("@$duration");
	$duration = $duration->format('H:i:s');
	$start = $_GET['start']/1000;
	$start = new DateTime("@$start");
	$start = $start->format('Y-m-d H:i:s');
	
	
	// get the q parameter from URL
	$st1 = $pdo->query("UPDATE `meeting` SET `duration`='". $duration ."', `date`='". $start ."' WHERE `meeting_id`=$id");
	// Output "no suggestion" if no hint were found
	// or output the correct values
?>