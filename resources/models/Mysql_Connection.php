<?php

	define("DB_HOST", "127.0.0.1");
	define("DB_NAME", "historychains");
	define("DB_USER", "root");
	define("DB_PWD", "???");

	$dbConn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if (mysqli_connect_error()) {
		printf("MySQL Connection Failed: %s\n", mysqli_connect_error());
	}
