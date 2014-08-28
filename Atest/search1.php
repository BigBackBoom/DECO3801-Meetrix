<?php
	mysqli_connect('localhost','root','Menu6Rainy*guilt');
	mysqli_select_db('test');

 if (isset($_GET['search']) && !empty($_GET['search'])) {
  $search = $_GET['search'];
  $terms = explode(' ', $search);//split the search term
  $i = 0;
  $query = '';
  foreach ($terms as $term) {
   $i ++;
   if($i == 1){
    $query .= "`empFname` LIKE '%$term%' ";
   }else{
    $query .= "AND `empFname` LIKE '%$term%'";
   }
  }
  //execute the query
  $q = mysqli_query("SELECT * FROM testtable WHERE $query");
  //if result found
  if(mysqli_num_rows($q) > 0){
   while($row = mysqli_fetch_assoc($q)){
    echo '<li>'.$row['empFname'].'<img src="'.$row['pic'].'"></li>';
   }
   //result not found
  }else{
   echo '<li>No Result Found</li>';
  }
  
 }
?>