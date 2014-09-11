<!DOCTYPE html> 
<html> 
	<head>
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<!-- This is for the timeline -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>


		<link rel="stylesheet" href="resources/css/vertical-timeline/css/style.css" /> <!-- Resource style -->
		<script src="resources/vendor/verticle-timeline/js/modernizr.js"></script> <!-- Modernizr -->
		<!-- This is for the timeline -->
	
	
		<script>
			$(document).ready(function(){
				$(".CreateNew").hide(); 
				$(".ListedChains").hide(); 
				$(".New_Chain_Link").click(function(){
					$(".CreateNew").toggle("slow");
					$(".ListedChains").hide("slow");
				}); 
				$(".Exist_Link").click(function(){
					$(".ListedChains").toggle("slow");
					$(".CreateNew").hide("slow");
				}); 
			});
		</script>
		
	</head>
	
	<body>
		<div class="wrap">
			<div class="logo">
				<h1 id="header_title">History Chains</h1>
				<img class="lim" src="resources/images/logo.png" width="100px" />
							<div style="clear:both"></div>
			</div>
			
			<nav>
				<ul> 
					<li> <a href="index.php">Home</a> </li>
					<li class="current_page"> <a href="createchain.php">Create Chain</a> </li>
					<li> <a href="profile.php">Profile</a> </li>
					<li> <a href="about.php">About</a> </li>
				</ul>
			</nav>
			
			<div class="CreateChain">
				<h2>Let's Get Started!</h2>
				<button type="button" class="New_Chain_Link">Create a Chain</button>
				<button type="button" class="Exist_Link">Edit a Chain</button>
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
						<div class="results">
							<!--This is where the search results reside-->
						</div>
						<p>Start Searching so we can show you some results!</p>
					</article>
				</div>
			</section>
			
					
	<section class="TopChain">
		<h2>Your Chain</h2>
		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="vertical-timeline/img/cd-icon-picture.svg" alt="Picture">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Australian Politics</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
					<a href="#0" class="cd-read-more">Read more</a>
					<span class="cd-date">Jan 14</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="vertical-timeline/img/cd-icon-movie.svg" alt="Movie">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Title of section 2</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
					<a href="#0" class="cd-read-more">Read more</a>
					<span class="cd-date">Jan 18</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="vertical-timeline/img/cd-icon-picture.svg" alt="Picture">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Title of section 3</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
					<a href="#0" class="cd-read-more">Read more</a>
					<span class="cd-date">Jan 24</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-location">
					<img src="vertical-timeline/img/cd-icon-location.svg" alt="Location">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Title of section 4</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
					<a href="#0" class="cd-read-more">Read more</a>
					<span class="cd-date">Feb 14</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-location">
					<img src="vertical-timeline/img/cd-icon-location.svg" alt="Location">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Title of section 5</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
					<a href="#0" class="cd-read-more">Read more</a>
					<span class="cd-date">Feb 18</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->

			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-movie">
					<img src="vertical-timeline/img/cd-icon-movie.svg" alt="Movie">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Final Section</h2>
					<p>This is the content of the last section</p>
					<span class="cd-date">Feb 26</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->
		</section> <!-- cd-timeline -->
		<script src="verticle-timeline/js/main.js"></script> <!-- Resource jQuery -->
				
				
	</section>
			
			
			
			
			
			
			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html> 