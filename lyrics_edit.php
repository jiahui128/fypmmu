<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Lyrics Info</h6>
    </div>
    <div class="card-body">

    <?php

    $connection = mysqli_connect("localhost","root","","songform");

    if (isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM lyricstable WHERE lyrics_id ='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>  

                <form action="lyrics.php" method="POST">

                    <input type="hidden" name="edit_id" value="<?php echo $row['lyrics_id'] ?>" >
                    <!--<div class="form-group">
                        <label>Lyrics No</label>
                        <input type="text" name="edit_no" value="<?php echo $row['lyrics_no']?>" class="form-control" placeholder="Enter Lyrics Number">
                    </div>
						<div class="form-group">
                        <label>Song Name</label>
                        <input type="text" name="edit_name" value="<?php echo $row['lyrics_song']?>" class="form-control" placeholder="Enter Song Name">
                    </div>
					<div class="form-group">
                        <label>Song Artist</label>
                        <input type="text" name="edit_artist" value="<?php echo $row['lyrics_artist']?>" class="form-control" placeholder="Enter Song Name">
                    </div>-->
					
					<div class="form-group">
                        <label>Lyrics File</label>
						<br>
						<input type="file" name="edit_file" value="<?php echo $row['lyrics_files']?>" placeholder="Enter Lyrics File" accept=".pdf" required>
					</div>
					
                    <a href="lyricstable.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="updatebtn" class="btn btn-primary" onClick="return confirm('Update this lyrics details?')"> UPDATE </button>
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