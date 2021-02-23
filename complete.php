<?php
session_start();


$connection = mysqli_connect("localhost","root","","songform");

if(isset($_POST['registerbtn']))
{ 		
	$name = $_POST['name'];
    $album = $_POST['album'];
    $artist = $_POST['artist'];
	$file = $_POST['file'];
	$lyricsname = $name;
	$lyricsfile = $_POST['lyricsfile'];
		
	if($lyricsfile=="")
		$lyricsstatus="Pending";
	else 
		$lyricsstatus="Completed";

    $q = "SELECT lyrics_no FROM lyricstable ORDER BY lyrics_no";
    $q_run = mysqli_query($connection, $q);

    $row = mysqli_num_rows($q_run);
	
	$lyricsno = $row+1;
	
    $q2 = "SELECT rsong_no FROM recordedsong ORDER BY rsong_no";
    $q_run2 = mysqli_query($connection, $q2);

    $row = mysqli_num_rows($q_run2);
	
	$no = $row+1;
	
	$sql_r = "SELECT * FROM recordedsong WHERE rsong_name='$name'";
	$sql_m = "SELECT * FROM recordedsong WHERE rsong_files='$file'";
	$sql_n = "SELECT * FROM lyricstable WHERE lyrics_files='$lyricsfile'";
	$sql_k = "SELECT * FROM recordedsong WHERE rsong_name='$name' AND rsong_artist='$artist'";
	$res_r = mysqli_query($connection, $sql_r);
	$res_m = mysqli_query($connection, $sql_m);
	$res_n = mysqli_query($connection, $sql_n);
	$res_k = mysqli_query($connection, $sql_k);
        
	if (mysqli_num_rows($res_r) > 0) 
	{
		if(mysqli_num_rows($res_k) > 0)
		{
			$_SESSION['status'] = "This Song Name and Artist Name is Already Exists!";
			
			header('Location: pendingsongs.php');
		}	
		else
		{
			mysqli_query($connection, "INSERT INTO recordedsong (rsong_no, rsong_name,rsong_album,rsong_artist, rsong_files) VALUES ('$no', '$name','$album','$artist', '$file')");
			
			mysqli_query($connection, "INSERT INTO lyricstable (lyrics_no, lyrics_song, lyrics_artist, lyrics_status, lyrics_files) VALUES ('$lyricsno', '$lyricsname', '$artist', '$lyricsstatus', '$lyricsfile')");			
			
			$_SESSION['success'] = "Completed Song and Lyrics Data Added";
		
			header('Location: pendingsongs.php');
		}
	}
	else if (mysqli_num_rows($res_m) > 0) 
	{
		if(mysqli_num_rows($res_k) > 0)
		{
			$_SESSION['status'] = "This Song Name and Artist Name is Already Exists!";
			
			header('Location: pendingsongs.php');
		}	
		else if(mysqli_num_rows($res_n) > 0)
		{
			$_SESSION['status'] = "This Song File and Lyrics File is Already Exists!";
			
			header('Location: pendingsongs.php');
		}
		else
		{
				$_SESSION['status'] = "This Song File is Already Exists!";
		
				header('Location: pendingsongs.php');
			
		}
	}
	else if (mysqli_num_rows($res_n) > 0) 
	{
		$_SESSION['status'] = "This Lyrics File is Already Exists!";
			
		header('Location: pendingsongs.php');
	}
	else
	{
		mysqli_query($connection, "INSERT INTO recordedsong (rsong_no, rsong_name,rsong_album,rsong_artist, rsong_files) VALUES ('$no', '$name','$album','$artist', '$file')");
	
		mysqli_query($connection, "INSERT INTO lyricstable (lyrics_no, lyrics_song, lyrics_artist, lyrics_status, lyrics_files) VALUES ('$lyricsno', '$lyricsname', '$artist', '$lyricsstatus', '$lyricsfile')");
		
		$_SESSION['success'] = "Completed Song and Lyrics Data Added";
	
		header('Location: pendingsongs.php');
	}                 
}

