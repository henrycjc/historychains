<?php
require_once("app/configs/Global_Config.php");
$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$view = new View($model);


if (isset($_POST['AddUser'])) {

    $res = $view->showChain($model->getChainSources($_POST['AddUser']));
    echo $_POST['AddUser'];
    echo "SUCCESS";
} else {
    echo "FAILURE";
}
