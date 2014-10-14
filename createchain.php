<?php
require("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);
$user = new User();


?>


<!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>History Chains > Create Chain</title>
		<link rel="stylesheet" type="text/css" href="resources/plugins/vertical-timeline/css/style.css" />
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700" />
		<link rel="stylesheet" type="text/css" href="/resources/plugins/vertical-timeline/css/style.css" />
		<script src="resources/plugins/vertical-timeline/js/modernizr.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="resources/plugins/validation/jquery.validate.js"></script>
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

				$("#mkChain").click(function(){
					valid = true;
					if($("#title").val() =="") {
						alert ("That is not a valid title for a chain.");
						event.preventDefault();
					}
					else if ($("#topic").val() ==""){					
						alert ("They are not valid tags for a chain.");
						event.preventDefault();
					}
					else {
						$("#mkChainForm").submit()
					}
				});
			});
		</script>	
		<script>
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
					<li><a href="index.php">Home</a> </li>
					<li class="current_page"><a href="createchain.php">Create Chain</a> </li>
					<li><a href="profile.php">Profile</a> </li>
					<li><a href="about.php">About</a> </li>
				</ul>
			</nav>
			
			<div class="CreateChain">
				<h2>Let's Get Started!</h2>
				<button type="button" class="New_Chain_Link">Create a Chain</button>
				<button type="button" class="Exist_Link">Edit a Chain</button>
				<form id="mkChainForm" class="CreateNew" action="createchain.php" method="post">
					<h2>Create a New Chain!</h2>
					<p>Title:</p><input id="title" name="title" type="text" placeholder="Chain Title" />
					<p>Tags:</p><input id="topic" name="topic" type="text" placeholder="Tags" />
					<p><input name="mkChain" id="mkChain" type="submit" value="Create Chain!" ></p>
				</form>
				<?php
				if (isset($_POST['mkChain'])) {
    				$controller->handleCreateChain($user->getId(), $_POST['title'], $_POST['topic']);
				}
				if (isset($_POST['Chains']) && isset($_POST['del'])) {
					$controller->handleDeleteChain($_POST['Chains']);
				}
				?>
				<div class="ListedChains">
					<h2>Edit Your Chains</h2>
					<form action="createchain.php" method="post">
						<select name="Chains" id="sortBy">
							<?php
								$controller->handleEditChains($user->getId());
							?>
						</select>
						<button type="submit" id="edit">Edit</button>
						<button name="del" type="submit" id="del" onclick="return confirm('Are you sure you want to delete this chain?');">Delete</button>

					</form>
				</div>
			</div>
			
						<div style="clear:both"></div>
			
			<div class="app">
				<section class="Search CreateChainSearch">
					<div class="SearchWrap">
						<h2>Search</h2>
						<form action="createchain.php" method="GET" id="searchTrove">
							<input type="text" id="q" name="q" placeholder="Enter keywords, authors, public figures or events to begin your chain."/>
							<button type="submit" id="searchbtn">Search</button>
						</form>
						<article class="SearchResults">
								<div id="output">
									<table id="results_table">
										<tr>
											<th class="result_cell">Title</td>
											<th class="result_cell">Year</td>
											<th class="result_cell">Author</td>
											<th class="result_cell"> </td>
											<th class="result_cell"> </td>
										</tr>
									<?php
			                            if (isset($_GET['q'])) {
			                                if ($_GET['q'] === "") {
			                                	$view->printMessage("Please enter a valid search term!");
			                                } else {
			                                    $controller->handleSearch($_GET['q']);
			                                }
			                            } else {
			                            	$view->printMessage("Start searching so we can show you some results!");
			                            }

									?>
									</table>
                        		</div>
						</article>
					</div>
				</section>
				
						
		<section class="TopChain CreateChainTimeline">
			<h2><?php $controller->getActiveChain($user); ?></h2>
			<section id="cd-timeline" class="cd-container">
				<div class="cd-timeline-block">
					<div class="cd-timeline-img cd-picture">
						<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Picture">
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
	<div style="clear:both"></div>

			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html> 