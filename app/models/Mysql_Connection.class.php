<?php

class Mysql_Connection {

	protected $usr;
	protected $pass;
	protected $host = "localhost";
	protected $db = "history_chains";
	public $connected = FALSE;
	public $dbConn;

	public function __construct() {
		$this->getEnv();
		if (is_resource($this->dbConn) && 
				get_resource_type($this->dbConn) === 'mysql link') {
			echo "<h1>FIXME: already connected to dbConn</h1>";
			$this->connected = TRUE;
			return $this->dbConn;
		}
		
		$this->dbConn = new mysqli($this->host, $this->usr, $this->pass, $this->db);
		if ($this->dbConn->connect_errno) {
   			echo "<h1>dbConn Error: ".$dbConn->connect_errno." ".$dbConn->connect_error;
   			exit(1);
		}
		$this->connected = TRUE;
		$this->setCharset();

		return $this->dbConn;
	}

	public function getConn() {
		return $this->dbConn;
	}

	public function closeConn() {
		if (is_resource($this->dbConn)) {
			$this->dbConn->close();
		} else {
			echo "<h1>HENRY FIX ME: dbConn already closed</h1>";
			echo "dbConn: " . is_resource($this->dbConn) . "<br>";
			echo get_resource_type($this->dbConn) . "<br>";
			var_dump($this->dbConn);
			echo "<h1> END FIX ME</h1>";
		}
		
		$this->connected = FALSE;
	}

	private function getEnv() {

		if ($_SERVER['REMOTE_ADDR'] === "::1") {
			$this->usr = "root";
			$this->pass = "";
		} else {
			$this->usr = "hchains";
			$this->pass = "sQHSaLv69eetjefu";
		}
	}
	
	private function setCharset($charset = "utf8") {
		$this->dbConn->set_charset("utf8");
	}
	
}