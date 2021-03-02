<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- Favicon of the Website -->
	
<link rel="icon" href="images/sofomusic.jpg">


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Full Name </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
            </div>
			<div class="form-group">
                <label> Phone No </label>
                <input type="text" name="phoneno" class="form-control" placeholder="Enter Phone Number" required>
            </div>
			<!--<div class="form-group">
                <label> Gender </label>
                <input type="text" name="gender" class="form-control" placeholder="Enter Gender" required>
            </div>-->
			<div class="form-group">
                <label> Gender </label><br>
                <select name="gender">
					<option>Male</option>
					<option>Female</option>
				</select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary" onClick="return confirm('Add this new admin details?')">Save</button>
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
			
			<h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
                
				<a href="adminlogout.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				
				<i class="fas fa-user fa-sm text-white-50"></i> Logout</a>
        
		</div>
		
		<div>
			<p><i class="fas fa-exclamation-circle fa-sm"></i> Admin Profile is the current registered admins' details that had been added by the superior admin</p>
		
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Add Admin Profile 
            </button>
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
        $connection = mysqli_connect("localhost","root","","adminpanel");

        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection,$query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Admin Name</th>
            <th>Email</th>
			<th>Phone Number</th>
			<th>Gender</th>
			<th>Created_At</th>
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
                if($row['admin_status']==0)
				{
				?>   
					<tr>
						<td><?php echo $row['admin_id']; ?></td>
						<td><?php echo $row['admin_name']; ?></td>
						<td><?php echo $row['admin_email']; ?></td>
						<td><?php echo $row['admin_phoneno']; ?></td>
						<td><?php echo $row['admin_gender']; ?></td>
						<td><?php echo $row['created_at']; ?></td>
					<td>
						<form action="register_edit.php" method="post">
						<input type="hidden" name="edit_id" value="<?php echo $row['admin_id']; ?>">
						<button type="submit" name="edit_btn" class="btn btn-success"> UPDATE</button>
						</form>
					</td>
					<td>
						<form action="code.php" method="post">
						<input type="hidden" name="remove_id" value="<?php echo $row['admin_id']; ?>">
						<button type="submit" name="remove_btn" class="btn btn-danger" onClick="return confirm('Remove this account details?')">REMOVE</button>
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