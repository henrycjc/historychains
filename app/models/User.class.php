<?php

require_once("Model.class.php");
class User extends Model {

    private $id = 1; // hard coded for now
    private $username;
    private $password;
    private $fname;
    private $lname;
    private $school;
    private $dob;
    private $displayImage;
    private $reputation;
    private $activeChain = "world war 2";

    public function setActiveChain($activeChain) {
        $this->activeChain = $activeChain;
    }

    public function getActiveChain() {
        return $this->activeChain;
    }

    public function setDisplayImage($displayImage) {
        $this->displayImage = $displayImage;
    }

    public function getDisplayImage() {
        return $this->displayImage;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setFname($fname) {
        $this->fname = $fname;
    }

    public function getFname() {
        return ucfirst($this->fname);
    }

    public function getId() {
        return $this->id;
    }

    public function setLname($lname) {
        $this->lname = $lname;
    }

    public function getLname() {
        return ucfirst($this->lname);
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setReputation($reputation) {
        $this->reputation = $reputation;
    }

    public function getReputation() {
        return $this->reputation;
    }

    public function setSchool($school) {
        $this->school = $school;
    }

    public function getSchool() {
        return $this->school;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }
	

    function __construct($username) {

        /*
            // get all the users info from the database

        */
		// Creating a User Logged In Cookie
		setcookie("user_logged_in", "true", time() + (86400 * 30), "/");  // extends cookies life by a month
		// Creating Which User Logged In Cookie
		setcookie("user", $username, time() + (86400 * 30), "/");  // extends cookies life by a month

        //$data = parent::getUserInfo($username);
        /*
		$this->fname = $data['fname'];
		$this->lname = $data['lname'];
		$this->dob = $data['dob'];
		$this->username = $data['username'];
		$this->password = $data['password']; */
	}
}