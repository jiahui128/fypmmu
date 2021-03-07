<?php
session_start();
include('includes/header.php'); 
include('includes/navbar2.php'); 
?>

<div class="container-fluid">

<!--DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Song Details</h6>
    </div>
    <div class="card-body">

    <?php

    $connection = mysqli_connect("localhost","root","","songform");

    if (isset($_POST['edit_btn2']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM recordedsong WHERE rsong_id ='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>  

                <form action="complete.php" method="POST">

                    <input type="hidden" name="edit_id" value="<?php echo $row['rsong_id'] ?>" >
                    <div class="form-group">
                        <label>Song No</label>
                        <input type="text" name="edit_no" value="<?php echo $row['rsong_no']?>" class="form-control" placeholder="Enter Song Number" required>
                    </div>
					<div class="form-group">
                        <label>Song Name</label>
                        <input type="text" name="edit_name" value="<?php echo $row['rsong_name']?>" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label>Album Name</label>
                        <input type="text" name="edit_album" value="<?php echo $row['rsong_album']?>" class="form-control" placeholder="Enter Album Name" required>
                    </div>
                    <div class="form-group">
                        <label>Artist Name</label>
                        <input type="text" name="edit_artist" value="<?php echo $row['rsong_artist']?>" class="form-control" placeholder="Enter Artist Name" required>
                    </div>
					<div class="form-group">
                        <label>Song File</label>
						<br>
						<input type="file" name="edit_file" value="<?php echo $row['rsong_files']?>" placeholder="Enter Lyrics File" accept=".mp3" required>
					</div>
        
                    <a href="completesong2.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="updatebtn2" class="btn btn-primary" onClick="return confirm('Update this song details?')"> UPDATE </button>
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
include('includes/footer.php');
?>