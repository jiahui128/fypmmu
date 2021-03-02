<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Song Request Details</h6>
    </div>
    <div class="card-body">

    <?php

    $connection = mysqli_connect("localhost","root","","songform");

    if (isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM songtable WHERE song_id ='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>  

                <form action="pending.php" method="POST">

                    <input type="hidden" name="edit_id" value="<?php echo $row['song_id'] ?>" >
                    <div class="form-group">
                        <label>Song Name</label>
                        <input type="text" name="edit_name" value="<?php echo $row['song_name']?>" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label>Album Name</label>
                        <input type="text" name="edit_album" value="<?php echo $row['song_album']?>" class="form-control" placeholder="Enter Album Name" required>
                    </div>
                    <div class="form-group">
                        <label>Artist Name</label>
                        <input type="text" name="edit_artist" value="<?php echo $row['song_artist']?>" class="form-control" placeholder="Enter Artist Name" required>
                    </div>
					<div class="form-group">
                        <label>Song Status: <?php echo $row['song_status']?></label><br>
                        <select name="edit_status">
						<option>Pending</option>
						<option>Completed</option>
						</select>
                    </div>
        
                    <a href="pendingsongs.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="updatebtn" class="btn btn-primary" onClick="return confirm('Update this song request details?')"> UPDATE </button>
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