<?php
	require("app/configs/Global_Config.php");
	$mysqli = new Mysql_Connection();
	$model = new Model($mysqli->getConn());
	$view = new View($model);
	$controller = new Controller($model, $view);
	$model->checkUserLoggedIn();
	d($_COOKIE);
	d($_POST);
	$name = (string)$_COOKIE['user'];
	d($name);
	
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
	}	
?>
<!DOCTYPE html> 
<html> 
	<head>
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
			<form class="form" action="app/content/upload_profile_picture.php" id="profile_pic">
				<h3>Edit Your Profile Picture</h3>
				<input type="file" id="File" /><br/>
				<br/>
				<input type="submit" id="upload" value="Apply"/><br/>
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
			</div>
			
			<nav>
				<ul> 
					<li> <a href="index.php">Home</a> </li><li>
					<a href="createchain.php">Create Chain</a> </li><li class="current_page"> 
					<a href="profile.php">Profile</a> </li><li>
					<a href="about.php">About</a> </li>
				</ul>
			</nav>
			
			<aside class="UserInfo">
				<div class="Image"> <img src="resources/images/profile.jpg"/> </div>
				<div class="Info"> 
					<button id="edit_picture">Edit Profile Picture</button>
					<button id="edit_profile">Edit Profile</button>
					<h1>Info</h1>
					<p>Angus Payne</p>
					<p>28/04/96</p>
					<p>University of Queensland</p>
					<p>Rep: 9001</p>
					<p>Chains: 10</p>
				</div>
			</aside>
			

			
			<div class="ChainInfo">
				<div class="Published">
					<h2>Published Chains</h2>
				</div>
				
				<div class="Collab">
						<h2>Collabritive Chains</h2>
				</div>
			</div>

			<div style="clear:both"></div>
			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html> 