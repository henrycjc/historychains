<!DOCTYPE html> 
<html> 
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		<div class="wrap">
			<div class="logo">
				<h1>History Chains</h1>
				<img class="lim" src="images/logo.png" width="100px" />
							<div style="clear:both"></div>
			</div>
			
			<nav>
				<ul> 
					<li> <a href="index.html">Home</a> </li>
					<li> <a href="#">Create Chain</a> </li>
					<li> <a href="#">Search Chain</a> </li>
					<li> <a href="#">About</a> </li>
				</ul>
			</nav>
			
			<div class="CreateChain">
				<form class="CreateNew">
					<h2>Create a New Chain!</h2>
					<p>Title:</p><input type="text" placeholder="Chain Title" />
					<p>Tags:</p><input type="text" placeholder="Tags" />
					<p><input type="button" value="Create Chain!"></p>
				</form>
				
				<div class="ListedChains">
					<h2>Edit Your Chains</h2>
					<select name="Chains">
						<option value="Chain1">Chain 1</option>
						<option value="Chain2">Chain 2</option>
						<option value="Chain3">Chain 3</option>
						<option value="Chain4">Chain 4</option>
					</select>
				</div>
			</div>
			
						<div style="clear:both"></div>
			
			<section class="Search">
				<div class="SearchWrap">
					<h2>Search</h2>
					<form>
						<input type="text" name="SearchField" placeholder="Enter keywords, authors, public figures or events to begin your chain."/>	
					</form>
					<article class="SearchResults">
						<p>Start Searching so we can show you some results!</p>
					</article>
				</div>
			</section>
			
			<section class="TopChain">
				<h2>Your Chain</h2>
			</section>
			
			<footer>
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html> 