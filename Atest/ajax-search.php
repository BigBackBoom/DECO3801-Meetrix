<?php


include_once ('database_connection.php');

if(isset($_GET['keyword'])){
    $keyword = 	trim($_GET['keyword']) ;
$keyword = mysqli_real_escape_string($dbc, $keyword);



$query = "select empID,empFname,empLname,department,accessRights from testtable where empFname like '%$keyword%' or department like '%$keyword%'";

//echo $query;
$result = mysqli_query($dbc,$query);
if($result){
 echo '<div class="jksgsdg">Results for : <span>'.$_GET['keyword'].'</span></div>';
    if(mysqli_affected_rows($dbc)!=0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		   
     echo '<div class="bsvkdsv"> <a href='.$row['empFname'].'></a><h3>'.$row['empLname'].'</h3></a> <p>'.$row['department'].'</p><p>'.$row['accessRights'].'</p> </div>'   ;
    }
    }else {
        echo '<div class="jsbdkjvgd">No Results Found </div>';
    }
  
}
}else {
    echo 'Parameter Missing';
}




?>