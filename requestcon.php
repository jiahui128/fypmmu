<?php 
	$con = mysqli_connect('localhost', 'root', '');
	
	if($con)
		{
			echo "";
			
			mysqli_query($con, "CREATE DATABASE SONGFORM");
			mysqli_select_db($con, "SONGFORM");
								
			mysqli_query($con, "CREATE TABLE songtable (song_id int auto_increment primary key,
								song_name varchar(100),
								song_album varchar(100),
								song_artist varchar(100),
								song_status text,
								song_situation int(10) NOT NULL,
								email varchar(100),
								created_at DATETIME DEFAULT CURRENT_TIMESTAMP);");
		}
 
?>