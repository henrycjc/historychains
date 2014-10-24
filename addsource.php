<?php
require_once("app/configs/Global_Config.php");

$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());
$chain = new Chain($mysqli->getConn());

$user = "NOT SET";
$chainname = "NOT SET";
$troveid = "NOT SET";
$keywords = "NOT SET";
$notes = "NOT SET";

if (isset($_POST['AddUser'])) {
    $user = $_POST['AddUser'];
}
if (isset($_POST['AddChain'])) {
    $chainname = $_POST['AddChain'];
}
if (isset($_POST['AddSource'])) {
    $troveid = $_POST['AddSource'];
}
if (isset($_POST['AddKeywords'])) {
    $keywords = trim($_POST['AddKeywords']);
}
if (isset($_POST['AddNotes'])) {
    $notes = trim($_POST['AddNotes']);
}
$chain->addItem($user, $chainname, $troveid, $keywords, $notes);

echo "SUCCESS";
