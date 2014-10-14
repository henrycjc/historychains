<?php
 
        require_once("../models/Mysql_Connection.class.php");
        require_once("../models/Model.class.php");
        require_once("../controllers/Controller.class.php");
        require_once("../views/View.class.php");
        require_once("../models/User.class.php");
        $mysqli = new Mysql_Connection();
        $model = new Model($mysqli->getConn());
        $view = new View($model);
        $controller = new Controller($model, $view);
        $user = new User("angus", "payne", "20/04/1996", "angus", "password");
       
        if (isset($_POST['UName']) && isset($_POST['Password'])) {
			$correctUName = $model->checkIfUserExists('UName'); // checks username
			if ($correctUName == TRUE){
				$correctPassword = $model->checkIfValidPassword('Password'); // checks password
				if ($correctPassword == TRUE){
					printf("It worked"); // correct login
					d($_POST);
				} else {
						printf("It didn't work"); // incorrect login
						d($_POST);
						}
			}
			d($_POST);
        }
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
			<form>
				<h2>Sign Up</h2>
				<input type="text" name="FName" placeholder="First Name"/>
				<input type="text" name="LName" placeholder="Last Name"/>
				<input type="date" name="DOB" placeholder="Date of Birth"/>
				<input type="text" name="UName" placeholder="Username"/>
				<input type="text" name="Password" placeholder="Password"/>
				<input type="submit" value="Submit" />
			</form>
		</div>
		
		<div id="login">
			<form>
				<h2>Login</h2>
				<input type="text" id="UName" placeholder="Username"/>
				<input type="text" id="Password" placeholder="Password"/>
				<input type="submit" value="Submit" />
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
					profile and most importantly the privelage to access and modify your own history chains!</p>
					<p>So what are you waiting for? Let's start Chaining!</p>
			</div>
		</section>
	</div>
</body>