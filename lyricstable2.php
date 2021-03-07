<?php
session_start();
include('includes/header.php'); 
include('includes/navbar2.php'); 
?>

<?php require_once "lyricscon.php"; ?>

<!-- Favicon of the Website -->
	
<link rel="icon" href="images/sofomusic.jpg">


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Lyrics Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="lyrics.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Lyrics No </label>
                <input type="text" name="no" class="form-control" placeholder="Enter Lyrics Number">
            </div>
            <div class="form-group">
                <label> Lyrics's Song Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Song Name">
            </div>
            <div class="form-group">
                <label> Lyrics Status </label>
                <input type="text" name="status" class="form-control" placeholder="Enter Lyrics Status (Completed/Pending)">
            </div>
			<div class="form-group">
                <label>Lyrics File</label>
				<br>
				<input type="file" name="file" placeholder="Enter Lyrics File">
			</div>
		
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary" onClick="return confirm('Add this new lyrics details?')">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<!--<div class="card shadow mb-4">
  <div class="card-header py-3">
    
	<!--<h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>-->
	
  <!--</div>-->
  
  <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
			
			<h1 class="h3 mb-0 text-gray-800">Lyrics Details</h1>
                
				<a href="adminlogout.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				
				<i class="fas fa-user fa-sm text-white-50"></i> Logout</a>
        
		</div>
		
		<div>
		
			<p><i class="fas fa-exclamation-circle fa-sm"></i> Lyrics Details are in below</p>
		
			<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Add New Lyrics Info
            </button>-->
		</div>
  
  <div class="card-body">

    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
        echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].'</h2>';
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].'</h2>';
        unset($_SESSION['status']);
    }
    ?>

    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","root","","songform");

        $query = "SELECT * FROM lyricstable";
        $query_run = mysqli_query($connection, $query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Lyrics ID</th>
			<th>Lyrics No</th>
            <th>Song Name</th>
			<th>Song Artist</th>
            <th>Status</th>
			<th>Preview</th>
			<th>Download</th>
            <th>Update</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
				if($row['lyrics_situation']==0)
				{
                ?>   
          <tr>
            <td><?php echo $row['lyrics_id']; ?></td>
			<td><?php echo $row['lyrics_no']; ?></td>
            <td><?php echo $row['lyrics_song']; ?></td>
            <td><?php echo $row['lyrics_artist']; ?></td>			
            <td><?php echo $row['lyrics_status']; ?></td>
			
			<td style="text-align: center;">
				<?php
						if($row['lyrics_files'] == "")
						{
							echo "No files found!";
						}
						else
						{
							echo "<a href='pdf/".$row['lyrics_files']."'>"; ?> 
							<i class="fas fa-file-pdf fa-sm"></i></a>			
				<?php		
					}
				?>
			</td>
			
			<td style="text-align: center;">
				<?php
						if($row['lyrics_files'] == "")
						{
							echo "No files found!";
						}
						else
						{
							echo "<a href='pdf/".$row['lyrics_files']."' download>"; ?>
							<i class="fas fa-download fa-sm"></i></a>	
				<?php		
					}
				?>
			</td>
			<td>
                <form action="lyrics_edit2.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['lyrics_id']; ?>">
                <button type="submit" name="edit_btn2" class="btn btn-success">UPDATE</button>
                </form>
            </td>
            <td>
                <form action="lyrics.php" method="post">
                <input type="hidden" name="remove_id" value="<?php echo $row['lyrics_id']; ?>">
                <button type="submit" name="remove_btn2" class="btn btn-danger" onClick="return confirm('Remove this lyrics details?')">REMOVE</button>
                </form>
            </td>
          </tr>
          <?php
            }
		  }
        }
        else{
            echo"No Record Found";
        }
        ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


</div>
        <!-- End of Content Wrapper -->

<?php
include('includes/scripts.php');
?>