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
    		var choice = 3;
    		function addChoice(){
    			var div = document.getElementById('voting_form');
    			var string = "<label for='question'>choice"+ choice +": </label> " + "<input type='text' name='choice " + choice + "'><br/>";
    			var label = document.createElement("label");
    			var input = document.createElement("input");
    			var br = document.createElement("br");
    			
    			label.setAttribute("for","question");
    			input.setAttribute("type","text");
    			input.setAttribute("name","choice: " + choice);
    			label.appendChild(document.createTextNode("choice " + choice));
    			div.appendChild(label);
    			div.appendChild(input);
    			div.appendChild(br);
    			
    			choice++;
    		}
    	</script>
    	
  	</head>
  	
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="meetingPopUp">
				
			<form action='createVoting.php' method='post' id='voting_form'>
				<input type='text' name='meetingID' value="<?php echo $_GET['meetingId']?>" style="display: none;">
				<label for='title'>Voting Title: </label> 
				<input type='text' name='title'> <br/>
				<label for='question'>Question: </label> 
				<input type='text' name='question'><br/>
				<label for='question'>choice 1: </label> 
				<input type='text' name='choice 1'><br/>
				<label for='question'>choice 2: </label> 
				<input type='text' name='choice 2'><br/>
			</form>
			<button type="button" onclick="addChoice()">Add More Choice</button>
			<button type="submit" value="Submit" form="voting_form">Submit</button>
		</div>
		<!--Main contents ends here-->
		</div>
	</body>
</html>