<?php

class User {

    private $id = 1; // hard coded for now
    private $username;
    private $password;
    private $fname;
    private $lname;
    private $school;
    private $dob;
    private $displayImage;
    private $reputation;
    private $activeChain;

    public function setActiveChain($activeChain) {
        $this->activeChain = $activeChain;
    }

    public function getActiveChain($activeChain) {

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

    public function getFname()
    {
        return $this->fname;
    }

    public function getId() {
        return $this->id;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setReputation($reputation) {
        $this->reputation = $reputation;
    }

    public function getReputation()
    {
        return $this->reputation;
    }

    public function setSchool($school)
    {
        $this->school = $school;
    }

    public function getSchool()
    {
        return $this->school;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    function __construct() {

    }
}