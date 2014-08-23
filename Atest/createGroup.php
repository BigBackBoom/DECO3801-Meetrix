<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meetrix</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/template.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery-1.10.2.min.js"></script>
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
          </ul>
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
                                <a href="#" class="list-group-item">View Meetings</a>
                                <a href="#" class="list-group-item">Create Meetings</a>
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
                        <h3>Create Group</h3>
                        <div class="information">
                        <table>
                        <tr>
                        <td>
                        Group Name:
                        </td>
                        <td>
						<input type="text" name ="groupnametb" style="width: 155px; height: 22px"></td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr>
                        <td>Group Members: </td><td><select>
                        						<option value="IT">Select a Department</option>
                        						<option value="IT">IT</option>
                        						<option value="Sales">Sales</option>
                        						<option value="Finance">Finance</option>
                        						<option value="Marketing">Marketing</option>
                        						<option value="General">General</option>
                        						</select></td></tr>
                        						<tr><td><br></td></tr>
                        						<tr><td style="height:111 px"></td>
                        						<td colspan="2" style="height:111px">
                        						<textarea maxlength="500" style="width:386px; height:155px;"></textarea></td>
                        						<tr><td></td><td align="right"><input type="submit" value="Create" />
                        						<input type="reset" value="Reset"/></td></tr> 
                        						<p><font size="3" color="red">A new group has been created!</font></p>
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