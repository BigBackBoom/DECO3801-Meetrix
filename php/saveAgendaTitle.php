<?php 
	$meetingId = $_REQUEST['meetingId'];
	$agendaId = $_REQUEST['dataId'];
	$agendaTitle = $_REQUEST['title'];
	$con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
	$result = mysqli_query($con,"UPDATE `agenda` SET `title`='$agendaTitle' WHERE `meeting_id`='$meetingId' AND `id`='$agendaId'");	
?>