$(function(){

	$(document).on('click', '.saveAgendaTitle', function() {
		var getId = $(this).parent().siblings(".modal-body").children().attr('id');
		var content = "textarea#" + getId;
		var simpleContent = "#" + getId;
		var getContent = $(content).val();
		var postContent = getContent.replace("\'", "\\'");
		var meetingId = $(this).parent().parent().parent().parent().parent().parent().attr('class');
		var dataId = $(this).parent().parent().parent().parent().parent().parent().attr('data-id');
		$(this).parent().parent().parent().parent().siblings(".agendaTitle").text(getContent);
		$(this).parent().parent().parent().parent().siblings(".agendaTitle").val(getContent);
		//console.log(getContent);
		//console.log(meetingId);
		//console.log(dataId);
		$.post("php/saveAgendaTitle.php", {"title": postContent, "meetingId": meetingId, "dataId":dataId});
	});

	$(document).on('click', '.saveAgendaContent', function(e) {
		var getId = $(this).parent().siblings(".modal-body").children().attr('id');
		var content = "textarea#" + getId;
		var simpleContent = "#" + getId;
		var getContent = $(content).val();
		var postContent = getContent.replace("\'", "\\'");
		var meetingId = $(this).parent().parent().parent().parent().parent().parent().attr('class');
		var dataId = $(this).parent().parent().parent().parent().parent().parent().attr('data-id');
		$(this).parent().parent().parent().parent().siblings(".agendaContent").text(getContent);
		$(this).parent().parent().parent().parent().siblings(".agendaContent").val(getContent);
		//console.log(getContent);
		//console.log(meetingId);
		//console.log(dataId);
		$.post("php/saveAgendaContent.php", {"content": postContent, "meetingId": meetingId, "dataId":dataId});
	});

	$(document).on('click', '.exitTitle', function(e) {
		var getId = $(this).parent().siblings(".modal-body").children().attr('id');
		var content = "#" + getId;
		var getTitle = $(this).parent().parent().parent().parent().siblings(".agendaTitle").text();
		$(content).text(getTitle);
		$(content).val(getTitle);
	});

	$(document).on('click', '.exitContent', function(e) {
		var getId = $(this).parent().siblings(".modal-body").children().attr('id');
		var content = "#" + getId;
		var getContent = $(this).parent().parent().parent().parent().siblings(".agendaContent").text();
		$(content).text(getContent);
		$(content).val(getContent);
	});

/*$(".saveAgendaTitle").click(function() {
	console.log("title");
});*/
/*	$(".agendaTitle").click(function() {
		var meetingId = $(this).parent().parent().attr('class');
        var output = $(this).parent().parent().attr('data-id');
        var a = "Title " + meetingId + " " + output;
        var title = $(this).text();
        var textarea = "<textarea class=\"form-control\" rows=\"1\">" + title + "</textarea><p><button type=\"button\" class=\"btn btn-default\">Close</button>   <button type=\"submit\" class=\"btn btn-primary\">Submit</button></p>";
        //alert($(this).text());
		$(this).replaceWith(textarea);
	});

	$(".agendaContent").click(function() {
		var meetingId = $(this).parent().parent().attr('class');
        var output = $(this).parent().parent().attr('data-id');
        var a = "Content " + meetingId + " " + output;
		alert(a);
	});*/

});