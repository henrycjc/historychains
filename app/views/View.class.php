<?php

class View {

    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    public function showTroveResults($results, $user) {
        $colour = 0;
        $count = 0;
        echo '<tr>
            <th class="result_cell">Title</th>
            <th class="result_cell">Year</th>
            <th class="result_cell">Author</th>
            <th class="result_cell"> </th>
            <th class="result_cell"> </th>
             </tr>';
        foreach($results as $book) {

            if (isset($book['contributor']) && isset($book['issued'])) {
                 if ($colour) {
                    echo '<tr id="result'.$count.'" class="results_dark">';
                    $colour = 0;
                } else {
                    echo '<tr id="result'.$count.'"class="results_light">';
                    $colour = 1;
                }
                echo '<td class="result_cell">'.$book["title"].'</td>';
                echo '<td class="result_cell">'.$book['issued'].'</td>';
                echo '<td class="result_cell">'.$book["contributor"][0].'</td>';
                echo '<td class="result_cell">
                    <form action="'.stripslashes($book["troveUrl"]).'" target="_blank">
                        <button id="ViewSource'.$book['id'].'" class="TableButton">View</button>
                    </form>
                </td>';
                echo '<td class="result_cell">
                    <form id="AddToChainForm'.$count.'" class="AddToChain">
                        <input type="hidden" class="TableButton" id="SourceId'.$count.'" value="'.$book['id'].'">
                        ';
                if ($this->model->getActiveChain($user))
                echo ' <button type="button" id="add_comment'.$count.'" class="TableButton">Add</button>';

                echo '
                    </form>
                </td>';
                // <button id="AddToChainBtn'.$book['id'].'" class="TableButton">Add to Chain</button>
                echo '</tr>';
            }
            $count++;
        }
    }



    public function showChain($sources) {

        if ($sources == NULL) {
           $this->printMessage("No sources to display yet!");
            return;
        }
        echo '<section id="cd-timeline" class="cd-container">';
        foreach($sources as $source) {
            echo '<div class="cd-timeline-block">';
                echo '<div class="cd-timeline-img cd-picture">';
                    echo '<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Picture">';
                echo '</div>';
                echo '<div class="cd-timeline-content">';
                    echo '<h2>'.$source['comment'].'</h2>';
                    echo '<p>'."what goes here...".'</p>';
                    echo '<a href="#0" class="cd-read-more">Read more</a>';
                    echo '<span class="cd-date">'.date('M j Y g:i A', strtotime($source['timestamp'])).'</span>';
                echo '</div>';
            echo '</div>';
        // source_id, comment, timestamp, type, troveid
        }
        echo '</section>';
    }

    public function addSourceToChainView($source) {
        echo '<div class="cd-timeline-block">';
            echo '<div class="cd-timeline-img cd-picture">';
                echo '<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Picture">';
            echo '</div>';
            echo '<div class="cd-timeline-content">';
            echo '<h2>'.$source['comment'].'</h2>';
            echo '<p>'."HOLY SHIT THIS IS NEW".'</p>';
            echo '<a href="#0" class="cd-read-more">Read more</a>';
            echo '<span class="cd-date">'.date('M j Y g:i A', strtotime($source['timestamp'])).'</span>';
            echo '</div>';
        echo '</div>';
    }
    public function showUsersChains($results) {
        
        if ($results === NULL) {
            $this->printMessage("No chains exist. Create one!");
        } else {
            foreach($results as $chain) {
                printf('<option id="%s" value="%s">%s</option>', $chain['title'], $chain['title'], $chain['title']);
            }
        }
    }
    public function printMessage($message) {
        printf("<p>%s</p>", $message);
    }
    public function showCreateChainSuccess() {
        printf("<p>Created Chain!</p>");
    }

    public function confirmCreateChain($title) {

    }

    public function showCreateChainFailure($result) {
        printf("<p>Could not create chain.</p>");
        d($result);
    }
}