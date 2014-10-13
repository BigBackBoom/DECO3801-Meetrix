$(function() {
        $( ".resizable" ).resizable({
        	stop: function(event, ui) {
                        var meetingId = $(this).parent().attr('class');
                        //alert(meetingId);
                        var output = $(this).parent().attr('data-id');
        		var height = ui.size.height;
        		//alert("output is" + output + " size is" + height);
        		$.post("php/savePosition.php", {"content": output, "height": height, "meetingId":meetingId});
        	}
        });
});