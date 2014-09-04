
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Group</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/accordion.css">
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
					
					
					 <!--start of accordion-->
					  <div class="accordion vertical">
    <ul>
        <li>
            <input type="radio" id="radio-1" name="radio-accordion" checked="checked">
            <label for="radio-1">Group&nbsp;One</label>
            <div class="content">
                <h3>Group for Project #1</h3>
                <p></p>
                <p></p>
            </div>
        </li>
        <li>
            <input type="radio" id="radio-2" name="radio-accordion">
            <label for="radio-2">Group&nbsp;Two</label>
            <div class="content">
                <h3>Group for Project #2</h3>
                <p></p>
                <p></p>
            </div>
        </li>
        <li>
            <input type="radio" id="radio-3" name="radio-accordion">
            <label for="radio-3">Group&nbsp;Three</label>
            <div class="content">
                <h3>Group for Project #3</h3>
                <p></p>
                <p></p>
            </div>
        </li>
        <li>
            <input type="radio" id="radio-4" name="radio-accordion">
            <label for="radio-4">Group&nbsp;Four</label>
            <div class="content">
                <h3>Group for Project #4</h3>
                <p></p>
                <p></p>
            </div>
        </li>
    </ul>
</div>
                 <!--end of accordion-->
				 
				 
                 
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