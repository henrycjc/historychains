<?php
	require("app/configs/Global_Config.php");
	$mysqli = new Mysql_Connection();
	$model = new Model($mysqli->getConn());
	$view = new View($model);
	$controller = new Controller($model, $view);
	$user = new User("angus", "payne", "20/04/1996", "angus", "password");
	$user->checkUserLoggedIn();
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
			<form class="form" action="#" id="info">	
				<h3>Edit Your Details</h3>
				<hr/><br/>
				<label>Name</label>
				<br/>
				<input type="text" id="name" placeholder="Name"/><br/>
				<br/>
				<label>Email</label>
				<br/>
				<input type="text" id="email" placeholder="Email"/><br/>
				<br/>
				<label>DOB</label>
				<br/>
				<input type="date" id="DOB" /><br/>
				<br/>
				<label>Subjects</label>
				<br/>
				<input type="text" id="Subjects" placeholder="Enter your current subjects" /><br/>
				<br/>
				<input type="button" id="apply" value="Apply"/>
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
					<p>Rep: 9001</p>
					<p>Chains: 10</p>
					<p>Subjects:</p>
					<p>Maths B</p>
					<p>English</p>
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