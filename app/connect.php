<?php
	$server = 'localhost';
	$username = 'root';
	$pass = '';
	$db = 'persons';


	$conn = mysqli_connect($server, $username, $pass, $db);

	if(!$conn){
		die("<h3>Connection Failed!</h3>" .$conn->connect_error);
	}