$(function(){
	$("#createAgenda").click(function() {		
		var agendaId = 1;
		var i;
		for (i = 0; i < $("#sortable").children().length; i++) {
			if($("#sortable").children().eq(i).attr("data-id") > agendaId){
				agendaId = $("#sortable").children().eq(i).attr("data-id");
			}	
		}
		agendaId++;
		var item = "<li class='" + meetingId + "' data-id='" + agendaId + 
				"'><div style=\"display:block; height:100px;\" class='resizable'><button type=\"button\" class=\"close delete\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button><h4 data-toggle=\"modal\" data-target=\"#title" + agendaId +"\"  class='agendaTitle'>Please enter your agenda title</h4>" + "<h7 class=\"agendaTime\" style=\"font-size:3px; margin:0 0 0px\">(Approx. time: 10min)</h7>" + "<div class=\"modal fade\" id=\"title" + agendaId + "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button><h4 class=\"modal-title\" id=\"myModalLabel\">Change the title of the agenda</h4></div><div class=\"modal-body\"><textarea class=\"form-control\" id=\"changeTitle" + agendaId + "\" rows=\"3\">Please enter your agenda title</textarea></div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default exitTitle\" data-dismiss=\"modal\">Close</button><button type=\"button\" class=\"btn btn-primary saveAgendaTitle\" data-dismiss=\"modal\">Save changes</button></div></div></div></div>" + "<p data-toggle=\"modal\" data-target=\"#content" + agendaId + "\"class=\"agendaContent\">Please enter your agenda content</p>" + "<div class=\"modal fade\" id=\"content" + agendaId + "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button><h4 class=\"modal-title\" id=\"myModalLabel\">Change the content of the agenda</h4></div><div class=\"modal-body\"><textarea class=\"form-control\" id=\"changeContent" + agendaId + "\" rows=\"3\">Please enter your agenda content</textarea></div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default exitContent\" data-dismiss=\"modal\">Close</button><button type=\"button\" class=\"btn btn-primary saveAgendaContent\" data-dismiss=\"modal\">Save changes</button></div></div></div></div>" + "</div></li>";
		$("#sortable").append(item);
		$( ".resizable" ).resizable({
        	stop: function(event, ui) {
                        var meetingId = $(this).parent().attr('class');
                        //alert(meetingId);
                        var output = $(this).parent().attr('data-id');
        		var height = ui.size.height;
        		var time = height / 10;
        		//alert("output is" + output + " size is" + height);
        		$.post("php/savePosition.php", {"content": output, "height": height, "meetingId":meetingId});
        		$(this).children().siblings(".agendaTime").replaceWith("<p style=\"font-size:3px; margin:0 0 0px\" class=\"agendaTime\">(Approx. time: "+ Math.round(time) + "min)</p>");
        	},
                minHeight: 100,
                handles: "s"
        });
		$.get('php/addAgenda.php',{"meetingId":meetingId, "agendaId":agendaId});
	});
});