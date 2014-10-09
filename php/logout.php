<?php
	
	session_start();
	unset($_SESSION["user_id"]);
	unset($_SESSION["user_name"]);
	unset($_SESSION["admin_level"]);
	header("Location:/login.php");
	
?>