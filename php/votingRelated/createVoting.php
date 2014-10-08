<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">

    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	<script type="text/javascript">
    		function refreshAndClose() {
       			 window.opener.location.reload(true);
       			 window.close();
    		}
		</script>
  	</head>

	<?php
		
		$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 			  
		$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected');
		date_default_timezone_set('Australia/Brisbane');
		$sql = "INSERT INTO `votes`(`title`,`question`, `startDate`, `duration`) VALUES 
					('$_POST[title]', '$_POST[question]','". date('Y-m-d H:i:s') ."', '$_POST[duration]')";
		date_default_timezone_set('UTC');			
			
		mysqli_query($conn, $sql);
		$voteId = mysqli_insert_id($conn);
		
		$sql = "INSERT INTO `votes_meeting`(`meeting_id`,`vote_id`) VALUES 
					('$_POST[meetingID]', '$voteId')";
					
			
		mysqli_query($conn, $sql);
		
		$loop = 1;
		foreach ($_POST as $key => $value){
			if($loop > 4){
				$sql = "INSERT INTO `result`(`answer`,`data`) VALUES 
					('$value', '0')";
				mysqli_query($conn, $sql);
				$resultId = mysqli_insert_id($conn);
				
				$sql = "INSERT INTO `vote_result`(`vote_id`,`result_id`) VALUES 
					('$voteId', '$resultId')";
				mysqli_query($conn, $sql);
			}
			$loop++;
		}
	?>
	
	<body>
		<p>The voting was edited successfully</p>
		<input type="button" value="Close" onclick="refreshAndClose() ">
	</body>
</html>