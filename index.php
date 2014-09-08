<?php
require_once("resources/config/Global_Config.php");
require_once("resources/config/Mysql_Connection.php");

if ($q = file_get_contents("http://api.trove.nla.gov.au/result?key=6giss2nf0mavv6gk&zone=book&q=tangled&encoding=json") !== FALSE) {
	echo json_decode($q);
}

$db = new Mysql_Connection();

echo $db->dbCon->stat;


echo phpinfo();
?>