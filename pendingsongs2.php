<?php
session_start();
include('includes/header.php'); 
include('includes/navbar2.php'); 
?>

<?php require_once "songrecorded.php"; ?>

<!-- Favicon of the Website -->
	
<link rel="icon" href="images/sofomusic.jpg">

<!--<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Song Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="pending.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Song Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Song Name">
            </div>
            <div class="form-group">
                <label> Song Album </label>
                <input type="text" name="album" class="form-control" placeholder="Enter Album Name">
            </div>
            <div class="form-group">
                <label> Song Artist </label>
                <input type="text" name="artist" class="form-control" placeholder="Enter Artist Name">
            </div>
			<div class="form-group">
                <label> Song Status </label>
                <input type="text" name="status" class="form-control" placeholder="Enter Song Status (Pending/Approved/Disaprroved)">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary" onClick="return confirm('Add this song request details?')">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>-->


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
			
			<h1 class="h3 mb-0 text-gray-800">Pending Song Requests</h1>
                
				<a href="adminlogout.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				
				<i class="fas fa-user fa-sm text-white-50"></i> Logout</a>
        
		</div>
		
		<div>
		
			<p><i class="fas fa-exclamation-circle fa-sm"></i> Pending song requests are requests that were requested by the users in the main home system</p>
		
			<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Add New Song
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

        $query = "SELECT * FROM songtable";
        $query_run = mysqli_query($connection,$query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Song ID</th>
			<th>Song Name</th>
            <th>Album</th>
            <th>Artist</th>
			<th>Song Status</th>
            <th>Update</th>
			<th>Add to Song Database</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
				if($row['song_situation']==0)
				{
                ?>   
          <tr>
            <td><?php echo $row['song_id']; ?></td>
			<td><?php echo $row['song_name']; ?></td>
            <td><?php echo $row['song_album']; ?></td>
            <td><?php echo $row['song_artist']; ?></td>
			<td><?php echo $row['song_status']; ?></td>
			<td>
                <form action="pending_edit2.php" method="post">
                <input type="hidden" name="edit_id" value="<?php echo $row['song_id']; ?>">
                <button type="submit" name="edit_btn2" class="btn btn-success">UPDATE</button>
                </form>
            </td>
			<td>
				<!--<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New Song</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
      
				<form action="complete.php" method="POST">

				<div class="modal-body">
			
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
						<input type="file" name="file" placeholder="Enter Song File">
					</div>
        
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="addbtn" class="btn btn-primary">Save</button>
				</div>
      
				</form>

				</div>
				</div>
				</div>-->
				
				<form action="pending_add.php" method="post">
                  <input type="hidden" name="add_id" value="<?php echo $row['song_id']; ?>">
                  <button type="submit" name="add_btn2" class="btn btn-primary">ADD TO DATABASE</button>
                </form>
			
                <!--<button type="button" style="text-align: center;" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
					ADD TO DATABASE
				</button>-->
            </td>
            <td>
                <form action="pending.php" method="post">
                  <input type="hidden" name="remove_id" value="<?php echo $row['song_id']; ?>">
				  <button type="submit" name="remove_btn2" class="btn btn-danger" onClick="return confirm('Remove this song request details?')">REMOVE</button>
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