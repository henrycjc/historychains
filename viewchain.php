<?php
require("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);

$chain = "";
if (isset($_GET['title'])) {
    $chain = trim(stripslashes($_GET['title']));
} else {
    echo "<p>You are at this page by accident, go back now!</p>";
    die();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="resources/images/logo.png">
    <title>HC > Welcome</title>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/plugins/vertical-timeline/css/style.css" />
    <script src="resources/plugins/vertical-timeline/js/modernizr.js"></script>
  </head>
<body>
  <div class="wrap">
    <div class="Welcome">
      <h1>History Chains</h1>
    </div>


    <section class="TopChain CreateChainTimeline1">
      <h2 id="chainName"> </h2>
             <section id="cd-timeline" class="cd-container">
                <?php $controller->handleViewChain($chain); ?>
             </section>
  </div>
</body>
