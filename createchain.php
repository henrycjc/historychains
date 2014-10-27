<?php
require("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);
$model->checkUserLoggedIn();
$userData = array ('userName' => $_COOKIE['user'],
                        'userFName' => ucfirst($model->getUserFName((string)$_COOKIE['user'])),
						'userLName' => ucfirst($model->getUserLName((string)$_COOKIE['user'])),
						'userDOB' => $model->getUserDOB((string)$_COOKIE['user']),
						'userInstitution' => $model->getUserInsitution((string)$_COOKIE['user']),
						'userRep' => $model->getUserRep((string)$_COOKIE['user']),
						'userProfilePic' => substr(($model->getUserProfileImage((string)$_COOKIE['user'])), 0, -3)
					  );
$user = new User($model, $userData);
if(isset($_POST['Logout'])) {
	$model->logUserOut();
	header('Refresh :0');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="resources/images/logo.png">
		<title>HC > Create Chain</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>History Chains > Create Chain</title>
		<link rel="stylesheet" type="text/css" href="resources/plugins/vertical-timeline/css/style.css" />
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700" />
		<link rel="stylesheet" type="text/css" href="resources/plugins/vertical-timeline/css/style.css" />
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="resources/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="resources/plugins/vertical-timeline/js/modernizr.js"></script>
		<script src="resources/plugins/validation/jquery.validate.js"></script>
		<link rel="stylesheet" href="resources/plugins/jquery-popup-form/css/jquery_popup.css" /><!-- Popup Window Stlyesheet-->
        <script src="resources/plugins/jquery-popup-form/jquery_popup.js"></script><!-- Popup Window JS File-->

		<script>
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                window.location.href = "createchain_mobile.php";
            }
			$(document).ready(function(){
				$(".CreateNew").hide();
				$(".ListedChains").hide();
				$(".New_Chain_Link").click(function(){
					$(".CreateNew").toggle("slow");
					$(".ListedChains").hide("slow");
				});
				$(".Exist_Link").click(function(){
					$(".ListedChains").toggle("slow");
					$(".CreateNew").hide("slow");
				});
				$("#mkChain").click(function(){
					valid = true;
					if($("#title").val() =="") {
						alert ("That is not a valid title for a chain.");
						event.preventDefault();
					}
					else if ($("#topic").val() ==""){
						alert ("They are not valid tags for a chain.");
						event.preventDefault();
					}
					else {
						$("#mkChainForm").submit()
					}
				});
				$(".apply").click(function(){
					$('.buffer').html($("#beskeder_vis").html());
				});
			});
		</script>
	</head>
	<body>
    <div class="wrap">
			<div class="logo">
				<h1 id="header_title">History Chains</h1>
				<img class="lim" src="resources/images/logo.png" width="100px" />
				<div style="clear:both"></div>
				<span id="users_name">Logged in as <?php printf($userData['userFName']." ".$userData['userLName'] )?></span>
				<form id="logout" method="POST" action="createchain.php">
					<input type="submit" value="Logout" name="Logout" />
				</form>
			</div>
			<nav class="nav1">
				<ul>
					<li><a href="index.php">Home</a> </li>
					<li class="current_page"><a href="createchain.php">Create Chain</a> </li>
					<li><a href="profile.php">Profile</a> </li>
					<li><a href="about.php">About</a> </li>
				</ul>
			</nav>
			<div class="CreateChain">
                <?php

                if (isset($_POST['mkChain'])) {
                    $controller->handleCreateChain($user->getId(), $_POST['title'], $_POST['topic']);
                    $model->setActiveChain($user, $_POST['title']);
                }
                if (isset($_POST['editChainsReq']) && isset($_POST['editChainsDelBtn'])) {
                    $controller->handleDeleteChain($_POST['editChainsList']);
                }

                if (isset($_POST['editChainsReq']) && isset($_POST['editChainsEdtBtn'])) {
                    $res = $model->setActiveChain($user, $_POST['editChainsList']);
                    if ($res) {

                    } else {
                        echo "Could not retrieve that chain. Sorry about that.";
                    }
                }
                ?>
				<h2>Step 1: Get Your Chain</h2>
				<button type="button" class="New_Chain_Link">Create a Chain</button>
				<button type="button" class="Exist_Link">Edit a Chain</button>
				<form id="mkChainForm" class="CreateNew" action="createchain.php" method="post">

					<p>Title</p><input id="title" name="title" type="text" placeholder="Chain Title" />
					<p>Tags</p><input id="topic" name="topic" type="text" placeholder="Tags" />
					<p><input name="mkChain" id="mkChain" type="submit" value="Create" ></p>
				</form>
                <div class="ListedChains">
					<form id="editChainsForm" name="editChainsForm" method="POST" action="createchain.php">
                        <input id="editChainsReq" name="editChainsReq"  type="hidden" value="" />
                        <p>
							<?php
								$controller->getChainsByUserId($user->getId());
							?>
                        </p>
					</form>
				</div>

			</div>
			<div style="clear:both"></div>
			<div class="app">
				<section class="Search CreateChainSearch">
					<div class="SearchWrap">
						<h2>Step 2: Research</h2>
						<form id="searchTroveForm" name="searchTroveForm">
							<input type="text" id="searchTroveInput" name="searchTroveInput" placeholder="Enter keywords, authors, public figures or events to begin your chain."/>
							<button id="searchTroveBtn" name="searchTroveBtn">Search</button>
						</form>
						<article class="SearchResults">
								<div id="output">
									<table id="results_table">
									<?php
			                            if (isset($_GET['searchTroveInput'])) {
			                                if ($_GET['searchTroveInput'] === "") {
			                                	$view->printMessage("Please enter a valid search term!");
			                                } else {
			                                    $controller->handleSearch($_GET['searchTroveInput'], $user);
			                                }
			                            } else {
			                            	$view->printMessage("Start searching so we can show you some results!");
			                            }
									?>
									</table>
                </div>
						</article>
					</div>
				</section>


		<section class="TopChain CreateChainTimeline">
            <h2>Step 3: Study</h2>
			<h2 id="chainName"><?php $controller->getActiveChain($user); ?> </h2>
			<section id="cd-timeline" class="cd-container">
                <?php $controller->getInitialChain($model->getActiveChain($user)); ?>
			</section> <!-- cd-timeline -->
			<script src="resources/plugins/vertical-timeline/js/main.js"></script> <!-- Resource jQuery -->
		</section>
	</div>
	<div style="clear:both"></div>

			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
			</footer>
		</div>
    <script>
    </script>

		<div id="Comment">
			<form id="info">
				<h3>Add Source to Chain</h3>
                <div id="ResGood"><p>Source Added To Chain!</p></div>
                <input type="hidden" id="AddUser" name="AddUser" value="<?php if(isset($_COOKIE['user'])) { echo $_COOKIE['user'];} ?>"/>
                <input type="hidden" id="AddSource" name="AddSource" value=""/>
                <input type="hidden" id="AddChain" name="AddChain" value="<?php echo $controller->getActiveChain($user); ?>" />
				<p>Keywords</p>
                <textarea name="AddKeywords" id="AddKeywords" rows="1" cols="36" placeholder="Comma, separated, keywords"></textarea><br/>
                <p>Notes</p>
				<textarea name="AddNotes" id="AddNotes" rows="6" cols="36" placeholder="Very helpful for criteria #1..."></textarea><br/>
				<br/>
				<button id="apply" value="Apply">Apply</button>
				<input type="button" id="cancel" value="Cancel"/>
				<br/>
			</form>
		</div>


		<script>
            $(document).ready(function(){

                var request;
                $("#ResGood").hide();
                $("#info").submit(function(event){
                    if (request) {
                        request.abort();
                    }
                    $("#usrname").val(<?php echo '"'.$user->getUsername().'"' ?>);
                    var $form = $(this);
                    var $inputs = $form.find("input, textarea, button");
                    var serializedData = $("#info").serialize();
                    var serializedUser = $("#usrname").serialize();
                    console.log($form);

                    $inputs.prop("disabled", true);

                    request = $.ajax({
                        url: "addsource.php",
                        type: "post",
                        data: serializedData,
                        success: function(data, status) {
                            if (data === "FAILURE") {
                                console.log("Dicks");
                            } else {
                               $("#cd-timeline").html(data);
                               console.log(data);
                            }
                        }
                    });
                    request.done(function (response, textStatus, jqXHR){
                            console.log(response);
                            $("#ResGood").show();
                    });
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        console.error("Error: "+ textStatus, errorThrown);
                    });
                    request.always(function () {
                        // reenable the inputs
                        $inputs.prop("disabled", false);
                    });
                    event.preventDefault();
                    $("#Comment").fadeOut(1000);

                });


            });
		</script>

	</body>
</html>
