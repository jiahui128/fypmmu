<?php 
	$con = mysqli_connect('localhost', 'root', '');
	
	if($con)
		{
			echo "";
			
			mysqli_query($con, "CREATE DATABASE USERFORM");
			mysqli_select_db($con, "USERFORM");
		
			mysqli_query($con, "CREATE TABLE usertable (id int auto_increment primary key,
								name varchar(100),
								email varchar(100),
								password varchar(255),
								code mediumint(50),
								status text,
								created_at DATETIME DEFAULT CURRENT_TIMESTAMP);");
		}
 
?>