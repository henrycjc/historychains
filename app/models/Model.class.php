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

    public function getTroveArticleTitle($q, $zone = 'book') {
        $str = "http://api.trove.nla.gov.au/result?key=".$this->API_KEY."&zone=".$zone."&q=".$q."&encoding=json";
        $file = file_get_contents($str);
        $result = json_decode($file, TRUE);
        return $result['response']['zone'][0]['records']['work'];

    }
    public function createNewChain($user, $title, $topic) {

    	$user = $this->mysqli->real_escape_string($user);
    	$title = $this->mysqli->real_escape_string($title);
    	$topic = $this->mysqli->real_escape_string($topic);

        $queryStr = "INSERT INTO `history_chains`.`user_chain` (`id`, `title`, `topic`, `active`)
                     VALUES ('".$user."', '".$title."', '".$topic."', 0)";
        if ($this->mysqli->query($queryStr) !== TRUE) {
            if (strpos($this->mysqli->error, "Duplicate entry") !== FALSE) {
                return "A chain with the name '" . $title . "' already exists - please pick another name.";
            } else {
                return "Error: " . $this->mysqli->error;
            }

        } else {
            return TRUE;
        }
    }

    public function deleteChain($chain) {

    	$chain = $this->mysqli->real_escape_string($chain);

        $queryStr = "DELETE FROM user_chain
                     WHERE title = '".$chain."'";
        if ($this->mysqli->query($queryStr) !== TRUE) {
            return $this->mysqli->error;
        } else {
            return TRUE;
        }

    }

    public function getChainsByTitle($title) {

    	$title = $this->mysqli->real_escape_string($title);
        $queryStr = "SELECT *
                     FROM `user_chain`";
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);
        if ($result === FALSE) {
            return FALSE;
        }
        while ($row = $result->fetch_assoc()) {
            if (stripos($row['title'], $title) !== FALSE) {
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

    public function chainExists($title) {

    	$title = $this->mysqli->real_escape_string($title);
        $queryStr = "SELECT title
                     FROM `user_chain`";
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);
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
        return TRUE;
    }

    public function getChainsById($user) {

        $queryStr = "SELECT *
                     FROM `user_chain`
                     WHERE `id` = ".$user;
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);

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

    public function setActiveChain($user, $chain) {
        $queryStr = "UPDATE user_chain
                      SET active = 0
                      WHERE id = " . $user->getId();

        $result = $this->mysqli->query($queryStr);
        if ($result === FALSE) {
            return FALSE;
        }
        $chain = $this->mysqli->real_escape_string($chain);
        $queryStr2 = "UPDATE user_chain
                     SET active=1
                     WHERE id = " . $user->getId() . " AND title = '" . $chain. "'";

        $result = $this->mysqli->query($queryStr2);

        return $result;
    }

    public function getActiveChain($user) {

        $queryStr = "SELECT title
                     FROM `user_chain`
                     WHERE `active` = 1 AND
                           `id` = ".$user->getId();
        $chain = NULL;
        $result = $this->mysqli->query($queryStr);

        if ($result === FALSE) {
            return FALSE;
        }
        while ($row = $result->fetch_assoc()) {
            $chain = $row;
        }
        $result->close();
        return $chain['title'];

    }

    public function getMysqli() {
        return $this->mysqli;
    }

	public function closeMysqli() {
		$this->mysqli->close();
	}
    /* called by ajax addsource.php */
    public function addSourceToChain($userid, $chain, $keywords, $notes, $troveid) {

		$chain = $this->mysqli->real_escape_string($chain);
		$keywords = $this->mysqli->real_escape_string($keywords);
		$notes = $this->mysqli->real_escape_string($notes);
        $queryStr = "INSERT INTO `sources1` (comment, keywords, type, troveid, user, title)
                     VALUES ('".$notes."', '".$keywords."', '".'book'."', '".$troveid."', ".$userid .", '" .$chain ."')";
        $result = $this->mysqli->query($queryStr);

        if ($result === FALSE) {
            echo "MySQL error: " . $this->mysqli->error;
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function getChainSources($chain) {
    	$chain = $this->mysqli->real_escape_string($chain);
        $queryStr = "SELECT *
                     FROM `sources1`
                     WHERE `title` =  '".$chain."'";
        $chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);

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


    public function getUserId($username) {

    	$username = $this->mysqli->real_escape_string($username);
        $queryStr = "SELECT `id`
                     FROM `user`
                     WHERE `username` = '".$username."'";
        $result = $this->mysqli->query($queryStr)->fetch_assoc();

        if ($result === NULL) {
            return FALSE;
        } else {
            return $result['id'];
        }
    }

	public function checkUserLoggedIn() {
		if ($_COOKIE["user_logged_in"] !== "true") {
			setcookie("user_logged_in", 'false', time() + (86400 * 30), "/"); // extends cookies life by a month
			setcookie("user", "none", time() + (86400 * 30), "/");  // extends cookies life by a month
			header('Location: splash.php');
		}
	}
	
	public function checkUserCredentials($username, $password) {

		$username = $this->mysqli->real_escape_string($username);
		$password = $this->mysqli->real_escape_string($password);
		$queryStr = "SELECT username, password
					 FROM user
					 WHERE username ='".$username."'";
		$result = $this->mysqli->query($queryStr)->fetch_assoc();
		if ($result['username'] === $username && $result['password'] === $password) {
			$this->logUserIn($username);
			header('Refresh:0');
		} else {
			echo('invalid username or password');
		}
	}
	
	public function logUserIn($username) {
		setcookie("user_logged_in", 'true', time() + (86400 * 30), "/"); // extends cookies life by a month
		setcookie("user", $username, time() + (86400 * 30), "/");  // extends cookies life by a month
	}
	
	public function logUserOut() {
		setcookie("user_logged_in", 'false', time() + (86400 * 30), "/"); // extends cookies life by a month
		setcookie("user", "none", time() + (86400 * 30), "/");  // extends cookies life by a month
		header('Location : splash.php');
	}
	
	public function getUserFName($username) {
		$queryStr = "SELECT fname
					FROM user
					WHERE username= '".$username."'";
		$result = $this->mysqli->query($queryStr)->fetch_assoc();
		if ($result['fname'] === NULL) {
			return 'There is no first name';
		} else {
			return $result['fname'];
		}
	}
	
	public function getUserLName($username) {
		$queryStr = "SELECT lname
					FROM user
					WHERE username= '".$username."'";
		$result = $this->mysqli->query($queryStr)->fetch_assoc();
		return $result['lname'];
	}
	
	public function getUserDOB($username) {
		$queryStr = "SELECT dob
					FROM user
					WHERE username= '".$username."'";
		$result = $this->mysqli->query($queryStr)->fetch_assoc();
		return $result['dob'];
	}
	
	public function getUserInsitution($username) {
		$queryStr = "SELECT institution
					FROM user
					WHERE username= '".$username."'";
		$result = $this->mysqli->query($queryStr)->fetch_assoc();
		if ($result['institution'] === NULL){
			return "Unknown Institute!";
		} else {
			return $result['institution'];
		}
	}
	
	public function getUserRep($username) {
		$queryStr = "SELECT rep
					FROM user
					WHERE username= '".$username."'";
		$result = $this->mysqli->query($queryStr)->fetch_assoc();
		if ($result['rep'] === NULL){
			return 'You have no reputation';
		} else {
			return $result['rep'];
		}
	}
	
		public function getUserProfileImage($username) {
		$queryStr = "SELECT img
					FROM user
					WHERE username= '".$username."'";
		$link = $this->mysqli->query($queryStr)->fetch_assoc();
		if ($link['img'] === NULL){
			return "resources/images/profile.jpg";
		} else {
			return $link['img'];
		}
	}
		
	public function getUserLoggedIn() {
		return  $_COOKIE['name'] ;
	}
	
	public function addUserToDB($fname, $lname, $dob, $username, $password) {
		$queryStr = "INSERT INTO user (fname, lname, dob, username, password)
					VALUES ('".$fname."', '".$lname."', '".$dob."', '".$username."', '".$password."')";
		if ($this->mysqli->query($queryStr) === TRUE) {
			setcookie("user_logged_in", "true", time() + (86400 * 30), "/"); // extends cookies life by a month
			setcookie("user", $username, time() + (86400 * 30), "/");  // extends cookies life by a month
			header('Refresh:0');
			
		} else {
			echo("Unsuccessful registration, please try again");
		}
	}
	
	public function updateUserFName($username, $fname) {
		$queryStr = "UPDATE user
					SET fname= '". $fname."'
					 WHERE username ='".$username."'";
		
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function updateUserLName($username, $lname) {
		$queryStr = "UPDATE user
					SET lname= '". $lname."'
					 WHERE username ='".$username."'";
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function updateUserDOB($username, $dob) {
		$queryStr = "UPDATE user
					SET dob= '". $dob."'
					 WHERE username ='".$username."'";
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function updateUserInsitution($username, $institution) {
		$queryStr = "UPDATE user
					SET institution= '". $institution."'
					 WHERE username ='".$username."'";
		if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Unable to change data, please try again");
		}
	}
	
	public function checkUpload($username) {
		$target = "resources/images/user_profile_pics/";
		$target = $target . basename($_FILES['file']['name']);
		
		if ((file_exists($target. $_FILES['file']["name"])=== TRUE) && ($_FILES['file']["size"] > 500000)) {
		echo "Sorry there was a problem with your upload.
				Either your file already exists, is too larger
				or it's not in the right format (GIF, JPEG or PNG) ";
		} else {
			return TRUE;
		}
	}
	
	public function uploadImage($username) {
		$target = "resources/images/user_profile_pics/";
		$target = $target . basename($_FILES['file']['name']);
		if($this->checkUpload($username) === TRUE && (move_uploaded_file($_FILES['file']['tmp_name'], $target))) {
			$queryStr = "UPDATE user
					SET img= '".$target."'
					 WHERE username ='".$username."'";
			header("Refresh:0");
			echo($target);
			if ($this->mysqli->query($queryStr) !== TRUE) {
			echo("Something is wrong with the query");
		}
		} else {
			echo "Sorry, there was a problem uploading your file.";
		}
	}
	
	public function searchChains($search_Term) {
		$queryStr = "SELECT *
					FROM `user_chain`;";
		$chains = array();
        $count = 0;
        $result = $this->mysqli->query($queryStr);
        if ($result === FALSE) {
            return FALSE;
        }
        while ($row = $result->fetch_assoc()) {
				if(stripos($row['title'], $search_Term) !== FALSE)
				$chains[] = $row;
                $count++;
        }
        if ($count === 0) {
            return FALSE;
        }
        $result->close();
        return $chains;
    }
}