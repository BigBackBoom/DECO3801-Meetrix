<!DOCTYPE html>

<?php
	session_start();
	
	if(!isset($_SESSION["user_id"])) {
		header("Location:login.php");
	}
	$user_id = $_SESSION["user_id"];
?>


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
		<script>
			var user_id = <?php echo $_SESSION["user_id"]; ?>; 
			$(document).ready(init_cal);
		</script>
   		
		<meta charset="utf-8">
		<!-- default css -->
        <link rel="stylesheet" media="all" type="text/css" href="css/s.css" />
    	<!-- Bootstrap -->
    	<link href="css/b.min.css" rel="stylesheet">
    	<!-- tablest css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/tablet.css" />
		<!-- accordion css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/accordion.css" />
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>

    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
  	</head>
	<body onload="drawChart_at_home()">
		<!--sidebar and content-->
        <div id="wrapper">
             <!--sidebar-->
            <div id="sidebar-wrapper">
                <!--logo-->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="img/logo.jpg" ></a>
                </div>
                <ul class="sidebar-nav">                                      
                    <?php 
                        if($_SESSION['admin_level'] == 1){
                            echo "<li class=\"sidebar-content\"><a href=\"createMeeting.php\"><span class=\"glyphicon glyphicon-plus\"></span>CREATE MEETING</a></li>";
                            echo "<li class=\"sidebar-content\"><a href=\"manageMeeting.php\"><span class=\"glyphicon glyphicon-plus\"></span>MANAGE MEETING</a></li>";
                        }
                    ?>
                    <li class="sidebar-content"><a href="viewMeeting.php"><span class="glyphicon glyphicon-plus"></span>VIEW MEETING</a></li>
                    <?php 
                        if($_SESSION['admin_level'] == 1){
                            echo "<li class=\"sidebar-content\"><a href=\"createGroup.php\"><span class=\"glyphicon glyphicon-plus\"></span>CREATE GROUP</a></li>";
                            echo "<li class=\"sidebar-content\"><a href=\"manageGroup.php\"><span class=\"glyphicon glyphicon-plus\"></span>MANAGE GROUP</a></li>";
                        }
                    ?>
                    <li class="sidebar-content"><a href="viewGroups.php"><span class="glyphicon glyphicon-plus"></span>VIEW GROUP</a></li>
                </ul>
            </div>
            <!--content-->
            <div id="page-content-wrapper">
                <!--top nav bar-->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav left">
                                <h3>WELCOME TO <span style="color:green">MEETRIX</span></h3>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                            	<li>
                                    <a href="index.php">HOME</a>
                                </li>
                                <li>
                                    <a href="#">HELP</a>
                                </li>
                                <?php
                                    if(isset($_SESSION["user_id"])) {
                                        echo "<li><a href=\"php/logout.php\">LOGOUT</a></li>";
                                        //echo "<button type='button' class='account_nav' onclick='location.href = \"php/logout.php\";'>Logout</button>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--Main contents comes in side here please edit or enter contents in here-->
				<div id="main">
					<div class="accordion vertical">
					    <ul>		 
							<?php
					            $con = mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database"); 
					            $result = mysqli_query($con,"SELECT `group_name`, `description`, `first_name`, `last_name`,
										`group`.`group_id`, `contact_number`, `email` FROM `group`, `employee`, `group_employee` 
										WHERE `group_employee`.`group_id` = `group`.`group_id` AND `group_employee`.`employee_id`=$user_id AND `employee`.`employee_id`=`group`.`creator_id`");   
					            $int = 1;
								$groupidarr=array();								
					            while ($row=mysqli_fetch_array($result)) {
					              	$id = $row['group_id'];       
					            	$group_name = $row['group_name'];
					            	$description = $row['description'];
					            	$first_name = $row['first_name'];
					            	$last_name = $row['last_name'];
					            	$contact_number = $row['contact_number'];
					            	$email = $row['email'];									
									if (!in_array($id, $groupidarr)) {
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
										$groupidarr[] = $id;
									}
									$int = $int +1;									
					            }
								$result1 = mysqli_query($con,"SELECT `group_name`, `description`, `first_name`, `last_name`, `group`.`group_id`, 
					            		`contact_number`, `email` FROM `group`, `employee` WHERE `group`.`creator_id` = $user_id");   
								while($row1=mysqli_fetch_array($result1)) {
									$id1 = $row1['group_id'];       
					            	$group_name1 = $row1['group_name'];
					            	$description1 = $row1['description'];
					            	$first_name1 = $row1['first_name'];
					            	$last_name1 = $row1['last_name'];
					            	$contact_number1 = $row1['contact_number'];
					            	$email1 = $row1['email'];									
									if (!in_array($id1, $groupidarr)) {
										echo "<li>";
										echo "<input type=\"radio\" id=$int name=\"radio-accordion\">";
										echo "<label for=$int style=\"margin-bottom: 0px\">".$group_name1."</label>";
										echo "<div class=\"content\">";
										echo "<p>Group description: ".$description1."</p>";
										echo "<p>Creator: ".$first_name1." ".$last_name1."</p>";
										echo "<p>Creator contact number: ".$contact_number1."</p>";
										echo "<p>Creator email: ".$email1."</p>";
										echo "<p>Group members: </p>";
										$re1 = mysqli_query($con,"SELECT first_name, last_name, contact_number, email FROM `group_employee`, employee, `group` WHERE `group_employee`.`group_id`=`group`.`group_id` AND employee.`employee_id`=`group_employee`.`employee_id` AND `group`.`group_id`=$id1"); 
										while($ro1=mysqli_fetch_array($re1)){
											$efn1 = $ro1['first_name'];
											$eln1 = $ro1['last_name'];
											$econta1 = $ro1['contact_number'];
											$eemail1 = $ro1['email']; 
											echo "<p>".$efn1." ".$eln1." ".$econta1." ".$eemail1."</p>";
										}
										echo "</div>";
										echo "</li>";
										$groupidarr[] = $id;
									}
									$int = $int +1;	
								}
					                
					        ?>
						</ul>
					</div>			 
				</div>
            </div>
        </div>
	</body>
</html>