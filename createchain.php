<!DOCTYPE html>
<html> 
	<head>
		<link rel="stylesheet" href="resources/plugins/vertical-timeline/css/style.css"> <!-- Resource style -->
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<!-- This is for the timeline -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/resources/vendor/vertical-timeline/css/style.css" /> <!-- Resource style -->
		<script src="/resources/vendor/vertical-timeline/js/modernizr.js"></script> <!-- Modernizr -->
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
		
		<script type="text/javascript"><!-- page redirect-->
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				window.location.href = "createchain_mobile.php";
			};
		</script>
		
	</head>
	
	<body>
		<div class="wrap">
			<div class="logo">
				<h1 id="header_title">History Chains</h1>
				<img class="lim" src="resources/images/logo.png" width="100px" />
							<div style="clear:both"></div>
			</div>
			
			<nav class="nav1">
				<ul> 
					<li> <a href="index.php">Home</a> </li><li class="current_page">
					 <a href="createchain.php">Create Chain</a> </li><li>
					<a href="profile.php">Profile</a> </li><li>
					<a href="about.php">About</a> </li>
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
					<form action="#" id="searchTrove">
						<input type="text" id="searchTerm" placeholder="Enter keywords, authors, public figures or events to begin your chain."/>
						<select id="sortBy">
							<option>relevance</option>
							<option>dateasc</option>
							<option>datedesc</option>
						</select>
						<button type="submit" id="searchbtn">Search</button>

						
					</form>
					<article class="SearchResults">
						<div class="results">
							<div id="output">
								<h4>Search Results</h4>
							</div>

						</div>
						<p class="SearchTitle">Start Searching so we can show you some results!</p>
					</article>
				</div>
			</section>
			
					
	<section class="TopChain">
		<h2>Your Chain</h2>
		<section id="cd-timeline" class="cd-container">
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="/resources/vendor/vertical-timeline/img/cd-icon-picture.svg" alt="Picture">
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
					<img src="/resources/vendor/vertical-timeline/img/cd-icon-movie.svg" alt="Movie">
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
					<img src="/resources/vendor/vertical-timeline/img/cd-icon-picture.svg" alt="Picture">
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
					<img src="/resources/vendor/vertical-timeline/img/cd-icon-location.svg" alt="Location">
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
					<img src="/resources/vendor/vertical-timeline/img/cd-icon-location.svg" alt="Location">
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
					<img src="/resources/vendor/vertical-timeline/img/cd-icon-movie.svg" alt="Movie">
				</div> <!-- cd-timeline-img -->

				<div class="cd-timeline-content">
					<h2>Final Section</h2>
					<p>This is the content of the last section</p>
					<span class="cd-date">Feb 26</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->
		</section> <!-- cd-timeline -->
		<script src="/resources/vendor/vertical-timeline/js/main.js"></script> <!-- Resource jQuery -->
	</section>
	
	<script type="text/javascript">
			// http://jsonviewer.stack.hu/

			// Replace the apiKey variable with your own from Trove - required for conducting searches using the Trove API
			// http://help.nla.gov.au/trove/building-with-trove/api
			var apiKey = "6giss2nf0mavv6gk";;
		
			$(document).ready(function(){

				// There is an issue with TROVE applications where the first search will result in nothing being returned
				// To get around this, we perform a dummy form submit.
				$("form#searchTrove").submit();

				// action that occurs when the form is submitted - either through hitting the enter key or by clicking on Search
				$("form#searchTrove").submit(function() {
		    		
		    		// Get the values from our search form
				    var searchTerm = $("#searchTerm").val();
				    // Set the search zone - alternatively you can set this using a form input
				    var searchZone = 'newspaper';
				    var sortBy = $("#sortBy").val();
			    
				    /* 
				    *	Construct the URL for the Trove Search API
				    * 	http://api.trove.nla.gov.au/result? is the base URL required for accessing the TROVE API
				    * 	Additional arguments are sent as key/value pairs separated by the & sign
				    * 	key is the API key needed to access the API
				    * 	encoding tells the API how to return the results - json or xml (default)
				    * 	zone tells the API where to perform the search - book, picture, article, music, map, collection, newspaper, list or all can be used
				    * 	sortby tells the API how to sort the results - datedesc, dateasc, relevance
				    * 	q is the set of keywords to search on, alternatively you can use Indexes to refine the search terms (see the API documentation for how to use indexes & which zones support each one
				    *	callback allows you to specify a function to process the response - even if you choose not to set one, you need to include the callback parameter
				    * 	See the API documentation for other parameters you can use in the search string
				    */ 
				    var url = "http://api.trove.nla.gov.au/result?key=" + apiKey + "&encoding=json&zone=" + searchZone + 
				    "&sortby=" + sortBy + "&q=" + searchTerm + "&s=0&n=5&include=articletext,pdf&encoding=json&callback=?";
				
				    /*	
				    * 	Perform the search using jQuery's getJSON method
				    *	Requires the search URL
				    */	
				    console.log(url);
			    	var counter = 1;
				    $.getJSON(url, function(data) {
				    	// clear the HTML div that will display the results
				        $('#output').empty();

				        $.each(data.response.zone[0].records.article, function(index, value) {
				          	$("#output").append("<button class='addtochain' type='submit' id='addtochain" + counter + "'"  + ">Add to Chain</button>" + "<h3>" + index + " " + value.work + "</h3>" + "<p>" + value.troveUrl +"</p><hr/>");
							$('.SearchTitle').text('Your Search Was Successful!');
							$('.SearchTitle').css('color', '#02A2EF');
							counter += 1;
				        });
					});
				});
			});
		</script>
			
			
			
			
			
			
			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html> 