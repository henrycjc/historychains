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
	<title>Create Chain</title>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css"><!--Jquery Mobile Stylesheet-->
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!--JQuery-->
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script><!--Jquery Mobile-->
	<link rel="stylesheet" href="resources/plugins/vertical-timeline/css/style.css"> <!-- Resource style -->
	<script src="resources/plugins/vertical-timeline/js/modernizr.js"></script> <!-- Modernizr -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href="resources/css/mobile_styles.css" media="all" rel="stylesheet" type="text/css" />
	<script>
			$(document).ready(function(){
				//hide all divs on start up
				$("#create_chain").hide(); 
				$("#edit_chain").hide();
				$("#search").hide();
				$("#chain").hide();
				//Clicking the Create Button
				$("#CreateChain").click(function(){
					$("#create_chain").toggle("slow");
					$("#edit_chain").hide("slow");
					$("#search").hide();
					$("#chain").hide();
				});
				//Clicking the Edit Button
				$("#EditChain").click(function(){
					$("#edit_chain").toggle("slow");
					$("#create_chain").hide("slow");
					$("#search").hide();
					$("#chain").hide();
				});
				//Clicking the Search Button
				$("#SearchChain").click(function(){
					$("#search").toggle("slow");
					$("#create_chain").hide("slow");
					$("#edit_chain").hide();
					$("#chain").hide();
				});
				//Clicking the Chain Button
				$("#ViewChain").click(function(){
					$("#chain").toggle("slow");
					$("#create_chain").hide("slow");
					$("#edit_chain").hide();
					$("#search").hide();
				});
				
				$("#searchbtn").click(function(){
					//Trove Search
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
							"&sortby=" + sortBy + "&q=" + searchTerm + "&s=0&n=10&include=articletext,pdf&encoding=json&callback=?";
						
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
									$( ".ui-icon-loading" ).hide();
									counter += 1;
								});
							});
						});
					});
				});
			});
		</script>
	</head>
<body>
	<main class="main_bg">
		<div class="basics">
			<header>
			<div id="header">
					<img src="resources/images/logo.png"" alt="History Chains Logo" />
					<h1>History Chains</h1>
					<div style="clear:both"></div>
			</div>
				<div class="drp-dwn">
					<select onchange="window.location=this.options[this.selectedIndex].value">
						<option value="createchain_mobile.php">Chains</option>
						<option value="about_mobile.php">About</option>
						<option value="index_mobile.php">Home</option>
						<option value="profile_mobile.php">Profile</option>
					</select>
				</div>
			</header>
			<section class="h1" id="top_chain">
				<h2>Chains</h2>
				<p>Firstly, what would you like to do?</p>
				<button class="button" id="CreateChain">Create Chain</button><br  />
				<button class="button" id="EditChain">Edit Chain</button><br  />
				<button class="button" id="SearchChain">Search</button><br  />
				<button class="button" id="ViewChain">View Chain</button>
			</section>
			<section>
				<div id="create_chain" class="chain_manipulation_div">
					<form class="CreateNew">
							<h3>Create a New Chain!</h2>
							<p>Title:</p><input type="text" placeholder="Chain Title" />
							<p>Tags:</p><input type="text" placeholder="Tags" />
							<p><input type="button" value="Start Chain!" class="button"></p>
					</form>
				</div>
				<div id="edit_chain" class="chain_manipulation_div">
					<h2>Edit Your Chains</h2>
					<select name="Chains">
						<option value="Chain1">Chain 1</option>
						<option value="Chain2">Chain 2</option>
						<option value="Chain3">Chain 3</option>
						<option value="Chain4">Chain 4</option>
					</select>
				</div>
				<div id="search" class="chain_manipulation_div">
					<h2>Search</h2>
					<form action="#" id="searchTrove">
						<input type="text" id="searchTerm" placeholder="Search for anything to begin."/>
						<select id="sortBy">
							<option>relevance</option>
							<option>date asc</option>
							<option>date desc</option>
						</select>
						<button type="submit" id="searchbtn" class="button">Search</button>
						<div id="output"></div>
				</div>
			</section>
			<section>
				<div id="chain" class="chain_manipulation_div">
					<img class="user_picture" src="resources/images/profile.jpg" alt="User Picture">
					<span class="chain_title">Your Chain</span>
							<section id="cd-timeline" class="cd-container">
								<div class="cd-timeline-block">
									<div class="cd-timeline-img cd-picture">
										<img src="resources/plugins/vertical-timeline/img/cd-icon-picture.svg" alt="Picture">
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
										<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Movie">
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
										<img src="resources/plugins/vertical-timeline/img/cd-icon-picture.svg" alt="Picture">
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
										<img src="resources/plugins/vertical-timeline/img/cd-icon-location.svg" alt="Location">
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
										<img src="resources/plugins/vertical-timeline/img/cd-icon-location.svg" alt="Location">
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
										<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Movie">
									</div> <!-- cd-timeline-img -->

									<div class="cd-timeline-content">
										<h2>Final Section</h2>
										<p>This is the content of the last section</p>
										<span class="cd-date">Feb 26</span>
									</div> <!-- cd-timeline-content -->
								</div> <!-- cd-timeline-block -->
							</section> <!-- cd-timeline -->
							<script src="resources/plugins/vertical-timeline/js/main.js"></script> <!-- Resource jQuery -->			
						</section>
					</div>
			</section>
		</div>
			<footer>	
			<p class="link"><span>&#169;All rights reserved<br  /> Template by W3Layouts </br > Modified by Angus Payne</span></p>
			</footer>
	</main>

</body>
</html>