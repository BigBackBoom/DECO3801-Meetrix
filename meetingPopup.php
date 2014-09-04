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
  	</head>
	<body>
		<!--Main contents comes in side here please edit or enter contents in here-->
		<div id="meetingPopUp">
			<form action="demo_form.asp" id="form1">
  				<label for="meeting_title">Meeting Title</label><input type="text" name="meeting_name" id="male" value="">
				<label for="department">Department</label>
				<select name="department">
					<option value="lions">Lions</option>
				</select>
				<label>Supervisor</label>
				<input type="text" name="super_visor" value="">
				<label>Date</label>
				<input type="text" name="date" value="">
				<label>Description</label>
				<input type="text" name="description" value="">
				<label>Group</label>
				<input type="text" name="group" value="">
				<label>Room</label>
				<input type="text" name="super_visor" value="">
				<input type="submit" value="Submit">
			</form>	
		</div>
		<!--Main contents ends here-->
		</div>
	</body>
</html>