<?php
require_once("../models/Mysql_Connection.class.php");
require_once("../vendor/kint/Kint.class.php");

echo "<h2>Test create an instance of Mysql_Connection</h2>";
$sql = new Mysql_Connection();

echo "<h2>Test dump connection</h2>";
d($sql->getConn());
echo "<br>";

echo "<h2>Test dump obj</h2>";
d($sql);
echo "<br>";

echo "<h2>Test close connection</h2>";
$sql->closeConn();
echo "<br>";

echo "<h2>Test connection definitely closed </h2>";
d($sql);