<?php

include_once("Global_Config.php");

class Mysql_Connection {

    protected $dbHost = "127.0.0.1";
    protected $dbName = "HISTORY_CHAINS";
    protected $dbUser = "hchain";
    protected $dbPass = "historychains";
    public $dbCon;

    function __construct() {
        $dbCon = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
        if ($dbCon->connect_errno > 0) {
            printf("MySQL Error: %s\n", $dbCon->connect_error);
            exit(1);
        }
    }

}
