<?php
require_once("resources/configs/Global_Config.php");

$q =
file_get_contents("http://api.trove.nla.gov.au/result?key=6giss2nf0mavv6gk&zone=book&q=tangled&encoding=json");

d($q);

### Comment


