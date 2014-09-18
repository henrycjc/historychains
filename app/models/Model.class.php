<?php

class Model {
	
	protected $mysqli;
    protected $API_KEY = "6giss2nf0mavv6gk";

	public function __construct(mysqli $mysqli) {
		$this->mysqli = $mysqli;
	}

    public function getTroveResults($q, $zone) {
        $str = "http://api.trove.nla.gov.au/result?key=".$this->API_KEY."&zone=".$zone."&q=".urlencode(strip_tags(trim($q)))."&encoding=json";
        $file = file_get_contents($str);
        $result = json_decode($file, TRUE);
        if ($file !== NULL) {
            return $result['response']['zone'][0]['records']['work'];
        }
        return NULL;
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