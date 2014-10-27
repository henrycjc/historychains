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
            echo $chain;
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

    public function handleSearch($q, $user) {
        $bookResults = $this->model->getTroveResults($q, 'book');
        //$articleResults = $this->model->getTroveResults($q, 'article');
        return $this->view->showTroveResults($bookResults, $user);
    }
	
	public function handleChainSearch($search_Term) {
		$result = $this->model->searchChains($search_Term);
		return $this->view->showChainResults($result);
	}

    public function getChainsByUserId($user) {
        $chains = $this->model->getChainsById($user);
        if ($chains === NULL) {
            echo "No chains yet - create one!";
        } else {
            $this->view->showUsersChains($chains);
        }
    }



    public function getInitialChain($chain) {
        $this->view->showChain($this->model->getChainSources($chain));
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