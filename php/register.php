<?php
	session_start();
	
	$userId = $_POST["userId"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$cpassword = $_POST["c_password"];
	
	$conn = mysql_connect("localhost","root","Menu6Rainy*guilt");
	mysql_select_db("meetrix_database",$conn);
	
	/*check userid existense*/
	$result = mysql_query("SELECT EXISTS(SELECT * FROM employee WHERE employee_id='" . $userId . "')");
	$row  = mysql_fetch_array($result);
	
	if($row[0] == 0){
		$_SESSION["error_message"] = "UserID does not exist";
		header("Location:/login.php");
		exit();
	}
	
	/*check username existense*/
	$result = mysql_query("SELECT EXISTS(SELECT * FROM employee WHERE username='" . $username . "')");
	$row  = mysql_fetch_array($result);
	
	if($row[0] == 1){
		$_SESSION["error_message"] = "Username already exist";
		header("Location:/login.php");
		exit();
	}
	
	/*Check password are the same*/
	if($password != $cpassword) {
		$_SESSION["error_message"] = "Confirmed password is not the same as password.";
		header("Location:/login.php");
		exit();
	}
	
	$result = mysql_query("SELECT username, passwordHash FROM employee WHERE employee_id='" . $userId . "'");
	$row  = mysql_fetch_array($result);
	
	if(strlen($row['username']) > 0 || strlen($row['passwordHash']) > 0){
		echo $row['username'];
		$_SESSION["error_message"] = "You are already registered";
		header("Location:/login.php");
		exit();
	}
	
	$result = mysql_query("UPDATE employee
						SET `username`='". $username ."', `passwordHash`='". md5($password) ."'
						WHERE `employee_id`='". $userId ."'");
						
	$row  = mysql_fetch_array($result);
	
	header("Location:/login.php");
?>