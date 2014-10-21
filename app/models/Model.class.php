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

    public function createNewChain($user, $title, $topic) {

        $queryStr = "INSERT INTO `history_chains`.`user_chain` (`id`, `title`, `topic`)
                     VALUES ('".$user."', '".$title."', '".$topic."')";
        if ($this->mysqli->query($queryStr) !== TRUE) {
            return $this->mysqli->error;
        } else {
            return TRUE;
        }
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

	public function closeMysqli() {
		$this->mysqli->close();
	}
	
	public function checkIfUserExists($username) {
		$queryStr = "SELECT username 
					FROM user
					WHERE username ="."'".$username."';";
		if ($this->mysqli->query($queryStr) !== TRUE) {
			return TRUE;
		} else {
			echo("invalid user");
			return FALSE;
		}
	}
	
	public function checkIfValidPassword($username, $password) {
		$queryStr = "SELECT password
						FROM user
						WHERE 'username' =".$username. "AND 'password =".$password;
			if ($this->mysqli->query($queryStr) !== TRUE) {
				return TRUE;
			} else {
				echo("invalid password");
				return FALSE;
			}
	}
	
	public function getUserInfo() {
			$user_Array[1] = "'".$this->mysqli->query("SELECT username FROM user WHERE username =".$_COOKIE['user'])."'";
			$user_Array[2] = "'".$this->mysqli->query("SELECT fname FROM user WHERE username =".$_COOKIE['user'])."'";
			$user_Array[3] = "'".$this->mysqli->query("SELECT lname FROM user WHERE username =".$_COOKIE['user'])."'";
			$user_Array[4] = "'".$this->mysqli->query("SELECT dob FROM user WHERE username =".$_COOKIE['user'])."'";
			$user_Array[5] = "'".$this->mysqli->query("SELECT password FROM user WHERE username =".$_COOKIE['user'])."'";
			return $user_Array;
	}
	
	public function logUserIn($username, $password) {
		if ($this->checkIfUserExists($username) === TRUE) {
			if ($this->checkIfValidPassword($username, $password) == TRUE) {
				header('Location : index.php');
				setcookie("user_logged_in", 'true', time() + (86400 * 30), "/"); // extends cookies life by a month
				setcookie("user", $username, time() + (86400 * 30), "/");  // extends cookies life by a month
			} else {
				echo("invalid password");
			}
		} else {
			echo("invalid username");
		}
	}

	public function checkUserLoggedIn() {
		$cookie_name = "user_logged_in";
		if ($_COOKIE[$cookie_name] != "true") {
			header('Location: splash.php');
		}
	}
	
	public function splashCheckUserLoggedIn() {
		$cookie_name = "user_logged_in";
		if ($_COOKIE[$cookie_name] == "true") {
			header('Location: index.php');
		}
	}
		
	public function getUserLoggedIN() {
		return  $_COOKIE[$cookie_name] ;
	}
	
	public function addUserToDB($user) {
		$queryStr = "INSERT INTO user (`username`, `password`, `fname`, `lname`, `dob`)
					VALUES ('".$user->getUserName()."','".$user->getPassword()."','".$user->getFname()."','".$user->getLname()."','".$user->getDob()."')";
		$username = $user->getUsername();
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unsuccessful registration, please try again");
		} else {
			setcookie("user_logged_in", "true", time() + (86400 * 30), "/"); // extends cookies life by a month
			setcookie("user", $username, time() + (86400 * 30), "/");  // extends cookies life by a month
		}
	}
	
	public function updateUserFName($username, $fname) {
		$queryStr = "UPDATE user
					SET fname= '". $fname."'
					 WHERE username ='".$username."'";
		echo($fname);
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function updateUserLName($username, $lname) {
		$queryStr = "UPDATE user
					SET lname= '". $lname."'
					 WHERE username ='".$username."'";
		echo($lname);
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function updateUserDOB($username, $dob) {
		$queryStr = "UPDATE user
					SET dob= '". $dob."'
					 WHERE username ='".$username."'";
		echo($dob);
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function updateUserInsitution($username, $institution) {
		$queryStr = "UPDATE user
					SET institution= '". $institution."'
					 WHERE username ='".$username."'";
		echo($institution);
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
}