<?php			
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'songform');
	mysqli_connect('localhost', 'root', '', 'userform');
	if(isset($_POST['submitbtn']))
	{
		$songrandomid = rand(999999, 111111);
		$email=$_SESSION['email'];
		$sp1= $_POST['name'];
		$sp2= $_POST['album'];
		$sp3= $_POST['artist'];
		$songstatus = "Pending";
						
		$sql_u = "SELECT * FROM songtable WHERE song_name='$sp1'";
		$sql_e = "SELECT * FROM songtable WHERE song_name='$sp1' AND song_artist='$sp3'";
		$res_u = mysqli_query($con, $sql_u);
		$res_e = mysqli_query($con, $sql_e);

		if (mysqli_num_rows($res_u) > 0) {
			if(mysqli_num_rows($res_e) > 0)
			{
				$_SESSION['status'] = "Your Request is Already Exists!";
			}
			else
			{
				mysqli_query($con, "INSERT INTO songtable (song_id, song_name,song_album,song_artist,song_status,email) VALUES('$songrandomid', '$sp1','$sp2','$sp3', '$songstatus','$email')");
			
				$_SESSION['success'] = "Your Request is Successful";
			}
		}
		else
		{
			mysqli_query($con, "INSERT INTO songtable (song_id, song_name,song_album,song_artist,song_status,email) VALUES('$songrandomid', '$sp1','$sp2','$sp3', '$songstatus','$email')");
			
			$_SESSION['success'] = "Your Request is Successful";
		}
           
		 header('Location: requestsongs.php');
	}
				
?>