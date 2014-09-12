<!DOCTYPE html>
<html>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style_draft.css" />
    	<link rel="stylesheet" href="responsive-tables.css">
    	
		<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="style_draft.css" rel="stylesheet" type="text/css">
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="html5shiv.min.js"></script>
      		<script src="respond.min.js"></script>
      		<script src="stylesheet" href="responsive-tables.js"></script>
    	<![endif]-->
	</head>
	
	<body>
		

<div id="main">
				<h2>Create Meeting</h2>
				<form action="CreateMeeting3.php" method="post">
				
				<table>
				
                        <tr><td>Meeting Name :</td><td><input type="text" name="name"/></td></tr>
                        <tr><td>Meeting Description :</td><td>
							<textarea name="description" maxlength="400" style="cols=10 row=3" ></textarea></td></tr>
                        <tr><td>Meeting Date :</td><td><input type="date" name="date"/></td></tr>
                        <tr><td>Meeting Time :</td><td><input type="time" name="duration"/></td></tr>
                        <tr><td>People Involved :</td><td><input type="text"/><input type="button" value="Search"/></td></tr>
                        <tr><td>Group : </td><td><select name="group">
                        									<option value="Sales">Sales</option>
                        									<option value="IT">IT</option>
															<option value="Management">Management</option>
															<option value="General">General</option>

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
    $date=$_POST['date']; 
    $duration=$_POST['duration'];
    $description=$_POST['description'];
    $group=$_POST['group'];  
      
if(empty($name) || empty($date) || empty($duration) || empty($description) || empty($group)) 
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

    } 
else{ 
$sql="INSERT INTO `meeting`(`name`, `date`, `duration`, `description`, `group`) VALUES 
('$_POST[name]', '$_POST[date]', '$_POST[duration]', '$_POST[description]', '$_POST[group]')"; 
if (!mysqli_query($conn,$sql)) 
  { 
  die('Error: ' . mysqli_error($conn)); 
  } 
echo "<font color='green'> New Meeting is created!</font>"; 
  
mysqli_close($conn); 
} 
} 
?>

							</div>
			<!--Main contents ends here-->
		
	
	
		<div id="footer_nav">
			<ul class="account_nav">
				<li class="account_nav"><a href="#" class="account">
				<img class="logo" src="img/icons/homeicon.png" height="49" width="50px" alt="home"></a></li>
				<li class="account_nav"><a href="#" class="account"><img class="logo" src="img/icons/agendaicon.png" height="50px" width="50px" alt="meeting"></a></li>
				<li class="account_nav"><a href="#" class="account"><img class="logo" src="img/icons/user_p.png" height="50px" width="50px" alt="group"></a></li>
				<li class="account_nav"><a href="#" class="account"><img class="logo" src="img/icons/profileicon.png" height="50px" width="50px" alt="setting"></a></li>
			</ul>
			
			
		</div>
	</body>
</html>