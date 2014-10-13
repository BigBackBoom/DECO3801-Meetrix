<!DOCTYPE html>
<html>
	<?php 
		if(strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") || strpos($_SERVER['HTTP_USER_AGENT'], "Android")){
			header( 'Location: sp/index.php' ) ;
		}
	?>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
    	<script type="text/javascript">
      		// Load the Visualization API and the piechart package.
      		google.load('visualization', '1.0', {'packages':['corechart']});

      		// Set a callback to run when the Google Visualization API is loaded.
      		google.setOnLoadCallback(drawChart_at_home);
      	</script>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<!-- tablest css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
		<!-- accordion css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/accordion.css" />
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
	<body onload="drawChart_at_home()">
		<!--Header on top of the page where all user account setting navigation should be done-->
		<div id ="profile_header">
			<!-- Meetrix typography div-->
			<div id="app_name"> 
				<a class="name" href="#">Meetrix</a>
			</div>
			<!--Account navigation bars-->
			<div id="account_nav">
				<ul class="account_nav">
					<li class="account_nav"><a href="#" class="account">Profile</a></li>
					<li class="account_nav"><a href="#" class="account">Setting</a></li>
					<li class="account_nav"><a href="#" class="account">Help</a></li>
				<ul>
			</div>
		</div>
		<!--main contents comes inside here-->
		
		<div id ="contents">
			<!--left side of the contents such as icon and navigation bar-->
			<div id ="left">
				<!--icon img-->
				<div id="icon">
					<img class="logo" src="img/testlogo2.png"/>
				</div>
				<!--navigation bars-->
				<div id="navigation">
					<ul class="navigation">
						<li class="navigation"><p class="nav_man">Meetings</p></li>
							<ul class="sub_navigation">
								<li class="sub_navigation"><p class="sub_nav_man"><a href="viewMeeting.php">View Meetings</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man"><a href="createMeeting.php">Create Meeting</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Delete Meeting</p></li>
							</ul>
						<li class="navigation"><p class="nav_man">Groups</p></li>
							<ul class="sub_navigation">
								<li class="sub_navigation"><p class="sub_nav_man">View Groups</p></li>
								<li class="sub_navigation"><p class="sub_nav_man"><a href="createGroup.php">Create Group</a></p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Delete Group</p></li>
							</ul>
					</ul>
				</div>
			</div>
					
					
					 
	<div id="main">
		 <div class="accordion vertical">
    <ul>		 
		<?php            
            $con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
            $result = mysqli_query($con,"SELECT group_name, description, first_name, last_name, group_id, contact_number, email FROM `group`, employee WHERE employee.`employee_id`=`group`.`creator_id`");   
            $int = 1;          
            while ($row=mysqli_fetch_array($result)) {
              	$id = $row['group_id'];       
            	$group_name = $row['group_name'];
            	$description = $row['description'];
            	$first_name = $row['first_name'];
            	$last_name = $row['last_name'];
            	$contact_number = $row['contact_number'];
            	$email = $row['email'];
				echo "<li>";
	            echo "<input type=\"radio\" id=$int name=\"radio-accordion\">";
	            echo "<label for=$int style=\"margin-bottom: 0px\">".$group_name."</label>";
	            echo "<div class=\"content\">";
	            echo "<p>Group description: ".$description."</p>";
				echo "<p>Creator: ".$first_name." ".$last_name."</p>";
				echo "<p>Creator contact number: ".$contact_number."</p>";
				echo "<p>Creator email: ".$email."</p>";
				echo "<p>Group members: </p>";
				$re = mysqli_query($con,"SELECT first_name, last_name, contact_number, email FROM `group_employee`, employee, `group` WHERE `group_employee`.`group_id`=`group`.`group_id` AND employee.`employee_id`=`group_employee`.`employee_id` AND `group`.`group_id`=$id"); 
            	while($ro=mysqli_fetch_array($re)){
            		$efn = $ro['first_name'];
            		$eln = $ro['last_name'];
            		$econta = $ro['contact_number'];
            		$eemail = $ro['email']; 
            		echo "<p>".$efn." ".$eln." ".$econta." ".$eemail."</p>";
            	}
				echo "</div>";
				echo "</li>";
				$int = $int +1;
			  
            }
                
          ?>
		  </ul>
		  </div>
				 
				 </div>
               </div>
	</body>
</html>