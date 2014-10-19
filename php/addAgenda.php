<?php
	$meetingId = $_REQUEST['meetingId'];
	$agendaId = $_REQUEST['agendaId'];
	$con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
	$result = mysqli_query($con,"INSERT INTO `agenda`(`meeting_id`, `id`, `agenda_order`, `duration`, `title`, `content`) VALUES ('$meetingId','$agendaId','$agendaId','10','Please enter your agenda title','Please enter your agenda content')");	
?>