<?php
echo "test";
require_once("resources/configs/Global_Config.php");
require_once("resources/models/Mysql_Connection.php");


$q =
file_get_contents("http://api.trove.nla.gov.au/result?key=6giss2nf0mavv6gk&zone=book&q=tangled&encoding=json");

d($q);

d($mysqli);


