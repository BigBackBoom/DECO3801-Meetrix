<?php

mysql_connect("localhost", "root", "Menu6Rainy*guilt");
mysql_select_db("test");

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$sql = "SELECT * FROM `testtable` WHERE empFname LIKE '%$s%'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		$url = $row['Searchlink'];
		$title = $row['empFname'];
		echo "<div style='' id='searchtitle'>" . "<a style='font-family: verdana; text-decoration: none; color: black;' href='$url'>" . $title . "</a>" . "</div>";
	}
	
}

?>