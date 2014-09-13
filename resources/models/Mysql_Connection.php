<?php

if ($_SERVER['REMOTE_ADDR'] === "::1") {
	$sqlUser = "root";
	$sqlPass = "";
} else {
	$sqlUser = "hchains";
	$sqlPass = "sQHSaLv69eetjefu";
}

$sqlHost = "localhost";
$sqlDatabase = "HISTORY_CHAINS";
$mysqli = new mysqli($sqlHost, $sqlUser, $sqlPass, $sqlDatabase);

if ($mysqli->connect_errno) {
	printf("Connection failed: %s \n", $mysqli->connect_error);
	exit();
}
$mysqli->set_charset("utf8");
?>