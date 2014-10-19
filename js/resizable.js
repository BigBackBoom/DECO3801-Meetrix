$(function() {
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
});