<?php
session_start();
if(!isset($_SESSION["user_id"])) {
header("Location:login.php");
} 
?>

<!DOCTYPE html>
<html>
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
    	<!-- smartphones css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/smart.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link rel="stylesheet" media="all" type="text/css" href="css/chosen.css" />
    	<link rel="stylesheet" media="all" type="text/css" href="css/chosen.min.css" />


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
				</ul>
				<?php
					if(isset($_SESSION["user_id"])) {
						echo "<button type='button' class='account_nav' onclick='location.href = \"php/logout.php\";'>Logout</button>";
					}
				?>

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
			<!--Main contents comes in side here please edit or enter contents in here-->
			<div id="main" style='height: 700px;'>
				<h2>Create Meeting</h2>
				<form action="createMeeting.php" method="post">
				
				<table>
				
                        <tr><td>Meeting Name :</td><td><input type="text" name="name"/></td></tr>
                        <tr><td>Meeting Description :</td><td>
							<textarea name="description" maxlength="400" style="width: 384px; height: 135px" ></textarea></td></tr>
                        <tr><td>Meeting Date :</td><td><input type="date" name="date"/></td></tr>
                        <tr><td>Meeting Time :</td><td><input type="time" name="duration"/></td></tr>
                      
                        <tr><td>Group : </td><td><select data-placeholder="Choose a Group..." name="group[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                 
            <?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="Menu6Rainy*guilt";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'meetrix_database';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT `group_name`, `group_id` FROM `group`";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["group_name"];
            $groupid=$cdrow["group_id"];
                echo "<option value=$groupid>$cdTitle </options>";
            
            }
                
            ?>
    
        </select>
		</td></tr>				
			
		<tr><td><br/><br/></td><td align="right"><input type="submit" value="Create" name="submit"/><input type="reset" value="Reset"/></td></tr>


                        </table>
                        </form>
                          	<?php 
			$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 
				  
			$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected'); 
			if(isset($_POST['submit'])) 
			{ 
			      
			    $name=$_POST['name']; 
			    $date=$_POST['date']; 
			    $duration=$_POST['duration'];
			    $description=$_POST['description'];
			    $group=$_POST['group'];  
			      
			/*if(empty($name) || empty($date) || empty($duration) || empty($description) || empty($group)) 
			    { 
			          
			        if(empty($name)) 
			        { 
			            echo "<font color='red'>Name field is empty.</font><br/>"; 
			        } 
			        if(empty($date)) 
			        { 
			            echo "<font color='red'>Date field is empty.</font><br/>"; 
			        } 
			        if(empty($duration)) 
			        { 
			            echo "<font color='red'>Time field is empty.</font><br/>"; 
			        } 
			        if(empty($description)) 
			        { 
			            echo "<font color='red'>Description field is empty.</font><br/>"; 
			        } 
			        if(empty($group)) 
			        { 
			            echo "<font color='red'>Group field is empty.</font><br/>"; 
			        } 
			
			    } */
		
			$sql="INSERT INTO `meeting`(`name`, `date`, `duration`, `description`) VALUES 
			('$_POST[name]', '$_POST[date]', '$_POST[duration]', '$_POST[description]')"; 
			

			mysqli_query($conn, $sql);
			$meetingId = mysqli_insert_id($conn);
 
 			foreach ($_POST['group'] as $select){
					$sql1 = "INSERT INTO `meeting_group`(`meeting_id`, `group_id`) VALUES ('". $meetingId ."', '". $select ."')";
			
					if (!mysqli_query($conn, $sql1)){
						die('Error: ' . mysqli_error($conn));
					}
					
				}
				echo "<font color='green'> New Meeting is created!</font>"; 
				mysqli_close($conn);
			}

			
			  		

			?>

							</div>
			<!--Main contents ends here-->
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
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