<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="js/google-chart.js"></script>
    <script src='js/jquery-1.10.2.min.js'></script>
    <script src='js/timer.js'></script>
    <script>
    	function redirect1(id){
			var link = "php/votingRelated/createVotingPopup.php?meetingId=" + id ;
			window.open(link, "createVoting", "height=600,width=800");	
		}
		
		function redirect2(id){
			var link = "votingPage.php?votingId=" + id ;
			window.open(link, "vote", "height=600,width=800");	
		}
    </script>
	<head>
		<style type="text/css">
			#header {
			    background-color:green;
			    color:white;
			    text-align:center;
			    padding:5px;
			}
			#section {
			    display:inline-block;
			    width:350px;
			    float:left;
			    padding:10px;	 	 
			}
			
			#timeleft {
			    display:block;
			    margin-right: auto;
			    margin-left: auto;
			    margin-top: 30px;
			    width: 300px;
			    height: 30px;
			    font-size: 20px; 	 
			}
			#footer {
			    background-color:black;
			    color:white;
			    clear:both;
			    text-align:center;
			   padding:5px;	 	 
			}
			.auto-style1 {
				margin-left: 145px;
			}
			.auto-style2 {
				border-width: 5px;
			}
			.auto-style4 {
				border: 5px solid #000000;
				text-align: center;
			}
		</style>
		
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
			//date_default_timezone_set('Australia/Brisbane');
	  		/*initial connection to database*/
			$host="localhost"; // Host name 
			$username='root'; // Mysql username 
			$password='Menu6Rainy*guilt'; // Mysql password 
			$db_name='meetrix_database'; // Database name 
			$tbl_name='meeting'; // Table name 
			$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
			$meetingId = $_GET['meetingId'];
			
			/*get all room name, group name and department name from database using corresponding id*/
			$st1 = $pdo->query("SELECT *
							FROM `meeting`
							INNER JOIN `room` ON `meeting`.room_id=`room`.room_id
							INNER JOIN `supervisor` ON `meeting`.supervisor_id=`supervisor`.supervisor_id
							INNER JOIN `employee` ON `supervisor`.employee_id=`employee`.employee_id
							INNER JOIN `department` ON `meeting`.department_id=`department`.department_id
							WHERE `meeting`.meeting_id=". $meetingId . ";");
							
			$st2 = $pdo->query("SELECT `group`.group_name
							FROM `group`
							INNER JOIN `meeting_group` ON `group`.group_id=`meeting_group`.group_id
							INNER JOIN `meeting` ON `meeting_group`.meeting_id=`meeting`.meeting_id
							WHERE `meeting`.meeting_id=". $meetingId . ";");
			
			$st3 = $pdo->query("SELECT `votes`.vote_id, `votes`.title
							FROM `meeting`
							INNER JOIN `votes_meeting` ON `meeting`.meeting_id=`votes_meeting`.meeting_id
							INNER JOIN `votes` ON `votes_meeting`.vote_id=`votes`.vote_id
							WHERE `meeting`.meeting_id=". $meetingId . ";");
			
			$posts = $st1->fetchAll();
			$posts2 = $st2->fetchAll();
			$posts3 = $st3->fetchAll();
			
			$end = endDate($posts[0]['date'], $posts[0]['duration']);
			date_default_timezone_set('Australia/Brisbane');
			$current = date('Y-m-d H:i:s');
  		?>
		
		<script>
	  		$(document).ready(function(){
	  			timer('<?php echo $current;?>', '<?php echo $end;?>');
	  		})
  		</script>
	</head>
	
	<body onload="count" style="height: 478px">

  		<div id="header">
			<h1 style="height: 33px"><?php echo $posts[0]['name'];?></h1>
		</div>   

		<div id="timeleft">
			Time Left: 00:00:00
		</div>
	    <div id="section">
	        <table style="width: 131%; height: 330px;" class="auto-style2">
	            <tr>
	                <td class="auto-style4" style="height: 110px; width: 913px;">
	                    Agenda 1<label id="Label1"></label></td>
	            </tr>
	            <tr>
	                <td class="auto-style4" style="width: 913px">
	                    Agenda 2</td>
	            </tr>
	            <tr>
	                <td class="auto-style4" style="width: 913px">
	                    Agenda 3</td>
	            </tr>
	            </table>
	        
			<table style="width: 131%; height: 183px;">
	            <tr>
	                <td class="auto-style4" style="width: 603px">
	                    Agenda 4</td>
	            </tr>
	            </table>
			<table style="width: 131%; height: 330px;">
	            <tr>
	                <td class="auto-style4" style="width: 528px">
	                    Agenda 5</td>
	            </tr>
	        </table>
		</div>
     	<div id="section" class="auto-style1" style="width: 722px">
     		<?php
     			echo "<table>";
					echo "<tr>";
						echo "<td><label for='meeting_title'>Meeting ID: </label></td>";
						echo "<td>". $posts[0]['meeting_id'] ."</td>";
					echo "</tr>";
	  				
	  				echo "<tr>";
						echo "<td><label for='department'>Department: </label></td>";
						echo "<td>". $posts[0]['department_name'] ."</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Supervisor: </label></td>";
						echo "<td>". $posts[0]['first_name']. " ". $posts[0]['last_name'] . "</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Start: </label></td>";
						echo "<td>". $posts[0]['date'] ."</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Duration: </label></td>";
						echo "<td>". $posts[0]['duration'] ."</td>";
					echo "<tr>";
					
					echo "<tr>";
						echo "<td><label>End: </label></td>";
						echo "<td>". $end ."</td>";
					echo "<tr>";
					
					echo "<tr>";
						echo "<td><label>Description: </label></td>";
						echo "<td>". $posts[0]['description'] ."</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Group: </label></td>";
						echo "<td>";
						
						foreach($posts2 as $post){
							echo "<li>". $post['group_name']."</li>";
						}
						echo "</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td><label>Room: </label></td>";
						echo "<td>". $posts[0]['room_name'] ."</td>";
					echo "</tr>";
				echo "</table>";
     		?>
     		<?php
     			$votingNum = 1;
				
				foreach($posts3 as $post){
					echo "Voting ". $votingNum .": ";
					echo "<span style='cursor:pointer; color:blue; text-decoration: underline' onclick='redirect2("; 
					echo $post['vote_id'];
					echo ")'>";
					echo $post['title'];
					echo "</span>";
					echo "<br/>";
					$votingNum++;
				}
     		?>
	        <br />
	        <input id="Button1" type="button" onclick= "redirect1(<?php echo $posts[0]['meeting_id']; ?>)" value="Create New Vote" /><br />
		</div>        
        
	</body>
</html>
