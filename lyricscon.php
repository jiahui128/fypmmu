<?php 
	$con = mysqli_connect('localhost', 'root', '');
	
	if($con)
		{
			echo "";
			
			mysqli_query($con, "CREATE DATABASE SONGFORM");
			mysqli_select_db($con, "SONGFORM");
								
			mysqli_query($con, "CREATE TABLE lyricstable (lyrics_id int auto_increment primary key,
								lyrics_no int,
								lyrics_status varchar(300),
								lyrics_song varchar(300),
								lyrics_artist varchar(300),
								lyrics_files varchar(50000),
								lyrics_situation int(10) NOT NULL,
								created_at DATETIME DEFAULT CURRENT_TIMESTAMP);");
		
		}
 
?>