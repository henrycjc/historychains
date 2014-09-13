<?php
error_reporting(E_ALL);
ini_set("error_reporting", -1);
$local = "/Applications/XAMPP/xamppfiles/htdocs/historychains/";
$live = "/var/www/htdocs/";


if ($_SERVER['REMOTE_ADDR'] === "::1") {
	require_once($local."resources/vendor/kint/Kint.class.php");
	require_once($local."resources/models/Model.php");
	require_once($local."resources/controllers/Controller.php");
	require_once($local."resources/views/View.php");
} else {
	require_once($live."vendor/kint/Kint.class.php");
	require_once($live."resources/models/Model.php");
	require_once($live."resources/controllers/Controller.php");
	require_once($live."resources/views/View.php");
}