function redirect_deleteG(group_id){
	var r = confirm("Are you sure you want to delete this group?");
	if (r == true) {
    	var link = "php/manageGroup/deleteGroup.php?id=" + group_id;
		window.open(link, "deleteGroup");	
	} else {
		
	}
}

function redirect_editG(group_id){
	var link = "php/manageGroup/manageGroupPopup.php?id=" + group_id;
	window.open(link, "editGroup", "height=400,width=800");	
}