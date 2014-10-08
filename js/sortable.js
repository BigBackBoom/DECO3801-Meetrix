$(function(){
	$("#sortable").sortable({connectWith:"#sortable"});

	// jquery save event trigger
	$('.save').click(function(){
		var data= $("#sortable").sortable('serialize');
		$.post('sortable.php',{"data":data});
	});
});