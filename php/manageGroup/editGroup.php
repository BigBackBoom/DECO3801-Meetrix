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
		$tbl_name='group'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		$id = $_POST['id'];
		$name = $_POST['group_name'];
		$member = $_POST[0]['first_name']. " " .$_POST[0]['last_name'];
		$description = $_POST['description'];
		
		
		
		
		
		
		
		/*edit data*/
		$posts3 = $pdo->query("UPDATE `group` 
							SET `name`='". $name ."',  `description`='". $description ."'
							WHERE `group_id`=$_SESSION[group_id]");
		
		
		unset($_SESSION['group_id']);
	?>
	
	<body>
		<p>The group was edited successfully</p>
		<input type="button" value="Close" onclick="refreshAndClose() ">
	</body>
</html>