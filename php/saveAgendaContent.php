<?php 
	$meetingId = $_REQUEST['meetingId'];
	$agendaId = $_REQUEST['dataId'];
	$agendaContent = $_REQUEST['content'];
	$con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
	$result = mysqli_query($con,"UPDATE `agenda` SET `content`='$agendaContent' WHERE `meeting_id`='$meetingId' AND `id`='$agendaId'");	
?>