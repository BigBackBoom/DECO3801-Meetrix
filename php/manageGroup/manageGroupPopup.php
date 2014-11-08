<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<title>Meetrix "Meeting Management System"</title>
		<!-- Chosen -->
		<link href="../../css/chosen.css" media="all" rel="stylesheet" type="text/css" />
		<link href="../../css/chosen.min.css" media="all" rel="stylesheet" type="text/css" />
		<!--bootstrap-->
		<link href="../../css/b.min.css" rel="stylesheet">
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
		$first_name = $row['first_name'];
	    $last_name = $row['last_name'];
		$_SESSION['group_id'] = $groupId;
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("SELECT * FROM `group` WHERE `group_id`=". $groupId . ";");
				
		$posts = $st1->fetchAll();
		
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
				?>	
				<?php	
					echo "<tr style='text-align: left'>";
						echo "<th><label for='group_name'>Group Name: </label></th>";
						echo "<th><input type='text' name='group_name' value='".$posts[0]['group_name']."'></th>";
					echo "</tr>";
				?>	
				<?php	
					echo "<tr style='text-align: left'>";
						echo "<th><label for='group_members'>Group Members: </label></th>";
						$con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
						$re1 = mysqli_query($con,"SELECT `group_employee`.`employee_id`, `first_name`, `last_name` FROM `group_employee`, `employee`, `group` WHERE `group_employee`.`group_id`=`group`.`group_id` AND employee.`employee_id`=`group_employee`.`employee_id` AND `group`.`group_id`=$groupId");
						$re2 = mysqli_query($con, "SELECT `first_name`, `employee_id` FROM employee");
						echo "<td>";
						echo "<select class=\"chosen-select\" multiple name=\"members[]\" style=\"width: 350px;\" tabindex=\"4\">";
							while($ro1=mysqli_fetch_array($re1)){
								$eid1 = $ro1['employee_id'];
			            		$efn1 = $ro1['first_name'];
			            		$eln1 = $ro1['last_name'];
			            		echo "<option selected value=$eid1>$efn1 </options>";  
						    }

						    while($ro2=mysqli_fetch_array($re2)) {
						    	$eid2=$ro2["employee_id"];
								$efn2=$ro2["first_name"];
								$a = 0;
								$re3 = mysqli_query($con,"SELECT `group_employee`.`employee_id`, `first_name`, `last_name` FROM `group_employee`, `employee`, `group` WHERE `group_employee`.`group_id`=`group`.`group_id` AND employee.`employee_id`=`group_employee`.`employee_id` AND `group`.`group_id`=$groupId");
								while($ro3=mysqli_fetch_array($re3)){
									$eid3 = $ro3['employee_id'];
									if($eid3 == $eid2) {
			            				$a = 1;
			            			}
						    	}
								if($a == 0) {
									echo "<option value=$eid2>$efn2 </options>";
								}
						    }

						 
					    echo "</select>";
					    echo "</td>";
					                     
					echo "</tr>";
				?>	
					
				<?php						
					echo "<tr style='text-align: left'>";
						echo "<th><label>Description: </label></th>";
						
						echo "<th><input type='text' size='60' name='description' value='".$posts[0]['description']."'></th>";
												
					echo "</tr>";
				?>
				<?php						
					echo "<tr style='text-align: left'>";
						echo "<th></th>";
						echo "<th><input type='submit' value='Submit'></th>";
					echo "</tr>";
				echo "</table>";
				
				?>
			</form>	
		</div>
		<!-- Chosen-select javascript for dropdown selection -->

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
				<script src="../../js/chosen.jquery.js" type="text/javascript"></script>
				<script charset="utf-8" src="../../js/prism.js" type="text/javascript"></script>
				<script type="text/javascript">
						    var config = {
						      '.chosen-select'           : {},
						      '.chosen-select-deselect'  : {allow_single_deselect:true},
						      '.chosen-select-no-single' : {disable_search_threshold:10},
						      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
						      '.chosen-select-width'     : {width:"95%"}
						    }
				    		for (var selector in config) {
				     			 $(selector).chosen(config[selector]);
				   			 }
				</script>
	</body>
</html>