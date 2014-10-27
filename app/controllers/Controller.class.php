<?php

class Controller {

    private $model;
    private $view;

    function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function handleShowTopChains() {

    }

    public function getActiveChain($user) {

        $chain = $this->model->getActiveChain($user);
        if (!$chain) {
            $this->view->printMessage("No chain selected!");
        } else {
            $this->view->printMessage($chain);
        }
    }

    public function handleCreateChain($user, $title, $topic) {

        $result = $this->model->createNewChain($user, $title, $topic);

        if ($result === TRUE) {
            $this->view->printMessage("Successfully created chain: " . $title);
        } else {
            $this->view->printMessage($result);
        }
        return TRUE;
    }


    public function handleDeleteChain($chain) {
        $result = $this->model->deleteChain($chain);
        if ($result !== TRUE) {
            $this->view->printMessage($result);
        } else {
            $this->view->printMessage("Chain ".$chain." successfully deleted.");
        }
    }

    public function handleSearch($q) {
        $bookResults = $this->model->getTroveResults($q, 'book');
        //$articleResults = $this->model->getTroveResults($q, 'article');
        return $this->view->showTroveResults($bookResults);
    }

    public function getChainsByUserId($user) {
        $chains = $this->model->getChainsById($user);
        if ($chains === NULL) {
            return NULL;
        } else {
            $this->view->showUsersChains($chains);
        }
    }



    public function updateCurrentChain($user, $chainObj) {
        $sources = $this->model->getChainSources($user->getActiveChain());
        $this->view->showChain($sources);
    }

    public function handleLogin($post) {

        $userData = array();
        $userData['username'] = $post['Username'];
        $userData['fname'] = $post['FName'];
        $userData['lname'] = $post['LName'];
        $userData['dob'] = $post['DOB'];
        $userData['password'] = $post['Password'];
        if ($response = $this->model->addUserToDB($userData)) {
            $this->view->printMessage("Successfully signed up you better fucking properly implement me.");
        } else {
            $this->view->printMessage($response);
        }

    }

}