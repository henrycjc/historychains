<?php

class Controller {

    private $model;
    private $view;

    function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function handleSearch($q, $sort) {
        $bookResults = $this->model->getTroveResults($q, 'book');
        //$articleResults = $this->model->getTroveResults($q, 'article');
        $this->view->showTroveResults($bookResults);
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
            d($result);
            $this->view->showCreateChainFailure($result);
        }
        return TRUE;
    }
}