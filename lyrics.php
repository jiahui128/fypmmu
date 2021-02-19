<?php
session_start();


$connection = mysqli_connect("localhost","root","","songform");

// if(isset($_POST['registerbtn']))
// { 
    // $id = $_POST['id'];
	// $no = $_POST['no'];
    // $name = $_POST['name'];
	// $artist = $_POST['artist'];
	// $file = $_POST['file'];
	// if($file=="")
		// $status="Pending";
	// else
		// $ststus="Completed";
		
    // $query = "INSERT INTO lyricstable (lyrics_no, lyrics_song, lyrics_artist, lyrics_status, lyrics_files) VALUES ('$no', '$name', '$artist', '$status', '$file')";
	
	// $query_run = mysqli_query($connection, $query);
            
        // if($query_run)
        // {
            // echo "Saved";
            // $_SESSION['status'] = "New Lyrics Info Added";
			// song status			
			// mysqli_query($connection,"UPDATE songtable SET song_status='$status' WHERE song_artist='$artist'");
            // header('Location: lyricstable.php');
        // }
        // else 
        // {
            // $_SESSION['status'] = "New Lyrics Info Not Added";
            // header('Location: lyricstable.php');  
        // }
// }

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $no = $_POST['edit_no'];
    $name = $_POST['edit_name'];
	$artist = $_POST['edit_artist'];
    $status = "Pending";
	$file = $_POST['edit_file'];

    $query = "UPDATE lyricstable SET lyrics_no = '$no', lyrics_song='$name', lyrics_status='$status', lyrics_files='$file' WHERE lyrics_id='$id' ";
	
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
			mysqli_query($connection,"UPDATE songtable SET song_status='$status2' WHERE song_artist='$artist' AND song_name='$name'");
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

?>