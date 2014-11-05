<?php

require("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);
$model->checkUserLoggedIn();
$userData = array ('userFName' => ucfirst($model->getUserFName((string)$_COOKIE['user'])),
						'userLName' => ucfirst($model->getUserLName((string)$_COOKIE['user'])),
						'userDOB' => $model->getUserDOB((string)$_COOKIE['user']),
						'userInstitution' => $model->getUserInsitution((string)$_COOKIE['user']),
						'userRep' => $model->getUserRep((string)$_COOKIE['user']),
						'userProfilePic' => substr(($model->getUserProfileImage((string)$_COOKIE['user'])), 0, -3)
					  );
if( isset($_POST['Logout'])) {
	$model->logUserOut();
	header('Refresh :0');
}?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="resources/images/logo.png">
		<title>HC > Home</title>
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				window.location.href = "index_mobile.php";
			};
		</script>
	</head>

	<body>
		<div class="wrap">
			<div class="logo">
				<h1 id="header_title">History Chains</h1>
				<img class="lim" src="resources/images/logo.png" width="100px" />
				<div style="clear:both"></div>
				<span id="users_name">Logged in as <?php printf($userData['userFName']." ".$userData['userLName'] )?></span>
				<form id="logout" method="POST" action="index.php">
					<input type="submit" value="Logout" name="Logout" />
				</form>
			</div>

			<nav>
				<ul>
					<li class="current_page"> <a href="index.php">Home</a> </li><li>
					<a href="createchain.php">Your Chains</a> </li> <li>
					<a href="profile.php">Profile</a> </li> <li>
					<a href="about.php">About</a> </li>
				</ul>
			</nav>

			<section class="Search">
				<div class="SearchWrap">
					<h2>Search</h2>
					<form method="GET" action="index.php">
						<input id="q" type="text" name="q" placeholder="Enter keywords, authors, public figures or events to begin your chain."/>
					</form>
					<article class="SearchResults">
                        <?php
                            if (isset($_GET['q'])) {
                                if ($_GET['q'] === "") {
                                	$view->blankEntry();
                                    $view->printMessage("You haven't searched for anything!");
                                } else {
                                    $controller->handleChainSearch($_GET['q']);
                                }
                            } else {
                                $view->printMessage("Search for other user's chains here, or proceed to 'Your Chains' to create one!");
                            }
                        ?>

					</article>
				</div>
			</section>


			<section class="TopChain">
				<h2>Top Chains</h2>
				<?php $controller->handleShowTopChains(); ?>

			</section>

			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
			</footer>
		</div>
	</body>
</html>
