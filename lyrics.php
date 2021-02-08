<?php
session_start();


$connection = mysqli_connect("localhost","root","","songform");

if(isset($_POST['registerbtn']))
{ 
    $id = $_POST['id'];
	$no = $_POST['no'];
    $name = $_POST['name'];
    $status = $_POST['status'];
	$file = $_POST['file'];
  
    $query = "INSERT INTO lyricstable (lyrics_no, lyrics_song, lyrics_status, lyrics_files) VALUES ('$no', '$name','$status', '$file')";
	
	$query_run = mysqli_query($connection, $query);
            
        if($query_run)
        {
            // echo "Saved";
            $_SESSION['status'] = "New Lyrics Info Added";
            header('Location: lyricstable.php');
        }
        else 
        {
            $_SESSION['status'] = "New Lyrics Info Not Added";
            header('Location: lyricstable.php');  
        }
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $no = $_POST['edit_no'];
    $name = $_POST['edit_name'];
    $status = $_POST['edit_status'];
	$file = $_POST['edit_file'];

    $query = "UPDATE lyricstable SET lyrics_no = '$no', lyrics_song='$name', lyrics_status='$status', lyrics_files='$file' WHERE lyrics_id='$id' ";
	
	$query_run = mysqli_query($connection,$query);
	
    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: lyricstable.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: lyricstable.php');
    }
}

// Remove Lyrics
if(isset($_POST['remove_btn']))
{
    $id = $_POST['remove_id'];
	$situation = 1;
	$query = "UPDATE lyricstable SET lyrics_situation='$situation' WHERE lyrics_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: lyricstable.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: lyricstable.php');
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

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: removed_lyrics.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: removed_lyrics.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM lyricstable WHERE lyrics_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: lyricstable.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: lyricstable.php');
    }
}

?>