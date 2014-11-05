<?php

class View {

    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    public function showTroveResults($results, $user) {
        $colour = 0;
        $count = 0;
        if (!$this->model->getActiveChain($user)) {
            echo '<p>Oops, don\'t forget to create a chain first!</p>';
        } else {

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
                        <button type="button" id="add_comment'.$count.'" class="TableButton">Add</button>
                        </form>
                    </td>';
                    // <button id="AddToChainBtn'.$book['id'].'" class="TableButton">Add to Chain</button>
                    echo '</tr>';
                }
                $count++;
            }
        }
    }

	public function showChainResults($results) {
        $count = 1;
        foreach($results as $chain) {
                echo '<div class = "Search_Top_Result">';
                echo '<div class="Search_result_number"><p>'.$count.'</p></div>';
                echo '<div class="Search_Top_info"><h3 class="Search_title">'.$chain['title'].'</h3>';
					echo '<p class="Search_author">'.$chain['topic'].'</p>';
					echo '<p class="Search_date">'.date('M j Y g:i A', strtotime($chain['time_stamp'])).'</p></div>';
                echo '<form class="asdf" action="viewchain.php" method="GET">';
                echo '<input name="title" type="hidden" id="title" value="'.$chain['title'].'"/>';
                echo '<button type="submit" class="View_Chain2">View Chain</button>';
                echo '</form>';
                echo '</div>';
				$count++;
            }
    }

    public function showProfileChainResults($results) {
        $count = 1;
        foreach($results as $chain) {
            echo '<div class = "Search_Top_Result">';
            echo '<div class="Search_result_number"><p>'.$count.'</p></div>';
            echo '<div class="Search_Top_info"><h3 class="Search_title">'.$chain['title'].'</h3>';
            echo '<p class="Search_author" style="overflow: auto;">'.$chain['comment'].'</p>';
            echo '<p class="Search_date">'.date('M j Y g:i A', strtotime($chain['timestamp'])).'</p></div>';
            echo '<form class="asdf" action="viewchain.php" method="GET">';
            echo '<input name="title" type="hidden" id="title" value="'.$chain['title'].'"/>';
            echo '<button type="submit" class="View_Chain2">View Chain</button>';
            echo '</form>';
            echo '</div>';
            $count++;
        }
    }

    public function showTopChains($chains) {

        $count = 1;
        $previous = "";
        foreach($chains as $chain) {
            if ($chain === $previous) {
                $previous = $chain;
            } else {
                echo '<div class = "Top_Result">';
                echo '<div class="result_number">';
                echo '<p>'.$count.'</p>';
                echo '</div>';
                echo '<div class="reputation">';
                echo '<p>'.rand(1,50).'</p>';
                echo '</div>';
                echo '<div class="Top_info">';
                echo '<h3 class="title">'.$chain['title'].'</h3>';
                echo '<p class="author">'.$this->model->getUsername($chain['user']).'</p>';
                echo '<p class="date">'.date('M j Y g:i A', strtotime($chain['timestamp'])). '</p>';
                echo '</div>';
                echo '<form class="asdf" action="viewchain.php" method="GET">';
                echo '<input name="title" type="hidden" id="title" value="'.$chain['title'].'"/>';
                echo '<button type="submit" class="View_Chain">View Chain</button>';
                echo '</form>';
                echo '</div>';
                $count++;
                $previous = $chain;
            }

        }

    }

    public function showViewChain($sources) {

        if ($sources == NULL) {
            $this->printMessage("This chain has no sources.");
            return;
        }
        foreach(array_reverse($sources) as $source) {
            echo '<div class="cd-timeline-block">';
                echo '<div class="cd-timeline-img cd-picture">';
                    echo '<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Picture">';
                echo '</div>';
                echo '<div class="cd-timeline-content">';
                echo '<h2>'.$this->model->getTroveArticleTitle($source['troveid'])[0]['title'].'</h2>';
                    echo '<p>'.$source['comment'].'</p>';
                    echo '<a target="_blank" href="http://trove.nla.gov.au/work/'.$source['troveid'].'" class="cd-read-more">View</a>';
                    echo '<span class="cd-date">'.date('M j Y g:i A', strtotime($source['timestamp'])).'</span>';
                echo '</div>';
            echo '</div>';
        }
    }
    public function showChain($sources) {

        if ($sources == NULL) {
            $this->printMessage("No sources to display yet!");
            return;
        }
        echo "<script>function noedit() { alert('Not implemented yet.'); }</script>";
        echo "<script>function nodel() { alert('Not implemented yet.'); }</script>";
        echo '<section id="cd-timeline" class="cd-container">';
        foreach(array_reverse($sources) as $source) {
            echo '<div class="cd-timeline-block">';
                echo '<div class="cd-timeline-img cd-picture">';
                    echo '<img src="resources/plugins/vertical-timeline/img/cd-icon-movie.svg" alt="Picture">';
                echo '</div>';
                echo '<div class="cd-timeline-content">';
                    echo '<h2>'.$this->model->getTroveArticleTitle($source['troveid'])[0]['title'].'</h2>';
                    echo '<p>'.$source['comment'].'</p>';
                    echo '<a target="_blank" href="http://trove.nla.gov.au/work/'.$source['troveid'].'" class="cd-read-more">View</a>';
            echo '<a id="noedit" href="#" onclick="noedit(); return false;" class="cd-read-more">Edit</a> ';
            echo '<a id="nodel" href="#" onclick="nodel(); return false;" class="cd-read-more">Del</a>';
                    echo '<span class="cd-date">'.date('M j Y g:i A', strtotime($source['timestamp'])).'</span>';
                echo '</div>';
            echo '</div>';
        // source_id, comment, timestamp, type, troveid
        }
        echo '</section>';
    }

    public function showUsersChains($results) {

        if ($results === NULL) {
            $this->printMessage("No chains exist. Create one!");
        } else {
            echo '<select id="editChainsList" name="editChainsList">';
            foreach($results as $chain) {
                printf('<option id="%s" value="%s">%s</option>', $chain['title'], $chain['title'], $chain['title']);
            }
            echo '</select>';
            echo '<button id="editChainsEdtBtn" name="editChainsEdtBtn" value="Edit" type="submit">Edit</button>
				<button id="editChainsDelBtn" name="editChainsDelBtn" value="Delete" type="submit" onclick="return confirm(\'Are you sure you want to delete this chain?\');">Delete</button>';
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
    }




}
