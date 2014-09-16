<?php

class Model {
	
	protected $mysqli;

	public function __construct(mysqli $mysqli) {
		$this->mysqli = $mysqli;
	}

    private function getChainsById($userid) {

        $queryStr = "SELECT *
                     FROM `chain`
                     WHERE `uid` = ".$userid;
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);
        while ($row = $result->fetch_assoc()) {
            $chains[] = $row['chainid'];
            $count++;
        }
        if (count === 0) {
            return NULL;
        }
        $result->close();
        return chains;
    }
	
	private function getUserCount() {

		$count = -1;
		$queryStr = "SELECT * 
					 FROM `user`";

		if ($result = $this->mysqli->query($queryStr)) {
			$count = $result->num_rows;
		} else {
			printf("MySQL Error: %s\n", $this->mysqli->error);
		}
		$result->close();
		return $count;
	}

	public function closeMysqli() {
		$this->mysqli->close();
	}

}