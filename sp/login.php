<!DOCTYPE html>
<html>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<script src='js/jquery-1.10.2.min.js'></script>
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	<script>
    		function redirect(divID){
    			$('html, body').animate({
       				 scrollTop: $(divID).offset().top
    			}, 1000);
    		}
    		
    		function redirectVote(id){
    			window.location.href ="votingPage.php?votingId=" + id
    		}
    	</script>
	</head>
	
	<?php
		session_start();
		$message="";
	
		if(count($_POST) > 0) {
			$conn = mysql_connect("localhost","root","Menu6Rainy*guilt");
			mysql_select_db("meetrix_database",$conn);
			$result = mysql_query("SELECT * 
								FROM employee 
								WHERE username='" . $_POST["user_name"] . "' and passwordHash = '". md5($_POST["password"])."'");			
			$row  = mysql_fetch_array($result);
		
			if(is_array($row)) {
				$_SESSION["user_id"] = $row['employee_id'];
				$_SESSION["admin_level"] = $row['admin_group'];
			} else {
				$message = "Invalid Username or Password!";
			}
		}
		if(isset($_SESSION["user_id"])) {
			header("Location:index.php");
		}
	?>
	
	<body style="height: 600px;">
		<div id="logo">
			<img class="logo" src="img/logo.png" height="180px" width="180px" alt="logo">
		</div>
		
		<form role="form" name="form1" method="post" action="">
			<div class="form-group" style='width: 70%; display:block; margin-left: auto; margin-right:auto; margin-top: 10px; margin-bottom: 10px;'>
        		<label for="username" style='text-align: center; '>Username: </label>
           		<input type="text" name="user_name" class="form-control" id="exampleInputUsername1" placeholder="Enter username">
        	</div>
       		<div class="form-group" style='width: 70%; display:block; margin-left: auto; margin-right:auto; margin-top: 10px; margin-bottom: 10px;'>
            	<label for="password">Password: </label>
            	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        	</div>
            
            <button type="submit" name="Submit" class="btn btn-default" style='width: 70%; display:block; margin-left: auto; margin-right:auto; margin-top: 10px; margin-bottom: 10px;
            background-color: rgba(0, 233, 0, 0.4);
			border-color: #005500;
			border-width: 1px;
			border-style: solid;
    		border-radius: 25px;'>Submit</button>
        </form>
		
	</body>
</html>
