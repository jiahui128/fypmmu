<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
    </div>
    <div class="card-body">

    <?php

    $connection = mysqli_connect("localhost","root","","adminpanel");

    if (isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM register WHERE admin_id ='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>  

                <form action="code.php" method="POST">

                    <input type="hidden" name="edit_id" value="<?php echo $row['admin_id'] ?>" >
                    <div class="form-group">
                        <label> Full Name </label>
                        <input type="text" name="edit_username" value="<?php echo $row['admin_name']?>" class="form-control" placeholder="Enter Full Name" required>
                    </div>
					<div class="form-group">
                        <label> Phone Number </label>
                        <input type="text" name="edit_phoneno" value="<?php echo $row['admin_phoneno']?>" class="form-control" placeholder="Enter Phone Number" required>
                    </div>
					<!--<div class="form-group">
                        <label> Gender </label>
                        <input type="text" name="edit_gender" value="<?php echo $row['admin_gender']?>" class="form-control" placeholder="Enter Gender">
                    </div>-->
					<div class="form-group">
						<label> Gender : <?php echo $row['admin_gender']?></label><br>
						<select name="edit_gender">
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
        
                    <a href="edit.php" class="btn btn-danger"> CANCEL </a>
                    <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
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