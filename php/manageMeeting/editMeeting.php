<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">

    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	<script type="text/javascript">
    		function refreshAndClose() {
       			 window.opener.location.reload(true);
       			 window.close();
    		}
		</script>
  	</head>

	<?php
		session_start();
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
		$date = $_POST['date'];
		$duration = $_POST['duration'];
		$description = $_POST['description'];
		$room = $_POST['room'];
		$members = $_POST['members'];
		
		
		/*search room from room name*/
		$posts2 = $pdo->query("SELECT `room`.*
						FROM `room`
						WHERE `room`.room_name ='$room'");
		
		//$posts1 = $posts1->fetchAll();
		$posts2 = $posts2->fetchAll();
		
		/*edit data*/
		$posts3 = $pdo->query("UPDATE `meeting` 
							SET `name`='". $name ."', `department_id`='". $department ."', 
							`date`='". $date ."',
							`duration`='". $duration ."', `description`='". $description ."',
							`room_id`='". $posts2[0]['room_id'] ."'
							WHERE `meeting_id`=$_SESSION[meeting_id]");
		
		/*edit group*/
		$posts4 = $pdo->query("DELETE FROM `meeting_group` WHERE `meeting_id`= $_SESSION[meeting_id]");
		foreach ($members as $select){
			$posts5 = $pdo->query("INSERT INTO `meeting_group`(`meeting_id`, `group_id`) 
						VALUES ($_SESSION[meeting_id],$select)");							
		}					
									
		unset($_SESSION['meeting_id']);
	?>
	
	<body>
		<p>The meeting was edited successfully</p>
		<input type="button" value="Close" onclick="refreshAndClose() ">
	</body>
</html>