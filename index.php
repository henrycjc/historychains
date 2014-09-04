<?php
require_once("resources/config/Global_Config.php");
require_once("resources/config/Mysql_Connection.php");

$db = new Mysql_Connection();

echo $db->dbCon->stat;


echo phpinfo();
?>