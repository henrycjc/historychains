<?php

class Chain {


    private $title;
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }


    public function showChain() {
        /*
        $state = getChainsByTitle($this->title);
        if ($state !== FALSE) {
            echo "<table> <th>sourceid</th></th><th>userid</th><th>chain title</th>";
           // echo
        }
        */
    }



    public function removeItem($user, $troveid) {

    }

}