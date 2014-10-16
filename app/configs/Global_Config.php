<?php
error_reporting(E_ALL);
ini_set("error_reporting", -1);


require_once("app/vendor/kint/Kint.class.php");
require_once("app/models/Mysql_Connection.class.php");
require_once("app/models/Model.class.php");
require_once("app/controllers/Controller.class.php");
require_once("app/views/View.class.php");
require_once("app/models/User.class.php");
require_once("app/models/Chain.class.php");


//include("app/views/DebugMode.php");