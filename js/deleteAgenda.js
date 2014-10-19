$(function(){
	$(document).on('click', '.delete', function(e) {
		var meetingId = $(this).parent().parent().attr('class');
        var agendaId = $(this).parent().parent().attr('data-id');
        var a = meetingId + " " + agendaId;
        $.get('php/deleteAgenda.php',{"meetingId":meetingId, "agendaId":agendaId});
        $(this).parent().parent().remove();
	});
});