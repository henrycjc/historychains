<?php

require_once("Model.class.php");
class User  {

    private $model;

    private $id;
    private $username;
    private $fname;
    private $lname;
    private $school;
    private $dob;
    private $pic;
    private $reputation;
    private $activeChain;

    public function setActiveChain($activeChain) {
        $this->activeChain = $activeChain;
    }
    public function getActiveChain() {
        return $this->activeChain;
    }

    public function getPic() {
        return $this->pic;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getFname() {
        return ucfirst($this->fname);
    }

    public function getLname() {
        return ucfirst($this->lname);
    }

    public function getReputation() {
        return $this->reputation;
    }

    public function getSchool() {
        return $this->school;
    }

    public function getUsername() {
        return $this->username;
    }


    public function getId() {
        return $this->id;
    }
    private function setId($username) {
        return $this->model->getUserId($username);
    }
    function __construct($model, $userData) {

        $this->model = $model;
        $this->id = $this->setId($userData['userName']);
        $this->username = $userData['userName'];
		$this->fname = $userData['userFName'];
		$this->lname = $userData['userLName'];
        $this->dob = $userData['userFName'];
        $this->school = $userData['userInstitution'];
        $this->rep = $userData['userRep'];
        $this->pic = $userData['userProfilePic'];
	}
}
