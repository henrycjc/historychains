<?php
include_once("../vendor/kint/Kint.class.php");
include_once("../models/Mysql_Connection.class.php");

$mysqli = new Mysql_Connection();


$mysqli->getConn()->query("INSERT INTO user_chain
                            VALUES (1,'".$_POST['troveid']."', 'itworked')");
