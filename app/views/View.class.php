<?php

class View {

    const BLANK_ENTRY = "Please enter a valid search term!\n";
    const NO_ENTRY_YET = "Start searching so we can show you some results!\n";

    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    public function showTroveResults($results) {
        // TODO: Print them out as list elements
        foreach($results as $book) {
            printf("<p>%s<br>%s<br> %s<br>%s<br></p>", $book['title'], $book['contributor'][0], $book['issued'], $book['relevance']['value']);
            printf("<p>~~~</p>\n");
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

}