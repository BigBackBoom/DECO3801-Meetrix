<!DOCTYPE html>
<html>
	<?php 
		session_start();
	?>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
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
    	<style type="text/css">
			#window {
			    margin-right:auto;
			    margin-left:auto;
			    width: 400px;
			}
		</style>
		<script type="text/javascript">
    		function refreshAndClose() {
       			 window.opener.location.reload(true);
       			 window.close();
    		}
    		
    		function redirect(){
				var link = "viewVotingResult.php";
				window.open(link, "createVoting", "height=600,width=800");	
			}
		</script>
  	</head>
	<body>
		<!--Header on top of the page where all user account setting navigation should be done-->
		<div id ="window">
			<p style="text-align: center; font-size: 20px;">The voting was finished</p>
			<div id ="buttons" style="margin-right:auto; margin-left:auto; width: 208px;">
				<button type="button" onclick="refreshAndClose()" style="margin:5px;">Close Window</button>
				<button type="button" onclick="redirect()" style="margin:5px;">View Result</button>
			</div>
		</div>
	</body>
</html>