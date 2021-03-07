<?php
session_start();


$connection = mysqli_connect("localhost","root","","songform");


// Remove Song Requests
if(isset($_POST['remove_btn']))
{
    $id = $_POST['remove_id'];
	$situation = 1;
	$query = "UPDATE songtable SET song_situation='$situation' WHERE song_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: pendingsongs.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: pendingsongs.php');
    }
}

// Remove Song Requests
if(isset($_POST['remove_btn2']))
{
    $id = $_POST['remove_id'];
	$situation = 1;
	$query = "UPDATE songtable SET song_situation='$situation' WHERE song_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: pendingsongs2.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: pendingsongs2.php');
    }
}

//Restore
//Remove Song Requests
if(isset($_POST['restore_btn']))
{
    $id = $_POST['restore_id'];
	$situation = 0;
	$query = "UPDATE songtable SET song_situation='$situation' WHERE song_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: removed_pendingsongs.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: removed_pendingsongs.php');
    }
}

//Restore
//Remove Song Requests
if(isset($_POST['restore_btn2']))
{
    $id = $_POST['restore_id'];
	$situation = 0;
	$query = "UPDATE songtable SET song_situation='$situation' WHERE song_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: removed_pendingsongs2.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: removed_pendingsongs2.php');
    }
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $album = $_POST['edit_album'];
    $artist = $_POST['edit_artist'];
	$status = $_POST['edit_status'];
	
	$query = "UPDATE songtable SET song_name='$name', song_album='$album', song_artist='$artist', song_status='$status' WHERE song_id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if($query_run)
	{
		$_SESSION['success'] = "Your Data is Updated";
		header('Location: pendingsongs.php');
	}
	else
	{
		$_SESSION['status'] = "Your Data is NOT Updated";
		header('Location: pendingsongs.php');
	}
	
}

if(isset($_POST['updatebtn2']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $album = $_POST['edit_album'];
    $artist = $_POST['edit_artist'];
	$status = $_POST['edit_status'];
	
	$query = "UPDATE songtable SET song_name='$name', song_album='$album', song_artist='$artist', song_status='$status' WHERE song_id='$id' ";
	$query_run = mysqli_query($connection,$query);

	if($query_run)
	{
		$_SESSION['success'] = "Your Data is Updated";
		header('Location: pendingsongs2.php');
	}
	else
	{
		$_SESSION['status'] = "Your Data is NOT Updated";
		header('Location: pendingsongs2.php');
	}
	
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM songtable WHERE song_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: pendingsongs.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: pendingsongs.php');
    }
}

if(isset($_POST['delete_btn2']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM songtable WHERE song_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: pendingsongs2.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: pendingsongs2.php');
    }
}



?>