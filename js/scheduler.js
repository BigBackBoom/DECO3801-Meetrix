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
				description: 'fuck you'
			}
		]
   	})

}