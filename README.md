##About
History Chains is an academic research based social network of sorts, developed by three undergraduate students at The University of Queensland. It is targeted towards younger students, 14 to 18 years old studying Modern Australian History and other related subjects. History Chains makes extensive use of the Trove API, an intiative by the National Library of Australia to catalogue Australia's history digitally. 

The user can search through Trove's extensive library of articles, books and a number of other electronic mediums and add them to their "Chain" a collection of sources for their topic. 

This was an assignment for DECO1800 but we chose to use a VCS instead of editing a live site. 

##Authors

Henry Chladil - PHP, SQL, JavaScript/jQuery

Angus Payne - HTML, CSS, PHP

Elliot Randall - HTML, CSS, SQL

##Installation

History Chains requires a L*MP stack (we used nginx). 

It is fairly lightweight and should work with versions of PHP 5+. 


Import a copy of the databse from `historychains/app/sql/history_chains.sql` 


##What we didn't get finished

Unfortunately as it was a university assignment we were constrained by time and specification. The social network is mostly unfinished but the core functionality of creating a chain works. 

* Database error checking (currently if we can't connect to the database, game over)
* User system (hack job, needs proper OOP refactor)
* Upload user images (currently chmod 777 is the only thing keeping it from working l0l)
* Many more...
