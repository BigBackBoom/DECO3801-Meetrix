<?php
	$meetingId = $_REQUEST['meetingId'];
	$agendaId = $_REQUEST['agendaId'];
	$con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
	$result = mysqli_query($con,"DELETE FROM `agenda` WHERE `meeting_id` = '$meetingId' AND `id` = '$agendaId'");	
?>