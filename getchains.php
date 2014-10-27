<?php
require_once("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);


echo $view->showChain($model->getChainSources($))