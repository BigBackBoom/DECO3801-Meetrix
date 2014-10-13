<?php

// class to run the background functions to store 
// retrive the menu from database	
class sortable{

	// default function
	function main(){

		if(isset($_REQUEST['data']))
		{
			$data = $_REQUEST['data'];
			$meetingId=$_REQUEST['meetingId'];
			$this->update($data, $meetingId);
		}

	}

	// to update the menu in database
	function update($data, $meetingId){
		$con = $this->connect();
		parse_str($data,$str);
		echo $data; echo "/n"; echo $str; echo "/n";
		$menu = $str['item'];
		foreach($menu as $key => $value){
			print_r($menu); echo "/n";
			$key=$key+1;
			mysqli_query($con,"update agenda set agenda_order='$key' where id=$value and meeting_id=$meetingId");
		}
		echo "Succesfully updated";
		// how to order the rows in db
		
	}

	//to connect to database
	function connect(){
		return mysqli_connect("localhost","root","Menu6Rainy*guilt","meetrix_database");
	}
}

$menu = new sortable();
$items= $menu->main();


?>