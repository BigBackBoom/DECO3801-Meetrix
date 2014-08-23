<!DOCTYPE html>
<html>
	<head>
		<!--Load the AJAX API-->
    	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    	<script type="text/javascript" src="js/google-chart.js"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
    	<!-- default css -->
    	<link rel="stylesheet" media="all" type="text/css" href="css/style_draft.css" />
    	<link rel="stylesheet" href="responsive-tables.css">
    	
		<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="style_draft.css" rel="stylesheet" type="text/css">
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      		<script src="stylesheet" href="responsive-tables.js"></script>
    	<![endif]-->
	</head>
	
	<body>
		
						<h3>Create Meeting</h3>
						<div id="logo">
											
                        <table>
							<tr>
								<td>Meeting Name :</td>
								</tr><tr><td style="width: 308px"><input type="text"/></td>
							</tr>
							<tr>
								<td>Department :</td>
								</tr><tr><td style="width: 308px"><select>
								<option value="Sales">Select a Department
								</option>
								<option value="Sales">Sales</option>
								<option value="IT">IT</option>
								<option value="Management">Management</option>
								<option value="General">General</option>
								</select></td>
							</tr>
							<tr>
								<td>Meeting Description :</td>
								</tr><tr><td style="width: 308px">
								<textarea maxlength="400" style="width: 265px; height: 119px" ></textarea></td>
							</tr>
							<tr>
								<td>Meeting Date :</td>
								</tr><tr><td style="width: 308px"><input type="date"/></td>
							</tr>
							<tr>
								<td>Meeting Time :</td>
								</tr><tr><td style="width: 308px"><input type="time"/></td>
							</tr>
							<tr>
								<td>People Involved :</td>
								</tr><tr><td style="width: 308px"><input type="text"/><input type="button" value="Search"/></td>
							</tr>
							<tr>
								<td>Group : </td>
								</tr><tr><td style="width: 308px"><select>
								<option value="Sales">Select a Group</option>
								<option value="Sales">Group 1</option>
								<option value="IT">Group 2</option>
								<option value="Management">Group 3</option>
								<option value="General">Group 4</option>
								</select><input type="button" value="Add"/></td>
							</tr>
							<tr><td style="height: 111px; width: 308px;">
								<textarea maxlength="500" style="width: 258px; height: 114px;"></textarea></td>
							</tr>
							<tr><td>
								<input type="submit" value="Create"/>
								<input type="reset" value="Reset"/></td>
							</tr>
			</table>
	</div>
		<div id="footer_nav">
			<ul class="account_nav">
				<li class="account_nav"><a href="#" class="account">
				<img class="logo" src="img/icons/homeicon.png" height="49" width="50px" alt="home"></a></li>
				<li class="account_nav"><a href="#" class="account"><img class="logo" src="img/icons/agendaicon.png" height="50px" width="50px" alt="meeting"></a></li>
				<li class="account_nav"><a href="#" class="account"><img class="logo" src="img/icons/user_p.png" height="50px" width="50px" alt="group"></a></li>
				<li class="account_nav"><a href="#" class="account"><img class="logo" src="img/icons/profileicon.png" height="50px" width="50px" alt="setting"></a></li>
			</ul>
		</div>
	</body>
</html>