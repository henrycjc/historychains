$(document).ready(function() {
    $("#edit_profile").click(function() {
        $("#InfoDiv").css({"display": "block", "height" : $( document ).height()});
    });
	
	$("#edit_picture").click(function() {
        $("#PicDiv").css({"display": "block", "height" : $( document ).height()});
    });
	
	$("[id^=add_comment]").click(function() {
        $("#ResGood").hide();
        console.log("Click on add comment button. Id: " + $(this).attr('id'));
        $("#Comment").css({"display": "block", "height" : $( document ).height()});
        $("#AddSource").val($("#SourceId" + $(this).attr('id').substring(11)).attr('value'));
        //$("#AddSource").val($(this).attr('id').substring(11));
        /*)
        $("#SourceIdX").val();
        $("[id^=SourceId]").attr('id').substring(11)
        $("#srcid").val($(")); */
    });

    $("#info #cancel").click(function() {
        $(this).parent().parent().hide();
    });
	
	$("#profile_pic #cancel").click(function() {
        $(this).parent().parent().hide();
    });
});

 