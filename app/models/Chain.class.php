<?php
if (!class_exists("Model"))
    require_once("Model.class.php");

class Chain extends Model {


    private $title;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getChainSources($chain) {
        $queryStr = "SELECT *
                     FROM `sources`
                     WHERE `source_id` IN (SELECT `source_id`
                                         FROM `user_chain_source`
                                         WHERE `chain_title` ='".$chain."')";
        $chains = array();
        $count = 0;
        $result = parent::getMysqli()->query($queryStr);
        if ($result === FALSE) {
            return FALSE;
        }
        while ($row = $result->fetch_assoc()) {
            $chains[] = $row;
            $count++;
        }
        if ($count === 0) {
            return NULL;
        }
        $result->close();
        return $chains;
    }

    public function showChain() {
        $state = parent::getChainsByTitle($this->title);
        if ($state !== FALSE) {
            echo "<table> <th>sourceid</th></th><th>userid</th><th>chain title</th>";
           // echo
        }

    }

    public function addItem($user, $chain, $troveid, $keywords, $notes) {

    }

    public function removeItem($user, $troveid) {

    }

}