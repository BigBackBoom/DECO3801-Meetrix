function clicked_event(event){
	var link = "php/viewCalendarRelated/meetingPopup.php?id=" + event.id + "&title=" + event.title + 
				"&department=" + event.department + "&supervisor_id=" + event.supervisor_id + 
				"&start=" + event.start + "&end=" + event.end + "&description=" + event.description + 
				"&voting_id=" + event.voting_id + "&group_id=" + event.group_id + "&room_id=" + event.room_id;
	window.open(link, "meetingPopup.php", "height=600,width=800");
	/*update event after changing value*/
	$('#calendar').fullCalendar('updateEvent', event);
}

function dropped(event, delta, revertFunc){
	if (!confirm("Are you sure about this change?")) {
            revertFunc();
            return;
    }
	
 	 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    	xmlhttp=new XMLHttpRequest();
  	} else { // code for IE6, IE5
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		alert("Data was stored Successfully!");
    	}
  	}
  	var link = "php/viewCalendarRelated/dropCal.php?id="+ event.id + "&start="+ event.start + "&end="+ event.end + "&test=abcd";
 	xmlhttp.open("GET",link,true);
 	xmlhttp.send();
}

function resized(event, delta, revertFunc){
	if (!confirm("Are you sure about this change?")) {
            revertFunc();
            return;
    }
	
 	 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    	xmlhttp=new XMLHttpRequest();
  	} else { // code for IE6, IE5
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		alert("Data was stored Successfully!");
    	}
  	}
  	var link = "php/viewCalendarRelated/dropCal.php?id="+ event.id + "&start="+ event.start + "&end="+ event.end + "&test=abcd";
 	xmlhttp.open("GET",link,true);
 	xmlhttp.send();

}

function redirect_delete(meetind_id){
	var r = confirm("Are you sure you want to delete this meeting?");
	if (r == true) {
    	var link = "php/manageMeeting/deleteMeeting.php?id=" + meetind_id;
		window.open(link, "deleteMeeting");	
	} else {
		
	}
}

function redirect_edit(meetind_id){
	var link = "php/manageMeeting/manageMeetingPopup.php?id=" + meetind_id;
	window.open(link, "editMeeting", "height=600,width=800");	
}

function init_cal(){
	// page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
    // put your options and callbacks here
    	header: {
       		left: 'prev,next today',
       		center: 'title',
       		right: 'month,agendaWeek,agendaDay'
       	},
       	editable: true,
       	events: 
		{
			url: 'php/viewCalendarRelated/init_viewMeeting.php',
        	type: 'POST',
        	data: {'userId': user_id},
        	error: function() {
            	alert('there was an error while fetching events!');
        	}
    	},
		eventClick: clicked_event,
		eventDrop: dropped,
		eventResize: resized
   	})

}