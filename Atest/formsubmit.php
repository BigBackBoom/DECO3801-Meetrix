	<?php 
$conn=mysqli_connect('localhost','root','Menu6Rainy*guilt') or die('Not connected'); 
  
$database=mysqli_select_db($conn,'meetrix_database') or die('Database Not connected'); 
if(isset($_POST['submit'])) 
{ 
      
    $name=$_POST['name']; 
    $members=$_POST['options[]']; 
     
      
if(empty($name) || empty($members)  
    { 
          
        if(empty($name)) 
        { 
            echo "<font color='red'>Name field is empty.</font><br/>"; 
        } 
          
        if(empty($members)) 
        { 
            echo "<font color='red'>Have not selected any members.</font><br/>"; 
        } 
        
    } 
else{ 
$sql="INSERT INTO `group`(`group_name`, `members`) VALUES 
('$_POST[name]' ,'$_POST[options[]]')"; 
if (!mysqli_query($conn,$sql)) 
  { 
  die('Error: ' . mysqli_error($conn)); 
  } 
echo "<font color='green'>Meeting is created!</font>"; 
  
mysqli_close($conn); 
} 
} 
?>