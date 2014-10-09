$(function() {
        $( ".resizable" ).resizable({
        	stop: function(event, ui) {
        		var output = $(this).parent().attr('id').replace("item_", "");
        		var height = ui.size.height;
        		alert("output is" + output + " size is" + height);
        		$.post("php/savePosition.php", {"content": output, "height": height });
        	}
        });
        $('#save_position').click(function(){
			//$.post('sortable.php',{"data":data});
		});
});