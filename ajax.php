<?php
require_once("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);
$controller = new Controller($model, $view);


echo $controller->handleSearch($_GET['searchTroveInput']);
