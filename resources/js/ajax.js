/**
 * Created by Henry on 25/10/14.
 */
$(document).ready(function(){
    var request;
    $("#ResGood").hide();
    $("#info").submit(function(event){
        if (request) {
            request.abort();
        }
        $("#usrname").val();
        var $form = $(this);
        var $inputs = $form.find("input, textarea, button");
        var serializedData = $("#info").serialize();
        console.log($form);

        $inputs.prop("disabled", true);

        request = $.ajax({
            url: "addsource.php",
            type: "post",
            data: serializedData,
            success: function(data, status) {
            $(document.body).append(data);
            console.log("Status: " + status + "Data: " +data);
            }
        });
        request.done(function (response, textStatus, jqXHR){
            if (response === "SUCCESS") {
            $("#ResGood").show();
            $("#cd-timeline").hide();

            }
        console.log("Posted to addsource.php.");
        });
        request.fail(function (jqXHR, textStatus, errorThrown){
            console.error("The following error occured: "+ textStatus, errorThrown);
            });
        request.always(function () {
            // reenable the inputs
            $inputs.prop("disabled", false);
            });
        event.preventDefault();
        });

        $("#")
        });