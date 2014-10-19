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
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	
    	<script>
    		function resizeWinTo(meetingId) {
    			var height = window.screen.height;
    			var width = window.screen.width;
    			window.location.replace("/meetingPage.php?meetingId=" + meetingId);
   				resizeTo(width, height);
			}
			
			function resizeWinTo2(meetingId) {
    			var height = window.screen.height;
    			var width = window.screen.width;
    			window.location.replace("/viewMeetingRecord.php?meetingId=" + meetingId);
   				resizeTo(width, height);
			}  
    	</script>
  	</head>
  	
  	<?php
  	
  		function endDate($date, $duration){
			$startSec = strtotime($date);
			$durSec = explode(":", $duration);
			$sec =  (intval($durSec[0]) * 3600) + (intval($durSec[1]) * 60) + intval($durSec[2]);
			$temp = intval($startSec) + $sec;
			return $temp;
		}
  		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='meeting'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		/*get all room name, group name and department name from database using corresponding id*/
		$st1 = $pdo->query("SELECT `room`.room_name, `department`.department_name
						FROM `meeting`
						INNER JOIN `room` ON `meeting`.room_id=`room`.room_id
						INNER JOIN `department` ON `meeting`.department_id=`department`.department_id
						WHERE `meeting`.meeting_id=". $_GET["id"] . ";");
		
		/*get all deparment name*/				
		$st2 = $pdo->query("SELECT `group`.group_name
						FROM `group`
						INNER JOIN `meeting_group` ON `group`.group_id=`meeting_group`.group_id
						INNER JOIN `meeting` ON `meeting_group`.meeting_id=`meeting`.meeting_id
						WHERE `meeting`.meeting_id=". $_GET["id"] . ";");
		
		$posts = $st1->fetchAll();
		$posts2 = $st2->fetchAll();
		
		/*convert millisecond to second is required*/
		$duration = ($_GET["end"] - $_GET["start"])/1000;
		$duration = date('H:i:s', $duration);
		$start = $_GET["start"]/1000;
		$originalStart = $start;
		$start = new DateTime("@$start");
		$end = endDate($start->format('Y-m-d H:i:s'), $duration);
		//echo $end. " " . $originalStart;
		date_default_timezone_set('Australia/Brisbane');
		//date_default_timezone_set("UTC");
		//echo date_default_timezone_get();
		$current = date('Y-m-d H:i:s');
		date_default_timezone_set('UTC');
		$current = strtotime($current);
		//date_default_timezone_set("UTC");
		//echo $current;
  	?>
  	
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="meetingPopUp">
				<?php
				echo "<table>";
					echo "<tr>";
						echo "<td><label for='meeting_title'>Meeting ID</label></td>";
						echo "<td>". $_GET["id"] ."</td>";
					echo "</tr>";
					
					echo "<tr>";
		  				echo "<td><label for='meeting_title'>Meeting Title</label></td>";
		  				echo "<td>". $_GET["title"] ."</td>";
	  				echo "</tr>";
	  				
	  				echo "<tr>";
						echo "<td><label for='department'>Department</label></td>";
						echo "<td>". $posts[0]['department_name'] ."</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Supervisor</label></td>";
						echo "<td>". $_GET["supervisor_id"]. "</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Start</label></td>";
						echo "<td>". $start->format('Y-m-d H:i:s') ."</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Duration</label></td>";
						echo "<td>". $duration ."</td>";
					echo "<tr>";
					
					echo "<tr>";
						echo "<td><label>Description</label></td>";
						echo "<td>". $_GET["description"] ."</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Group</label></td>";
						echo "<td>";
						
						foreach($posts2 as $post){
							echo "<li>". $post['group_name']."</li>";
						}
						echo "</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Room</label></td>";
						echo "<td>". $posts[0]['room_name'] ."</td>";
					echo "</tr>";
				echo "</table>";
				
				//echo "$originalStart <= $current $current < $end";
				if(($originalStart - 300) <= $current && $current < $end){
					echo "<button type='button' onclick='resizeWinTo(". $_GET["id"] .")'>Start Meeting</button>";
				} else if ($current < ($originalStart - 300)){
					echo "<button type='button' onclick='resizeWinTo(". $_GET["id"] .")' disabled>Start Meeting</button>";
				} else {
					echo "<button type='button' onclick='resizeWinTo2(". $_GET["id"] .")'>View Meeting Records</button>";
				}
				
				
				?>
		</div>
		<!--Main contents ends here-->
		</div>
	</body>
</html>