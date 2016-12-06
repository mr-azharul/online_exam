<?php

	$host 	= "localhost";
	$user 	= "root";
	$pass 	= "";
	$db 	= "exam";


		// Create Connection
	$conn = new mysqli($host, $user, $pass, $db);

		// Cheack Connection
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}

?>