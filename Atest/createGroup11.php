<!DOCTYPE html>
<html>
<?php 
include_once ('formsubmit.php');
?>
<head>
<!--Load the AJAX API-->
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script src="js/google-chart.js" type="text/javascript"></script>
<script type="text/javascript">
      		// Load the Visualization API and the piechart package.
      		google.load('visualization', '1.0', {'packages':['corechart']});

      		// Set a callback to run when the Google Visualization API is loaded.
      		google.setOnLoadCallback(drawChart_at_home);
      	</script>
<meta charset="utf-8">
<!-- default css -->
<link href="css/style.css" media="all" rel="stylesheet" type="text/css" />
<!-- tablest css -->
<link href="css/tablet.css" media="all" rel="stylesheet" type="text/css" />
<!-- smartphones css -->
<link href="css/smart.css" media="all" rel="stylesheet" type="text/css" />
<title>Meetrix "Meeting Management System"</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="chosen.css" media="all" rel="stylesheet" type="text/css" />
<link href="chosen.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body onload="drawChart_at_home()">

<!--Header on top of the page where all user account setting navigation should be done-->
<div id="profile_header">
	<!-- Meetrix typography div-->
	<div id="app_name">
		<a class="name" href="#">Meetrix</a> </div>
	<!--Account navigation bars-->
	<div id="account_nav">
		<ul class="account_nav">
			<li class="account_nav"><a class="account" href="#">Profile</a></li>
			<li class="account_nav"><a class="account" href="#">Setting</a></li>
			<li class="account_nav"><a class="account" href="#">Help</a></li>
			<ul>
			</ul>
		</ul>
	</div>
</div>
<!--main contents comes inside here-->
<div id="contents">
	<!--left side of the contents such as icon and navigation bar-->
	<div id="left">
		<!--icon img-->
		<div id="icon">
			<img class="logo" src="img/logo.png" /> </div>
		<!--navigation bars-->
		<div id="navigation">
			<ul class="navigation">
				<li class="navigation">
				<p class="nav_man">Meetings</p>
				</li>
				<ul class="sub_navigation">
					<li class="sub_navigation">
					<p class="sub_nav_man">View Meetings</p>
					</li>
					<li class="sub_navigation">
					<p class="sub_nav_man">Create Meeting</p>
					</li>
					<li class="sub_navigation">
					<p class="sub_nav_man">Delete Meeting</p>
					</li>
				</ul>
				<li class="navigation">
				<p class="nav_man">Groups</p>
				</li>
				<ul class="sub_navigation">
					<li class="sub_navigation">
					<p class="sub_nav_man">View Groups</p>
					</li>
					<li class="sub_navigation">
					<p class="sub_nav_man">Create Group</p>
					</li>
					<li class="sub_navigation">
					<p class="sub_nav_man">Delete Group</p>
					</li>
				</ul>
			</ul>
		</div>
	</div>
	<!--Main contents comes in side here please edit or enter contents in here-->
	<div id="main">
		<h3>Create Groups</h3>
		<form class="form-horizontal" role="form" action="createGroup11.php" method="post">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="grpName">Group Name:
				</label>
				<div class="col-sm-10">
					<input id="inputgrpName" class="form-control" type="text" height="25px" name="name" style="width: 23%">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="grpMembers">Group Members:
				</label>
				<div class="col-sm-10">
					<select class="chosen-select" data-placeholder="Choose a Country..." multiple name="options[]" style="width: 450px;" tabindex="4">
					<?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="Menu6Rainy*guilt";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'test';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT empFname FROM testtable";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["empFname"];
                echo "<option>
                    $cdTitle
                </option>";
                mysqli_close($link);
            
            }
                
            ?></select> </div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-default" type="submit" value="Create">
					Create</button></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10" style="left: 157px; top: -48px">
					<button class="btn btn-default" type="reset" value="Reset">Reset
					</button></div>
			</div>
			</form>
	

	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="chosen.jquery.js" type="text/javascript"></script>
<script charset="utf-8" src="prism.js" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

</body>

</html>
