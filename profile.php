<?php
	//HTTP Header Info
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
						'userProfilePic' => ($model->getUserProfileImage((string)$_COOKIE['user']))
					  );

	if (isset($_POST['apply'])) {
		if (empty($_POST['Fname']) === FALSE) {
		$model->updateUserFName((string)$_COOKIE['user'], $_POST['Fname']);
		}
		if (empty($_POST['Lname']) === FALSE) {
		$model->updateUserLName((string)$_COOKIE['user'], $_POST['Lname']);
		}
		if (empty($_POST['DOB']) === FALSE) {
		$model->updateUserDOB((string)$_COOKIE['user'], $_POST['DOB']);
		}
		if (empty($_POST['Institution']) === FALSE) {
		$model->updateUserInsitution((string)$_COOKIE['user'], $_POST['Institution']);
		}
		header("Refresh:0");
	}

	if (isset($_POST['upload'])) {
		$model->uploadImage((string)$_COOKIE['user']);
	}
	if( isset($_POST['Logout'])) {
	$model->logUserOut();
	header('Refresh :0');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="resources/images/logo.png">
		<title>HC > Profile</title>
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- Jquery Library-->
		<link rel="stylesheet" href="resources/plugins/jquery-popup-form/css/jquery_popup.css" /><!-- Popup Window Stlyesheet-->
        <script src="resources/plugins/jquery-popup-form/jquery_popup.js"></script><!-- Popup Window JS File-->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<script type="text/javascript"><!-- page redirect-->
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				window.location.href = "profile_mobile.php";
			};
		</script>
	</head>

	<body>
		<!-- JQUERY POPUP FORM STARTS HERE-->
		<div id="InfoDiv">
			<form class="form" action="profile.php" method="POST" id="info">
				<h3>Edit Your Details</h3>
				<hr/><br/>
				<label>First Name</label>
				<br/>
				<input type="text" id="Fname" name="Fname" placeholder="Frist Name"/><br/>
				<br/>
				<label>Last Name</label>
				<br/>
				<input type="text" id="Lname" name="Lname" placeholder="Last Name"/><br/>
				<br/>
				<label>DOB</label>
				<br/>
				<input type="date" id="DOB" name="DOB" /><br/>
				<br/>
				<label>Institution</label>
				<br/>
				<input type="text" id="Institution" name="Institution" placeholder="Institution You Attend" /><br/>
				<br/>
				<input type="submit" id="apply" name="apply" value="Apply"/>
				<input type="button" id="cancel" value="Cancel"/>
				<br/>
			</form>
		</div>

		<div id="PicDiv">
			<form class="form" action="profile.php" id="profile_pic" method="POST" enctype="multipart/form-data">
				<h3>Edit Your Profile Picture</h3>
				<input type="file" name="file" id="File" accept=".jpg, .png, .gif" /><br/>
				<br/>
				<input type="submit" id="upload" name="upload" value="Apply"/><br/>
				<br/>
				<input type="button" id="cancel" value="Cancel"/>
				<br/>
			</form>
		</div>
		<!-- JQUERY POPUP FORM ENDS HERE -->
		<div class="wrap">
			<div class="logo">
				<h1 id="header_title">History Chains</h1>
				<img class="lim" src="resources/images/logo.png" width="100px" />
				<div style="clear:both"></div>
				<span id="users_name">Logged in as <?php printf($userData['userFName']." ".$userData['userLName'] )?></span>
				<form id="logout" method="POST" action="profile.php">
					<input type="submit" value="Logout" name="Logout" />
				</form>
			</div>

			<nav>
				<ul>
					<li> <a href="index.php">Home</a> </li><li>
					<a href="createchain.php">Your Chains</a> </li><li class="current_page">
					<a href="profile.php">Profile</a> </li><li>
					<a href="about.php">About</a> </li>
				</ul>
			</nav>

			<aside class="UserInfo">
				<div class="Image"> <img src="<?php printf($userData['userProfilePic'])?>"/> </div>
				<div class="Info">
					<button id="edit_picture">Edit Profile Picture</button>
					<button id="edit_profile">Edit Profile</button>
					<h1>Info</h1>
					<p><?php printf($userData['userFName']." ".$userData['userLName'] )?></p>
					<p><?php printf(date("d-m-Y",$userData['userDOB']))?></p>
					<p><?php printf($userData['userInstitution'])?></p>
					<p>Reputation: <?php printf($userData['userRep']) ?></p>
				</div>
			</aside>



			<div class="ChainInfo">
				<div class="Published">
					<h2>Published Chains</h2>
                    <?php $controller->handleProfileChains($userData['userName']); ?>
				</div>
			</div>

			<div style="clear:both"></div>
			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
			</footer>
		</div>
	</body>
</html>
