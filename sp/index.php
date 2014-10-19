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
    		
    		function logout(){
    			window.location.href ="logout.php"
    		}
    	</script>
	</head>
	
	<?php
		session_start();
		if(!isset($_SESSION["user_id"])) {
			header("Location:login.php");
		}
		
		/*initial connection to database*/
		$host="localhost"; // Host name 
		$username='root'; // Mysql username 
		$password='Menu6Rainy*guilt'; // Mysql password 
		$db_name='meetrix_database'; // Database name 
		$tbl_name='meeting'; // Table name 
		$pdo = new PDO("mysql: host=$host; dbname=$db_name", "$username", "$password");
		
		/*temporary only searching meeting where employee id 1 is in*/			
		$st = $pdo->query("SELECT `meeting`.*, `votes_meeting`.vote_id, `votes`.question
						FROM `meeting`
						INNER JOIN `meeting_group` ON `meeting`.meeting_id=`meeting_group`.meeting_id
						INNER JOIN `group` ON `meeting_group`.group_id=`group`.group_id
						INNER JOIN `group_employee` ON `meeting_group`.group_id=`group_employee`.group_id
						INNER JOIN `votes_meeting` ON `meeting`.meeting_id=`votes_meeting`.meeting_id
						INNER JOIN `votes` ON `votes_meeting`.vote_id=`votes`.vote_id
						WHERE `group_employee`.employee_id=$_SESSION[user_id] or `meeting`.creator_id = $_SESSION[user_id]
						ORDER BY `votes_meeting`.vote_id DESC
						");
		/*feth all data*/
		$posts = $st->fetchAll();
	?>
	
	<body style="height: 600px;">
		<div id="logo">
			<img class="logo" src="img/logo.png" height="180px" width="180px" alt="logo">
		</div>
		<div id="meeting">
			<button class="home" type="button">Meeting</button>
		</div>
		<div id="group">
			<button class="home" type="button">Group</button>
		</div>
		
		<div id="voting">
			<button class="home" type="button" onclick="redirect('#votingList')">Voting</button>
		</div>
		
		<div id="logout">
			<button class="home" type="button" style='background-color: rgba(0, 158, 0, 0.4); width: 300px;' onclick="logout()">Logout</button>
		</div>
		
		<div id="votingList">
			<div id="subHeader"><h2>Avaliable Voting</h2></div>
			<div class='contents'>
			<?php 
				$i = 0;
				foreach($posts as $post){
					/*$st = $pdo->query("SELECT * 
									FROM `votes_meeting` 
									INNER JOIN `vote_log` ON `votes_meeting`.vote_id = `vote_log`.vote_id 
									WHERE EXISTS (SELECT * FROM `vote_log` 
									WHERE `votes_meeting`.vote_id = `vote_log`.vote_id AND 
									`vote_log`.employee_id = $_SESSION[user_id] AND `vote_log`.vote_id = $post[vote_id])");*/
					
					/*$posts2 = $st->fetchAll();*/
					if(($i%2)){
						echo "<div class='voteEntry' onclick = 'redirectVote($post[vote_id])' id='$post[vote_id]' style='background-color: #DDDDDD'><p class='voteL'>$post[question]</p></div>";
					} else {
						echo "<div class='voteEntry' onclick ='redirectVote($post[vote_id])' id='$post[vote_id]'><p class='voteL'>$post[question]</p></div>";
					}
					$i++;
				}
			?>
		</div>
		</div>
		
		</div>
	</body>
</html>