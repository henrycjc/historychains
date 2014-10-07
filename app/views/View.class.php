<?php

class View {

    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    public function showTroveResults($results) {
        // TODO: Print them out as list elements
        foreach($results as $book) {
            if (isset($book['contributor'][0])) {
                printf("<p>%s<br>%s<br> %s<br>%s<br></p>", $book['title'], $book['contributor'][0], $book['issued'], $book['relevance']['value']);
                $this->printMessage("=====");
            }  
        }

    }

    public function showUsersChains($results) {
        
        if ($results === NULL) {
            printf("<p>No chiains exist :( - create one!</p>");
        } else {
            foreach($results as $chain) {
                printf($chain);
                printf('<option value="%s">%s</option>', $chain['id'], $chain['title']);
            }
        }
    }
    public function printMessage($message) {
        printf("<p>%s</p>", $message);
    }
    public function showCreateChainSuccess() {
        printf("<p>Created Chain!</p>");
    }

    public function showCreateChainFailure($result) {
        printf("<p>Could not create chain.</p>");
        d($result);
    }
}