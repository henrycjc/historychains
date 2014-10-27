<?php
require_once("app/configs/Global_Config.php");

$mysqli = new Mysql_Connection();
$model = new Model($mysqli->getConn());

$user = "NOT SET";
$userid = "NOT YET SET";
$chainname = "NOT SET";
$troveid = "NOT SET";
$keywords = "NOT SET";
$notes = "NOT SET";

if (isset($_POST['AddUser'])) {
    $user = $_POST['AddUser'];
    $userid = $model->getUserId($user);
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

if ($model->addSourceToChain($userid, $chainname, $keywords, $notes, $troveid) === TRUE) {
    return "SUCCESS";
} else {
    return "FAILURE";
    //echo "userid: " .$userid . "\n chain: " .$chainname . "\n keywords: ".$keywords . "\n notes: " .$notes . "\n troveid: " .$troveid;
    //echo "FUCK";
}


