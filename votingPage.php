<!DOCTYPE html>
<html>
	<head>
   		<meta charset="utf-8">
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style.css" />
    	<title>Meetrix "Meeting Management System"</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<script src='js/jquery-1.10.2.min.js'></script>
		<script src='js/timer2.js'></script>

    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	<?php
	  		session_start();
			
			function endDate($date, $duration){
				$startSec = strtotime($date);
				$durSec = explode(":", $duration);
				$sec =  (intval($durSec[0]) * 3600) + (intval($durSec[1]) * 60) + intval($durSec[2]);
				$temp = intval($startSec) + $sec;
				$date = new DateTime("@$temp");
				$end = date('Y-m-d H:i:s', strval($temp));
				return $date->format('Y-m-d H:i:s');
			}
			
			/*initial connection to database*/
			$host="localhost"; // Host name 
			$username='root'; // Mysql username 
			$password='Menu6Rainy*guilt'; // Mysql password 
			$db_name='meetrix_database'; // Database name 
			$tbl_name='meeting'; // Table name 
			$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
			$resultId = $_POST['answer'];
			$votingId = $_GET['votingId'];
			
			if(isset($_POST['answer'])){
				$st1 = $pdo->query("SELECT EXISTS(SELECT * FROM `vote_log` WHERE `vote_log`.vote_id=". $_SESSION["votingId"]  ." and `vote_log`.employee_id='" . $_SESSION["user_id"] . "')");
				/*$st1 = $pdo->query("SELECT *
								FROM `vote_log`
								WHERE `vote_log`.vote_id=". $votingId . " and `vote_log`.employee_id=". $_SESSION["user_id"] .";");*/
				$posts = $st1->fetchAll();
				
				if($posts[0][0] == 0){
					$st1 = $pdo->query("UPDATE `result`
								SET `data`=`data` + 1
								WHERE result_id=".$resultId);
				
					$st1 = $pdo->query("INSERT INTO `vote_log`(`vote_id`, `result_id`, `employee_id`) VALUES (". $_SESSION["votingId"] .", ". $resultId .", ". $_SESSION["user_id"]  .")");
					
					echo "you have successfully voted";
					unset($_SESSION["votingId"]);
					exit(0);
				}else{
					echo "You were arleady voted";
					unset($_SESSION["votingId"]);
					exit(1);
				}
								
			} else {
				
				/*get all room name, group name and department name from database using corresponding id*/
				$st1 = $pdo->query("SELECT *
								FROM `vote_result`
								INNER JOIN `result` ON `vote_result`.result_id=`result`.result_id
								INNER JOIN `votes` ON `vote_result`.vote_id=`votes`.vote_id
								WHERE `vote_result`.vote_id=". $votingId . ";");
				
				$posts = $st1->fetchAll();
				
				$end = endDate($posts[0]['startDate'], $posts[0]['duration']);
				date_default_timezone_set('Australia/Brisbane');
				$current = date('Y-m-d H:i:s');
				$_SESSION["votingId"] = $votingId;
				/*if(strtotime($current) > strtotime($end)){
					$_SESSION["votingId"] = $votingId;
					header("Location: viewVotingResult.php");
				}*/
			}
			
	  	?>
    	<script>
	  		$(document).ready(function(){
	  			timer('<?php echo $current;?>', '<?php echo $end;?>');
	  		})
  		</script>
  	</head>
  	
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="votingPopUp">
			<p id="timeleft">Time Left: </p> 
			<form action="votingPage.php" id="edit" method="post">
				<?php
					echo "<p>". $posts[0]['question'] ."</p>";
					foreach($posts as $post){
						echo "<input type='radio' name='answer'  value='". $post['result_id']."'>". $post['answer'];
						echo "<br/>";	
					}
					echo "<input type='submit' value='Submit'>";
				?>
			</form>	
		</div>
	</body>
</html>