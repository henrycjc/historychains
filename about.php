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
}

//Output
d($_COOKIE);
d($userData);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="resources/images/logo.png">
		<title>HC > About</title>
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script type="text/javascript"><!-- page redirect-->
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				window.location.href = "about_mobile.php";
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
				<form id="logout" method="POST" action="about.php">
					<input type="submit" value="Logout" name="Logout" />
				</form>
			</div>

			<nav>
				<ul>
					<li> <a href="index.php">Home</a> </li>
					<li> <a href="createchain.php">Create Chain</a> </li>
					<li> <a href="profile.php">Profile</a> </li>
					<li class="current_page"> <a href="about.php">About</a> </li>
				</ul>
			</nav>

			<section class="Search">
				<div class="SearchWrap">
					<h2>About Us</h2>
					<p>History Chains is a project developed by 5 undergraduate students at the University of Queensland. A source and referenced based
					social media of sorts, we have captured the essence of user interaction through relentless research and planning. So how will this
					benefit you? Great Question! This referencing app is targeted towards younger students, namely that of 14-18 studying Modern Australian
					History and other related subjects. The user will be able to search through Trove's extensive collections of artifacts, articles and mostly
					any electronic media you can think of. You will be able to keep track of your chains and post comments on reliability of sources, helping
					you through your research stage of your assignments.</p>
					<p>To create a chain, simply sign up and follow the instructions, it's as easy as that! If you don't want to sign up then feel free to
					browse through our extensive database of already existing History Chains. By signing up, you can have access to collaborative chains, your own
					profile and most importantly the privelage to access and modify your own history chains!</p>
					<p>So what are you waiting for? Let's start Chaining!</p>
				</div>
			</section>

			<section class="TopChain">
				<h2>How it Works</h2>
				<img class="aboutgraphic" src="resources/images/about_page_graphic.png" />
			</section>

			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html>
