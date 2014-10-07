<?php

require("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);

?>
<?php
	if (!TRUE) {
		header("Location: splash.php");	
	}

?>
<!DOCTYPE html>
<html> 
	<head>
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				window.location.href = "index_mobile.php";
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
			
			<nav>
				<ul> 
					<li class="current_page"> <a href="index.php">Home</a> </li><li>
					<a href="createchain.php">Create Chain</a> </li> <li>
					<a href="profile.php">Profile</a> </li> <li>
					<a href="about.php">About</a> </li>
				</ul>
			</nav>
			
			<section class="Search">
				<div class="SearchWrap">
					<h2>Search</h2>
					<form>
						<input id="q" type="text" name="q" placeholder="Enter keywords, authors, public figures or events to begin your chain."/>
					</form>
					<article class="SearchResults">
                        <?php
                            if (isset($_GET['q'])) {
                                if ($_GET['q'] === "") {
                                	$view->blankEntry();
                                    printf("<p>%s</p>", $view::BLANK_ENTRY);
                                } else {
                                    $controller->handleSearch($_GET['q']);
                                }
                            } else {
                                printf("<p>%s</p>\n", $view::NO_ENTRY_YET);
                            }

                        ?>

					</article>
				</div>
			</section>
			
			<section class="TopChain">
				<h2>Top Chains</h2>
			</section>
			
			<footer class="footer">
				<p>Co-founders: Elliot Randall, Henry Chladil, Alek Thompson, Gary Myles and Angus Payne</p>
				<p>All Rights Reserved</p>
			</footer>
		</div>
	</body>
</html> 