<?php
	/* Database credentials. Assuming you are running MySQL server with default setting (user 'root' with no password) */
	
	$con=mysqli_connect("localhost", "root", "");
		
		if($con)
		{
			echo "";
			
			mysqli_query($con, "CREATE DATABASE SOFO");
			mysqli_select_db($con, "SOFO");
		
			mysqli_query($con, "CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
								username VARCHAR(50) NOT NULL UNIQUE,
								password VARCHAR(100) NOT NULL,
								created_at DATETIME DEFAULT CURRENT_TIMESTAMP);");
		}
	
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'SOFO');
 
	/* This link is to attempt to connect to MySQL database */
	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
?>