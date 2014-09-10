<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			$("#sign_up").hide();
			  $("#sign_up_link").click(function(){
				$("#sign_up").toggle("slow");
			  });
			});
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
				<li> <a href="about.php">About Us</a> </li>
			</ul>
		</nav>
		<div id="sign_up">
			<form>
				<input type="text" name="FName" placeholder="First Name"/>
				<input type="text" name="LName" placeholder="Last Name"/>
				<input type="date" name="DOB" placeholder="Date of Birth"/>
				<input type="text" name="UName" placeholder="Username"/>
				<input type="text" name="Password" placeholder="Password"/>
				<input type="submit" value="Submit" />
			</form>
		</div>
	</div>
</body>