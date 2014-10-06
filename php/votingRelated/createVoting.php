<?php

	$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 			  
	$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected');
	
	$sql = "INSERT INTO `votes`(`title`,`question`) VALUES 
				('$_POST[title]', '$_POST[question]')";
				
		
	mysqli_query($conn, $sql);
	$voteId = mysqli_insert_id($conn);
	
	$sql = "INSERT INTO `votes_meeting`(`meeting_id`,`vote_id`) VALUES 
				('$_POST[meetingID]', '$voteId')";
				
		
	mysqli_query($conn, $sql);
	
	$loop = 1;
	foreach ($_POST as $key => $value){
		if($loop > 3){
			$sql = "INSERT INTO `result`(`answer`,`data`) VALUES 
				('$value', '0')";
			mysqli_query($conn, $sql);
			$resultId = mysqli_insert_id($conn);
			
			$sql = "INSERT INTO `vote_result`(`vote_id`,`result_id`) VALUES 
				('$voteId', '$resultId')";
			mysqli_query($conn, $sql);
		}
		$loop++;
	}
	

?>