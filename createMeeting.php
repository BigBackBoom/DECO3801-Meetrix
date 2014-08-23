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
			</div>
		</div>
		<!--main contents comes inside here-->
		<div id ="contents">
			<!--left side of the contents such as icon and navigation bar-->
			<div id ="left">
				<!--icon img-->
				<div id="icon">
					<img class="logo" src="img/logo.png"/>
				</div>
				<!--navigation bars-->
				<div id="navigation">
					<ul class="navigation">
						<li class="navigation"><p class="nav_man">Meetings</p></li>
							<ul class="sub_navigation">
								<li class="sub_navigation"><p class="sub_nav_man">View Meetings</p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Create Meeting</p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Delete Meeting</p></li>
							</ul>
						<li class="navigation"><p class="nav_man">Groups</p></li>
							<ul class="sub_navigation">
								<li class="sub_navigation"><p class="sub_nav_man">View Groups</p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Create Group</p></li>
								<li class="sub_navigation"><p class="sub_nav_man">Delete Group</p></li>
							</ul>
					</ul>
				</div>
			</div>
			<!--Main contents comes in side here please edit or enter contents in here-->
			<div id="main">
				<h2>Create Meeting</h2>
				<form action="createMeeting.php" method="post">
				
				<table>
				
                        <tr><td>Meeting Name :</td><td><input type="text" name="name"/></td></tr>
                        <tr><td>Department :</td><td><select name="department">
                        									<option value="Sales">Sales</option>
                        									<option value="IT">IT </option>
															<option value="Management">Management</option>
															<option value="General">General</option>

                        							 </select></td></tr>
                        <tr><td>Meeting Description :</td><td>
							<textarea name="description" maxlength="400" style="width: 384px; height: 135px" ></textarea></td></tr>
                        <tr><td>Meeting Date :</td><td><input type="date" name="date"/></td></tr>
                        <tr><td>Meeting Time :</td><td><input type="time" name="duration"/></td></tr>
                        <tr><td>People Involved :</td><td><input type="text"/><input type="button" value="Search"/></td></tr>
                        <tr><td>Group : </td><td><select name="group">
                        									<option value="Sales">Group 1</option>
                        									<option value="IT">Group 2</option>
															<option value="Management">Group 3</option>
															<option value="General">Group 4</option>

                        </select><input type="button" value="Add"/></td></tr>
                        <tr><td style="height: 111px"></td>
							<td colspan="2" style="height: 111px">
							<textarea maxlength="500" style="width: 386px; height: 155px;"></textarea></td></tr>
						<tr><td></td><td align="right"><input type="submit" value="Create" name="submit"/><input type="reset" value="Reset"/></td></tr>


                        </table>
                        </form>
                          	<?php 
$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 
  
$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected'); 
if(isset($_POST['submit'])) 
{ 
      
    $name=$_POST['name']; 
    $department=$_POST['department']; 
    $date=$_POST['date']; 
    $duration=$_POST['duration'];
    $description=$_POST['description'];
    $group=$_POST['group'];  
      
if(empty($name) || empty($department) || empty($date) || empty($duration) || empty($description) || empty($group)) 
    { 
          
        if(empty($name)) 
        { 
            echo "<font color='red'>Name field is empty.</font><br/>"; 
        } 
          
        if(empty($department)) 
        { 
            echo "<font color='red'>Department field is empty.</font><br/>"; 
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

    } 
else{ 
$sql="INSERT INTO `meeting`(`name`, `department`, `date`, `duration`, `description`, `group`) VALUES 
('$_POST[name]' ,'$_POST[department]' ,'$_POST[date]', '$_POST[duration]', '$_POST[description]', '$_POST[group]')"; 
if (!mysqli_query($conn,$sql)) 
  { 
  die('Error: ' . mysqli_error($conn)); 
  } 
echo "<font color='green'>Meeting is created!</font>"; 
  
mysqli_close($conn); 
} 
} 
?>

							</div>
			<!--Main contents ends here-->
		</div>
	</body>
</html>