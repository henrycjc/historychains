<?php

class Model {
	
	protected $mysqli;

	public function __construct(mysqli $mysqli) {
		$this->mysqli = $mysqli;
	}

	
	private function getUserCount() {

		$count = -1;
		$queryStr = "SELECT * 
					 FROM `USER`";

		if ($result = $mysqli->query($queryStr)) {
			$count = $result->num_rows;
		} else {
			printf("MySQL Error: %s\n", $mysqli->mysql_error);
		}
		$result->close();
		return $count;
	}

	public function closeMysqli() {
		$this->mysqli->close();
	}

}