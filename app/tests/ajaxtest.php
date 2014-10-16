<?php
    require_once("../vendor/kint/Kint.class.php");
    require_once("../models/Mysql_Connection.class.php");
    require_once("../models/Model.class.php");
    require_once("../controllers/Controller.class.php");
    require_once("../views/View.class.php");
    require_once("../models/User.class.php");
    require_once("../models/Chain.class.php");
?>

<?php
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);
$chain = new Chain($mysqli->getConn());

d($chain->getChainSources("world war 2"));
?>
<form id="foo" >
    <input type="hidden" name="troveid" id="troveid" value="35568463"/>
    <button id="ViewSource1" class="TableButton">Add to Chain</button>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    // variable to hold request
    var request;
    // bind to the submit event of our form
    $("#foo").submit(function(event){
        // abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);
        // let's select and cache all the fields
        var $inputs = $form.find("input, button");
        // serialize the data in the form
        var serializedData = $form.serialize();

        // let's disable the inputs for the duration of the ajax request
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // fire off the request to /form.php
        request = $.ajax({
            url: "ajaxpost.php",
            type: "post",
            data: serializedData
        });

        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            console.log("Hooray, it worked!");
        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
        // log the error to the console
        console.error("The following error occured: "+ textStatus, errorThrown);
        });

        // callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
        // reenable the inputs
        $inputs.prop("disabled", false);
        });

        // prevent default posting of form
        event.preventDefault();
    });
</script>

<?php
