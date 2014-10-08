<?php
session_start();
$meeting_id = $_SESSION['meeting_id'];
// class to run the background functions to store 
// retrive the menu from database	
class sortable{

	// default function
	function main(){

		if(isset($_REQUEST['data']))
		{
			$data = $_REQUEST['data'];
			$this->update($data);
		}else{
			$menu = $this->getMenu();
			return $menu;
		}
		
	}

	// to update the menu in database
	function update($data){
		$con = $this->connect();
		parse_str($data,$str);
		$menu = $str['item'];
		foreach($menu as $key => $value){
			$key=$key+1;
			mysqli_query($con,"update agenda set content='$value' where agenda_order=$key");
		}
		echo "Succesfully updated";
		
	}

	function getMenu(){
		// to retrive data from db
		$con = $this->connect();
		$result = mysqli_query($con,"select * from agenda where meeting_id=1");
		$k=0;
		while($row=mysqli_fetch_array($result))
		{
			$menu[$k]=$row['content'];
			$k++;
		}
		return $menu;
	}

	//to connect to database
	function connect(){
		return mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database");
	}
}

$menu = new sortable();
$items= $menu->main();


?>