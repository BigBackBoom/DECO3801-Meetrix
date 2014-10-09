$(function(){
	$("#sortable").sortable({connectWith:"#sortable"});
	// jquery save event trigger
	$('#save_position').click(function(){
		var data= $("#sortable").sortable('serialize');
		var order = "";
		var i;
		for (i = 0; i < $("#sortable").children().length; i++) {
		console.log($("#sortable").children().eq(i).attr("data-id"));
		order = order + "item[]="+$("#sortable").children().eq(i).attr("data-id") + "&";
		
}
order = order.substring(0, order.length - 1);
		console.log(order);console.log(data);
		$.get('php/sortable.php',{"data":order});
	});
});