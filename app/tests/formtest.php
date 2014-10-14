<form action="formtest.php" method="POST">
	<h2>Login</h2>
	<input type="text" id="uname" name="uname" placeholder="Username"/>
	<input type="text" id="pword" name="pword" placeholder="Password"/>
	<input type="submit" id="submit" value="Submit" />
</form>

<?php

	require_once("../models/Mysql_Connection.class.php");
	require_once("../models/Model.class.php");
	require_once("../controllers/Controller.class.php");
	require_once("../views/View.class.php");
	require_once("../models/User.class.php");
	$mysqli = new Mysql_Connection();
	$model = new Model($mysqli->getConn());
	$view = new View($model);
	$controller = new Controller($model, $view);
	$user = new User();
	
	if (isset($_POST['uname']) && isset($_POST['pword'])) {
		if ($model->checkIfUserExists($_POST['uname'])) {
			if ($model->checkIfValidPassword($_POST['uname'], $_POST['pword'])) {
				if ($user->loginUser($_POST['uname'], $_POST['pword']) !== FALSE) {
					// login success
				} else {
					// login failure
				}
			}
		}

	}
?>