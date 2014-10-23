<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
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
		$groupId = $_GET['id'];
		$_SESSION['group_id'] = $groupId;
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("SELECT `group`.*, `group_employee`.*, `employee`.first_name, `employee`.last_name
						FROM `group`
						INNER JOIN `group_employee` ON `group`.group_id=`group_employee`.group_id
						INNER JOIN `employee` ON `group_employee`.employee_id=`employee`.employee_id
						WHERE `group`.group_id=". $groupId . ";");
		
		
		
		$posts = $st1->fetchAll();
		
		$i = 1;
  	?>
  	
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="meetingPopUp">
			<form action="editGroup.php" id="edit" method="post">
				<?php
				echo "<table>";
					echo "<tr style='text-align: left'>";
						echo "<th><label for='group_title'>Group ID: </label></th>";
						echo "<th>".$posts[0]['group_id']."</th>";
					echo "</tr>";
					
					
					echo "<tr style='text-align: left'>";
						echo "<th><label for='group_name'>Group Name: </label></th>";
						echo "<th><input type='text' name='group_name' value='".$posts[0]['group_name']."'></th>";
					echo "</tr>";
					
					
					echo "<tr style='text-align: left'>";
						echo "<th><label for='group_members'>Group Members: </label></th>";
						
                        echo "<th><p>".$posts[0]['first_name']." ".$posts[0]['last_name']."</p></th>";

					echo "</tr>";
					
					
					echo "<tr style='text-align: left'>";
						echo "<th></th>";
						echo "<th><input type='add' value='Add'></th>";
					echo "</tr>";
					
					
					
					
					echo "<tr style='text-align: left'>";
						echo "<th><label>Description: </label></th>";
						
						echo "<th><input type='text' size='60' name='description' value='".$posts[0]['description']."'></th>";
						
						//echo "<th><textarea rows='5' cols='40' name='description' value='".$posts[0]['description']."'></th>";
					echo "</tr>";
					
					
					
					echo "<tr style='text-align: left'>";
						echo "<th></th>";
						echo "<th><input type='submit' value='Submit'></th>";
					echo "</tr>";
				echo "</table>";
				
				?>
			</form>	
		</div>
	</body>
</html>