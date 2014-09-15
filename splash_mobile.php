<!--Template Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"
"http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
	<title>Welcome</title>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css"><!--Jquery Mobile Stylesheet-->
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!--JQuery-->
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script><!--Jquery Mobile-->
	<link href="resources/css/mobile_styles.css" media="all" rel="stylesheet" type="text/css" />
	<script>
			$(document).ready(function(){ 
				$("#signup_form").hide();
				$("#signin_form").hide();
				
				$("#signin").click(function(){
					$("#signin_form").toggle("slow");
					$("#signup_form").hide("slow");
				});
				$("#signup").click(function(){
					$("#signup_form").toggle("slow");
					$("#signin_form").hide("slow");
				});
			});
		</script>
	</head>
<body id="splash_page">
	<main class="main_bg">
		<div class="basics">
			<header>
				<h1 class="splash_header">History Chains</h1>
			</header>
			<section> 
				<button id="signin">Sign In</button>
				<button id="signup">Sign Up</button>
				<form id="signin_form" method="post">
					<input type="text" id="username" placeholder="Username" />
					<input type="password" id="password" placeholder="password" />
					<button id="sign_in">Sign In</button>
				</form>
				<form id="signup_form" method="post">
					<input type="text" name="FName" placeholder="First Name"/>
					<input type="text" name="LName" placeholder="Last Name"/>
					<label for="DOB" class="DOB"/>Date of Birth</label>
					<input type="date" name="DOB" class="DOB"/>
					<input type="text" name="UName" placeholder="Username"/>
					<input type="text" name="Password" placeholder="Password"/>
					<button id="sign_up">Sign Up</button>
				</form>
			</section>
		</div>
			<footer>	
			<p class="link"><span>&#169;All rights reserved<br  /> Template by W3Layouts <br  /> Modified by Angus Payne</span></p>
			</footer>
	</main>

</body>
</html>