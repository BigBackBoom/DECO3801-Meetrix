function clicked_event(event){
	if(event.title){
		alert('Event: ' + event.description);
		event.start = '2014-08-02';
	}
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
       	events: [
			{
				title: 'All Day Event',
				start: '2014-08-01',
				description: 'You have got an virus. You have to turn off your computer immidiately'
			}
		],
		eventClick: clicked_event
   	})

}