if(isset($_POST['addbtn']))
{ 
    $name = $_POST['name'];
    $album = $_POST['album'];
    $artist = $_POST['artist'];
	$file = $_POST['file'];
	$lyricsname = $_POST['lyricsname'];
	$lyricsfile = $_POST['lyricsfile'];
		
	if($lyricsfile=="")
		$lyricsstatus="Pending";
	else 
		$lyricsstatus="Completed";

    $q = "SELECT lyrics_no FROM lyricstable ORDER BY lyrics_no";
    $q_run = mysqli_query($connection, $q);

    $row = mysqli_num_rows($q_run);
	
	$lyricsno = $row+1;
	
    $q2 = "SELECT rsong_no FROM recordedsong ORDER BY rsong_no";
    $q_run2 = mysqli_query($connection, $q2);

    $row = mysqli_num_rows($q_run2);
	
	$no = $row+1;
	
	$sql_r = "SELECT * FROM recordedsong WHERE rsong_name='$name'";
	$sql_m = "SELECT * FROM recordedsong WHERE rsong_files='$file'";
	$sql_n = "SELECT * FROM lyricstable WHERE lyrics_files='$lyricsfile'";
	$sql_k = "SELECT * FROM recordedsong WHERE rsong_name='$name' AND rsong_artist='$artist'";
	$res_r = mysqli_query($connection, $sql_r);
	$res_m = mysqli_query($connection, $sql_m);
	$res_n = mysqli_query($connection, $sql_n);
	$res_k = mysqli_query($connection, $sql_k);

	if (mysqli_num_rows($res_r) > 0) 
	{
		if(mysqli_num_rows($res_k) > 0)
		{
			$_SESSION['status'] = "This Song Name and Artist Name is Already Exists!";
			
			header('Location: pendingsongs.php');
		}	
		else
		{
			mysqli_query($connection, "INSERT INTO recordedsong (rsong_no, rsong_name,rsong_album,rsong_artist, rsong_files) VALUES ('$no', '$name','$album','$artist', '$file')");
			
			mysqli_query($connection, "INSERT INTO lyricstable (lyrics_no, lyrics_song, lyrics_artist, lyrics_status, lyrics_files) VALUES ('$lyricsno', '$lyricsname', '$artist', '$lyricsstatus', '$lyricsfile')");
			
			mysqli_query($connection, "UPDATE songtable SET song_status='$lyricsstatus' WHERE song_name='$name' AND song_artist='$artist'");
			
			$_SESSION['success'] = "Completed Song and Lyrics Data Added";
		
			header('Location: pendingsongs.php');
		}
	}
	else if (mysqli_num_rows($res_m) > 0) 
	{
		if(mysqli_num_rows($res_k) > 0)
		{
			$_SESSION['status'] = "This Song Name and Artist Name is Already Exists!";
			
			header('Location: pendingsongs.php');
		}	
		else if(mysqli_num_rows($res_n) > 0)
		{
			$_SESSION['status'] = "This Song File and Lyrics File is Already Exists!";
			
			header('Location: pendingsongs.php');
		}
		else
		{
				$_SESSION['status'] = "This Song File is Already Exists!";
		
				header('Location: pendingsongs.php');
			
		}
	}
	else if (mysqli_num_rows($res_n) > 0) 
	{
		$_SESSION['status'] = "This Lyrics File is Already Exists!";
			
		header('Location: pendingsongs.php');
	}
	else
	{
		mysqli_query($connection, "INSERT INTO recordedsong (rsong_no, rsong_name,rsong_album,rsong_artist, rsong_files) VALUES ('$no', '$name','$album','$artist', '$file')");
	
		mysqli_query($connection, "INSERT INTO lyricstable (lyrics_no, lyrics_song, lyrics_artist, lyrics_status, lyrics_files) VALUES ('$lyricsno', '$lyricsname', '$artist', '$lyricsstatus', '$lyricsfile')");
		
		mysqli_query($connection, "UPDATE songtable SET song_status='$lyricsstatus' WHERE song_name='$name' AND song_artist='$artist'");

		$_SESSION['success'] = "Completed Song and Lyrics Data Added";
	
		header('Location: pendingsongs.php');
	}
          
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
	$no = $_POST['edit_no'];
    $name = $_POST['edit_name'];
    $album = $_POST['edit_album'];
    $artist = $_POST['edit_artist'];
	$file = $_POST['edit_file'];

    $query = "UPDATE recordedsong SET rsong_name='$name', rsong_no = '$no', rsong_album='$album', rsong_artist='$artist', rsong_files='$file' WHERE rsong_id='$id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: completesong.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: completesong.php');
    }
}

//Remove Lyrics
if(isset($_POST['remove_btn']))
{
    $id = $_POST['remove_id'];
	$situation = 1;
	$query = "UPDATE recordedsong SET status='$situation' WHERE rsong_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: removed_song.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: removed_song.php');
    }
}

//Restore
//Remove Lyrics
if(isset($_POST['restore_btn']))
{
    $id = $_POST['restore_id'];
	$situation = 0;
	$query = "UPDATE recordedsong SET status='$situation' WHERE rsong_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: completesong.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: completesong.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM recordedsong WHERE rsong_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: completesong.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: completesong.php');
    }
}

?>