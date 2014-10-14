<?php

class Controller {

    private $model;
    private $view;

    function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function getActiveChain($user) {
        /* REMEMBER TO DO THIS PROPERLY NEXT TIME */
        printf("Chain Name");
    }

    public function handleSearch($q) {
        $bookResults = $this->model->getTroveResults($q, 'book');
        //$articleResults = $this->model->getTroveResults($q, 'article');
        $this->view->showTroveResults($bookResults);
    }

    public function handleChainSearch($q) {
        $chainResults = $this->model->getChainsByTitle($q);
        if ($chainResults !== FALSE) {
            $this->view->showChainResults($chainResults);
        } else {
            printf("No chains lmao");
        }
        
    }

    public function handleEditChains($user) {
        $chains = $this->model->getChainsById($user);
        if ($chains === NULL) {
            return NULL;
        } else {
            $this->view->showUsersChains($chains);
        }
    }

    public function handleCreateChain($user, $title, $topic) {

        if ($title === "" || $topic === "") {
            return FALSE;
        }
        $result = $this->model->createNewChain($user, $title, $topic);
        
        if ($result === TRUE) {
            printf("Created Chain: %s!", $title);
        } else {
            //d($result);
            $this->view->showCreateChainFailure($result);

        }
        return TRUE;
    }

    public function handleDeleteChain($chain) {
        $result = $this->model->deleteChain($chain);
        if ($result === TRUE) {
            $this->view->printMessage("Chain successfully deleted.");
        } else {
            $this->view->printMessage($result);
        }
    }
}