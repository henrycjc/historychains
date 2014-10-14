<?php

class View {

    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    public function showTroveResults($results) {
        // TODO: Print them out as list elements
        //d($results);
        $colour = 0;
        foreach($results as $book) {

            if (isset($book['contributor'][0])) {
                if ($colour) {
                    echo '<tr id="result1" class="results_dark">';
                    $colour = 0;
                } else {
                    echo '<tr id="result1" class="results_light">';
                    $colour = 1;
                }
                echo '<td class="result_cell">'.$book["title"].'</td>';
                echo '<td class="result_cell">'.$book['issued'].'</td>';
                echo '<td class="result_cell">'.$book["contributor"][0].'</td>';
                echo '<td class="result_cell"><form action="'.stripslashes($book["troveUrl"]).'" target="_blank"><button id="addtochain1" class="TableButton">View</button></form></td>';
                echo '<td class="result_cell"><form action="createchain.php"><button id="ViewSource1" class="TableButton">Add to Chain</button></form></td>';
                echo '</tr>';
            }
        }

    }

    public function showUsersChains($results) {
        
        if ($results === NULL) {
            printf("<p>No chiains exist :( - create one!</p>");
        } else {
            foreach($results as $chain) {
                //printf($chain);
                printf('<option value="%s">%s</option>', $chain['title'], $chain['title']);
            }
        }
    }
    public function printMessage($message) {
        printf("<p>%s</p>", $message);
    }

    public function showCreateChainFailure($result) {

        if (strpos($result,'Duplicate entry') !== false) {
            $this->printMessage("Error: could not create chain, '".$_POST['title']."' already exists");
        } else {
            $this->printMessage("Could not create chain!");
            d($result);
        }

    }
}