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
        if ($result !== NULL) {
            if (isset($result['response']['zone'][0]['records']['work'])) {
                return $result['response']['zone'][0]['records']['work'];
            }
        }
        return FALSE;
    }

    public function createNewChain($user, $title, $topic) {

        $queryStr = "INSERT INTO `history_chains`.`user_chain` (`id`, `title`, `topic`)
                     VALUES ('".$user."', '".$title."', '".$topic."')";
        if ($this->mysqli->query($queryStr) !== TRUE) {
            return $this->mysqli->error;
        } else {
            return TRUE;
        }
    }

    public function deleteChain($chain) {
        $queryStr = "DELETE FROM user_chain
                     WHERE title = '".$chain."'";
        if ($this->mysqli->query($queryStr) !== TRUE) {
            return $this->mysqli->error;
        } else {
            return TRUE;
        }

    }

    public function getChainsByTitle($title) {
        $queryStr = "SELECT *
                     FROM `user_chain`";
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);
        d($result);
        if ($result === FALSE) {
            return FALSE;
        }
        while ($row = $result->fetch_assoc()) {
            if (strpos($row['title'], $title) !== FALSE) {
                $chains[] = $row;
                $count++;
            }
        }
        if ($count === 0) {
            return FALSE;
        }
        $result->close();
        return $chains;
    }

    public function getChainsById($user) {

        $queryStr = "SELECT *
                     FROM `user_chain`
                     WHERE `id` = ".$user;
                     
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);
        d($result);
        if ($result === FALSE) {
            return NULL;
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

    public function getMysqli() {
        return $this->mysqli;
    }

	public function closeMysqli() {
		$this->mysqli->close();
	}
	
	public function checkIfUserExists($username) {
		$queryStr = "SELECT username 
					FROM user;";
        $result = $this->mysqli->query($queryStr);
		if (in_array($username, $result)) {
			return TRUE;
		} else {
		return FALSE;
		}
	}
	
	public function checkIfValidPassword($username, $password) {
		$queryStr = "SELECT password
						FROM user
						WHERE 'username' = " .$username;
			$result = $this->mysqli->query($queryStr);
			if ($result == $password) {
				return TRUE;
			} else {
				return FALSE;
			}
	}

	public function checkUserLoggedIn() {
		$cookie_name = "user_logged_in";
		if ($_COOKIE[$cookie_name] != "true") {
			header('Location: splash.php');
		}
	}
		
	public function getUserLoggedIN() {
		return  $_COOKIE[$cookie_name] ;
	}
	
	public function addUserToDB($user) {
		$queryStr = "INSERT INTO user (`username`, `password`, `fname`, `lname`, `dob`)
					VALUES ('".$user->getUserName()."','".$user->getPassword()."','".$user->getFname()."','".$user->getLname()."','".$user->getDob()."')";
		d($queryStr);
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unsuccessful registration, please try again");
		} else {
			echo("Successful registration!");
			setcookie("user_logged_in", "false", time() + (86400 * 30), "/"); // extends cookies life by a month
			setcookie("user", "name", time() + (86400 * 30), "/");  // extends cookies life by a month
			return TRUE;
		}
	}
}