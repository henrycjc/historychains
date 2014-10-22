<?php
require("app/configs/Global_Config.php");

$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);

if (isset($_POST['SubmitSU'])) {
	$model->addUserToDB($_POST['FName'], $_POST['LName'], $_POST['DOB'], $_POST['UName'], $_POST['Password']);
	header('location: index.php');
}

if (isset($_POST['SubmitSI'])) {
	$model->logUserIn($_POST['UName'], $_POST['Password']);
	header('location: index.php');
}
// OUTPUT STARTS HERE
d($_POST);
d($_COOKIE);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".search").hide(); 
				$("#sign_up").hide();
				$("#login").hide();
				$("#sign_up_link").click(function(){
					$("#sign_up").toggle("slow");
					$("#login").hide("slow");
					
			  });
			  $("#login_link").click(function(){
					$("#login").toggle("slow");
					$("#sign_up").hide("slow");
			  });
			  
			  $("#SubmitSU").click(function(){
					valid = true;
					if($("#FName").val() =="") {
						alert ("Please enter your First Name");
						event.preventDefault();
					}
					else if ($("#LName").val() ==""){					
						alert ("Please enter your Last Name");
						event.preventDefault();
					}
					else if ($("#DOB").val() ==""){					
						alert ("Please enter your Date of Birth");
						event.preventDefault();
					}
					else if ($("#UName").val() ==""){					
						alert ("Please enter a username");
						event.preventDefault();
					}
					else if ($("#Password").val() ==""){					
						alert ("Please enter a password");
						event.preventDefault();
					}
					else {
						$("#mkChainForm").submit()
					}
				});
			});
		</script>
		
		<script type="text/javascript" /><!-- page redirect-->
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				window.location.href = "splash_mobile.php";
			};
		</script>
		
	</head>
</html> 

<body>
	<div class="wrap">
		<div class="Welcome">
			<h1>Welcome to History Chains</h1>
		</div>
		<nav>
			<ul> 
				<li> <a id="sign_up_link">Sign Up</a></li>
				<li> <a id="login_link">Login</a> </li>
			</ul>
		</nav>
		<div id="sign_up">
			<form action="splash.php" method="POST">
				<h2>Sign Up</h2>
				<input type="text" name="FName" id="FName" placeholder="First Name"/>
				<input type="text" name="LName" id="LName" placeholder="Last Name"/>
				<input type="date" name="DOB" id="DOB" placeholder="Date of Birth"/>
				<input type="text" name="UName" id="UName" placeholder="Username"/>
				<input type="password" name="Password" id="Password" placeholder="Password"/>
				<input type="submit" value="Submit" name="SubmitSU" id="SubmitSU"/>
			</form>
		</div>
		<?php

		?>
		
		<div id="login">
			<form action="splash.php" method="POST">
				<h2>Login</h2>
				<input type="text" name="UName" placeholder="Username"/>
				<input type="text" name="Password" placeholder="Password"/>
				<input type="submit" value="Submit" name="SubmitSI"/>
			</form>
		</div>
		<section class="Search">
			<div class="SearchWrap">
				<h2>About Us</h2>
					<p>Working Chains is a project developed by 5 undergraduate students at the University of Queensland. A source and referenced based 
					social media of sorts, we have captured the essence of user interaction through relentless research and planning. So how will this 
					benefit you? Great Question! This referencing app is targeted towards younger students, namely that of 14-18 studying Modern Australian
					History and other related subjects. The user will be able to search through Trove's extensive collections of artifacts, articles and mostly 
					any electronic media you can think of. You will be able to keep track of your chains and post comments on reliability of sources, helping 
					you through your research stage of your assignments.</p>
					<p>To create a chain, simply sign up and follow the instructions, it's as easy as that! If you don't want to sign up then feel free to 
					browse through our extensive database of already existing History Chains. By signing up, you can have access to collaborative chains, your own 
					profile and most importantly the privilege to access and modify your own history chains!</p>
					<p>So what are you waiting for? Let's start Chaining!</p>
			</div>
		</section>
	</div>
</body>