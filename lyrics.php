<?php
session_start();


$connection = mysqli_connect("localhost","root","","songform");

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $status = "Pending";
	$file = $_POST['edit_file'];
	
	$sql_n = "SELECT * FROM lyricstable WHERE lyrics_files='$lyricsfile'";
	$res_n = mysqli_query($connection, $sql_n);
	
	if (mysqli_num_rows($res_n) > 0) 
	{
		$_SESSION['status'] = "This Lyrics File is Already Exists!";
			
		header('Location: lyricstable.php');
	}
	else 
	{
		$query = "UPDATE lyricstable SET lyrics_files='$file' WHERE lyrics_id='$id' ";
		
		$query_run = mysqli_query($connection,$query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Your Data is Updated";
			//check if file no null
			$status2="Completed";
			$null=NULL;
			$sta="UPDATE lyricstable SET lyrics_status='$status2' WHERE lyrics_id='$id' AND lyrics_files!='$null'";
			$result=mysqli_query($connection,$sta);
			if($result)
				mysqli_query($connection,"UPDATE songtable SET song_status='$status2' WHERE lyrics_id='$id' AND lyrics_no = '$no'");
			header('Location: lyricstable.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data is NOT Updated";
			header('Location: lyricstable.php');
		}
	}
}

if(isset($_POST['updatebtn2']))
{
    $id = $_POST['edit_id'];
    $status = "Pending";
	$file = $_POST['edit_file'];
	
	$sql_n = "SELECT * FROM lyricstable WHERE lyrics_files='$lyricsfile'";
	$res_n = mysqli_query($connection, $sql_n);
	
	if (mysqli_num_rows($res_n) > 0) 
	{
		$_SESSION['status'] = "This Lyrics File is Already Exists!";
			
		header('Location: lyricstable2.php');
	}
	else 
	{
		$query = "UPDATE lyricstable SET lyrics_files='$file' WHERE lyrics_id='$id' ";
		
		$query_run = mysqli_query($connection,$query);
		
		if($query_run)
		{
			$_SESSION['success'] = "Your Data is Updated";
			//check if file no null
			$status2="Completed";
			$null=NULL;
			$sta="UPDATE lyricstable SET lyrics_status='$status2' WHERE lyrics_id='$id' AND lyrics_files!='$null'";
			$result=mysqli_query($connection,$sta);
			if($result)
				mysqli_query($connection,"UPDATE songtable SET song_status='$status2' WHERE lyrics_id='$id' AND lyrics_no = '$no'");
			header('Location: lyricstable2.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data is NOT Updated";
			header('Location: lyricstable2.php');
		}
	}
}

// Remove Lyrics
if(isset($_POST['remove_btn']))
{
    $id = $_POST['remove_id'];
	$situation = 1;
	$query = "UPDATE lyricstable SET lyrics_situation='$situation' WHERE lyrics_id='$id'";
    $query_run = mysqli_query($connection, $query);
	$query2 = "UPDATE recordedsong SET status='$situation' WHERE rsong_id='$id'";
    $query_run2 = mysqli_query($connection, $query2);

    if($query_run && $query_run2)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: removed_lyrics.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: removed_lyrics.php');
    }
}

// Remove Lyrics
if(isset($_POST['remove_btn2']))
{
    $id = $_POST['remove_id'];
	$situation = 1;
	$query = "UPDATE lyricstable SET lyrics_situation='$situation' WHERE lyrics_id='$id'";
    $query_run = mysqli_query($connection, $query);
	$query2 = "UPDATE recordedsong SET status='$situation' WHERE rsong_id='$id'";
    $query_run2 = mysqli_query($connection, $query2);

    if($query_run && $query_run2)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: removed_lyrics2.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: removed_lyrics2.php');
    }
}

//Restore
//Remove Lyrics
if(isset($_POST['restore_btn']))
{
    $id = $_POST['restore_id'];
	$situation = 0;
	$query = "UPDATE lyricstable SET lyrics_situation='$situation' WHERE lyrics_id='$id'";
    $query_run = mysqli_query($connection, $query);
	$query2 = "UPDATE recordedsong SET status='$situation' WHERE rsong_id='$id'";
    $query_run2 = mysqli_query($connection, $query2);

    if($query_run && $query_run2)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: lyricstable.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: lyricstable.php');
    }
}

//Restore
//Remove Lyrics
if(isset($_POST['restore_btn2']))
{
    $id = $_POST['restore_id'];
	$situation = 0;
	$query = "UPDATE lyricstable SET lyrics_situation='$situation' WHERE lyrics_id='$id'";
    $query_run = mysqli_query($connection, $query);
	$query2 = "UPDATE recordedsong SET status='$situation' WHERE rsong_id='$id'";
    $query_run2 = mysqli_query($connection, $query2);

    if($query_run && $query_run2)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: lyricstable2.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: lyricstable2.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM lyricstable WHERE lyrics_id='$id' ";
    $query_run = mysqli_query($connection, $query);
	$query2 = "DELETE FROM recordedsong WHERE rsong_id='$id' ";
    $query_run2 = mysqli_query($connection, $query2);

    if($query_run && $query_run2)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: removed_lyrics.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: removed_lyrics.php');
    }
}

if(isset($_POST['delete_btn2']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM lyricstable WHERE lyrics_id='$id' ";
    $query_run = mysqli_query($connection, $query);
	$query2 = "DELETE FROM recordedsong WHERE rsong_id='$id' ";
    $query_run2 = mysqli_query($connection, $query2);

    if($query_run && $query_run2)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: removed_lyrics2.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: removed_lyrics2.php');
    }
}

?>