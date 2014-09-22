<?php
	$mysqlserver="localhost";
	$mysqlusername="root";
    $mysqlpassword="Menu6Rainy*guilt";
    $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
    $dbname = 'meetrix_database';
    mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
    $i = 1;

    foreach ($_POST['item'] as $value) {
    UPDATE 'agenda' SET 'agenda_order' = $i WHERE 'agenda_order' = $i and 'meeting_id' = "1"
    $i++;
}


?>