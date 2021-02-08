<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--DataTales Example -->
<div class="card shadow mb-4" style="width: 950px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Song and Lyrics Details</h6>
    </div>
    <div class="card-body">

    <?php

    $connection = mysqli_connect("localhost","root","","songform");

    if (isset($_POST['add_btn']))
    {
		$id = $_POST['add_id'];
		
        $query = "SELECT * FROM songtable WHERE song_id ='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>  

                <form action="complete.php" method="POST">
					
					<h4 style="color: #5d76c4;">Song Information</h4>
					
                    <div class="form-group">
						<label> Song Name </label>
							<input type="text" name="name" class="form-control" value="<?php echo $row['song_name']; ?>">
					</div>
					<div class="form-group">
						<label> Song Album </label>
							<input type="text" name="album" class="form-control" value="<?php echo $row['song_album']; ?>">
					</div>
					<div class="form-group">
						<label> Song Artist </label>
							<input type="text" name="artist" class="form-control" value="<?php echo $row['song_artist']; ?>">
					</div>
					<div class="form-group">
						<label>Song File</label>
						<br>
						<input type="file" name="file" placeholder="Enter Song File" required>
					</div>
					
					<hr>
					
					<h4 style="color: #5d76c4;">Lyrics Information</h4>
					
					<div class="form-group">
						<label> Lyrics's Song Name </label>
						<input type="text" name="lyricsname" class="form-control" value="<?php echo $row['song_name']; ?>">
					</div>
					<div class="form-group">
						<label> Lyrics Status </label>
						<input type="text" name="lyricsstatus" class="form-control" value="Pending" placeholder="Enter Lyrics Status (Completed/Pending)">
					</div>
					<div class="form-group">
						<label>Lyrics File</label>
						<br>
						<input type="file" name="lyricsfile" placeholder="Enter Lyrics File">
					</div>
        
				</div>
				<div class="modal-footer">
					<a href="pendingsongs.php" class="btn btn-danger"> CLOSE </a>
					<button type="submit" name="addbtn" class="btn btn-primary" onClick="return confirm('Add this request as a new song?')"> ADD </button>
				</div>
                </form>

    <?php
        }
    }   
    ?> 

    </div>
    </div>
</div>

</div>
<!-- /.container.fluid -->


</div>
        <!-- End of Content Wrapper -->

<?php
include('includes/scripts.php');
?>