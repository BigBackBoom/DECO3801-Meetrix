function clicked_event(event){
	
	window.open("meetingPopup.php", "meetingPopup", "height=600,width=800");
	/*update event after changing value*/
	$('#calendar').fullCalendar('updateEvent', event);
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
			url: 'init_viewMeeting.php',
        	type: 'POST',
        	data: {'userId': "1"},
        	error: function() {
            	alert('there was an error while fetching events!');
        	}
    	},
		eventClick: clicked_event
   	})

}