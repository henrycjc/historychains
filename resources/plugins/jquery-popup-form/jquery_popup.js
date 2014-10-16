$(document).ready(function() {
    $("#edit_profile").click(function() {
        $("#InfoDiv").css({"display": "block", "height" : $( document ).height()});
    });
	
	$("#edit_picture").click(function() {
        $("#PicDiv").css({"display": "block", "height" : $( document ).height()});
    });
	
	$("#add_comment").click(function() {
        $("#Comment").css({"display": "block", "height" : $( document ).height()});
    });

    $("#info #cancel").click(function() {
        $(this).parent().parent().hide();
    });
	
	$("#profile_pic #cancel").click(function() {
        $(this).parent().parent().hide();
    });
});

 