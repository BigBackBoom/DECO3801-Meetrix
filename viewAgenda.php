<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Agenda</title>
      	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #container { width: 920px; height: 750px; }
  #container h4 { text-align: center; margin: 0; margin-bottom: 10px; }
  #resizable { background-position: top left; width: 900px; height: 100px; background:#99CCFF;}
  #resizable1 { background-position: top left; width: 900px; height: 180px; background:#FF99FF;}
  #resizable2 { background-position: top left; width: 900px; height: 200px; background:#99FF99; }
  #resizable3 { background-position: top left; width: 900px; height: 150px; background:#FFCC66; }
  #resizable,#resizable1,#resizable2,#resizable3, #container { padding: 0.5em; }
  </style>
  <script>
  $(function() {
    $( "#resizable" ).resizable({
      containment: "#container"
    });
  });
  </script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--Google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Load the AJAX API-->      
  </head>

  <body>
    <!--nav bar-->
    <div id ="profile_header">
      <div class="Container">
        <div id="app_name">
          <a class="name" href="#">Meetrix</a>
        </div>
        <div id="account_nav">
          <ul class="account_nav">
            <li class="account_nav"><a href="#" class="account">Profile</a></li>
            <li class="account_nav"><a href="#" class="account">Setting</a></li>
            <li class="account_nav"><a href="#" class="account">Help</a></li>
          <ul>
        </div>
      </div>
    </div>
    <!--end of nav bar-->
        <div id ="contents">
            <br />
            <br />
            <table width="100%" border="0" cellspacing="0">
                <tr>
                    <td width="18%">
                        <div id ="left">
                            <div id="icon">
                                <img class="logo" src="img/logo.png"/>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    Meetings
                                </a>
                                <a href="vmeeting.php" class="list-group-item">View Meetings</a>
                                <a href="createMeeting.php" class="list-group-item">Create Meetings</a>
                                <a href="#" class="list-group-item">Delete Meetings</a>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item active">
                                    Groups
                                </a>
                                <a href="#" class="list-group-item">View Groups</a>
                                <a href="#" class="list-group-item">Create Groups</a>
                                <a href="#" class="list-group-item">Delete Groups</a>
                            </div>
                        </div>
                    </td>
                    <td width="82%">
                        <h3>Meeting Agenda</h3>
						<div id="container" class="ui-widget-content">
 						<h4 class="ui-widget-header">Meeting Agenda</h4>
 							<div id="resizable" class="ui-state-active">
   							<h4 class="ui-widget-header">Introduction</h4>
   							Introduction to the project
  							</div>
  							
  							<div id="resizable1" class="ui-state-active">
   							<h4 class="ui-widget-header">Speaker: Johnny</h4>
   							Talks about team progress, share experiences, form teams to work on the new project
  							</div>
  							
							<div id="resizable2" class="ui-state-active">
   							<h4 class="ui-widget-header">Speaker: Mary</h4>
   							Guest speaker
  							</div>
  							
							<div id="resizable3" class="ui-state-active">
   							<h4 class="ui-widget-header">Discussion</h4>
   							Discuss topics in groups
  							</div>

						</div>                       
                    </td>                   
                </tr>
            </table>
        </div>
        <br />
        <br />
      <!--start of footer-->
      <div class="footer">
        <table  width="100%" border="0" cellspacing="0">
          <tr>
            <td align="left" class="footer-link" width="1%"> 
              <a href="#">About </a>
            </td>
            <td align="left" class="footer-link" width="1%">
              <a href="#">Help</a>
            </td>
            <td  width="20%" align="right" class="footer-link">
              <a href="#">@2014 Meetrix</a>
            </td>
          </tr>
        </table>
      <!--end of footer-->
      </div>
      <br />
    <!-- end of container-->
    </div>

  </body>
</html>