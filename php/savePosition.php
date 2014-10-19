<?php
	$content = $_REQUEST['content'];
	$height = $_REQUEST['height'] / 10;
	$meetingId = $_REQUEST['meetingId'];
	$con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database");
	// mark: it should be where agenda_order = xxxx
	mysqli_query($con,"update agenda set duration='$height' where id=$content and meeting_id=$meetingId");
?>