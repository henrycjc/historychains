<?php
	//connect to database
	$mysqli = new mysqli('localhost', 'elliothc', 'elliothc', 'history_chains');

	$action=$_POST["action"];

	//depending on the action value, run a different function
	switch ($action) {
	    case 0:
	    	insertData($mysqli); //sign up - insert data 
	        break;
		case 3:
			login($mysqli);//checks to see if login matches
			break;
	}

	function insertData($mysqli) {
		//insert data
       	$person_firstname=$_POST["personFName"];
		$person_lastname=$_POST["personLName"];
		$person_dob=$_POST["personDOB"]; 
		$person_username=$_POST["personUserName"]; 
		$person_password=$_POST["personPassword"]; 
		$person_institution=$_POST["personInstitution"]; 
		

		//if one of the names is missing, do nothing
		if (($person_firstname == null) || ($person_lastname == null)) {
			return;
		}

		$query = "INSERT INTO user(fname, lname) VALUES ('" . $person_firstname . "', '" . $person_lastname . "')";
		$result = $mysqli->query($query);
	}


	function login($mysqli) {
		//check user login
		$username=$_POST["firstName"];
		$password=$_POST["lastName"];

		if (($username == null) || ($password == null)) {
			echo false;
		}

	    $query = "SELECT * FROM test_table WHERE first_name='$username' AND last_name='$password'";
		$result = $mysqli->query($query);

		//check if user details are in the database
		if (list($first_name, $last_name) = $result->fetch_row()) {
		    echo true;
		} else {
			echo false;
		}
	}

	$mysqli->close();
?>