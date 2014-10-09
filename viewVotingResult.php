<!DOCTYPE html>
<html>
	<?php 
		if(strpos($_SERVER['HTTP_USER_AGENT'], "iPhone") || strpos($_SERVER['HTTP_USER_AGENT'], "Android")){
			header( 'Location: sp/index.php' ) ;
		}
		session_start();
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
    	<?php
	  		session_start();
			
			/*initial connection to database*/
			$host="localhost"; // Host name 
			$username='root'; // Mysql username 
			$password='Menu6Rainy*guilt'; // Mysql password 
			$db_name='meetrix_database'; // Database name 
			$tbl_name='meeting'; // Table name 
			$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
			$votingId = $_SESSION["votingId"];
				
			/*get all room name, group name and department name from database using corresponding id*/
			$st1 = $pdo->query("SELECT *
							FROM `vote_result`
							INNER JOIN `result` ON `vote_result`.result_id=`result`.result_id
							INNER JOIN `votes` ON `vote_result`.vote_id=`votes`.vote_id
							WHERE `vote_result`.vote_id=". $votingId . ";");
				
			$posts = $st1->fetchAll();	
	  	?>
	  	<script type="text/javascript">
		    var jArray= <?php echo json_encode($posts); ?>;
		</script>
  	</head>
	<body onload="drawVoting_Result(jArray)">
		<div class="charts" id="chart_pallet">
		</div>
	</body>
</html>