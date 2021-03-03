<?php
session_start();


$connection = mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{ 
	$adminrandomid = rand(999999, 111111);
    $adminname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
	$phoneno = $_POST['phoneno'];
	$gender = $_POST['gender'];
	
	$sql_r = "SELECT * FROM register WHERE admin_email='$email'";
	$sql_n = "SELECT * FROM register WHERE admin_email='$email' AND admin_name='$adminname'";
	$sql_q = "SELECT * FROM register WHERE admin_phoneno='$phoneno'";
	$res_r = mysqli_query($connection, $sql_r);
	$res_n = mysqli_query($connection, $sql_n);
	$res_q = mysqli_query($connection, $sql_q);
	
	if (mysqli_num_rows($res_r) > 0) 
	{
		$_SESSION['status'] = "This Admin Email is Already Exists!";
		
		header('Location: edit.php');
	}
	else if (mysqli_num_rows($res_n) > 0) 
	{
		$_SESSION['status'] = "This Admin Email and Admin Name are Already Existed!";
		
		header('Location: edit.php');
	}
	else if (mysqli_num_rows($res_q) > 0) 
	{
		$_SESSION['status'] = "This Phone Number is Already Existed!";
		
		header('Location: edit.php');
	}
	else
	{
		if($password === $cpassword)
        {
            $query = "INSERT INTO register (admin_id, admin_name,admin_email,admin_password, admin_phoneno, admin_gender) VALUES ('$adminrandomid', '$adminname','$email','$password', '$phoneno', '$gender')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: edit.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: edit.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            header('Location: edit.php');  
        }
	}
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
	$phoneno = $_POST['edit_phoneno'];
	$gender = $_POST['edit_gender'];
	
	$query = "UPDATE register SET admin_name='$username', admin_phoneno='$phoneno', admin_gender='$gender' WHERE admin_id='$id' ";
	$query_run = mysqli_query($connection,$query);
		
	if($query_run)
	{
		$_SESSION['success'] = "Your Data is Updated";
		header('Location: edit.php');
	}
	else
	{
		$_SESSION['status'] = "Your Data is NOT Updated";
		header('Location: edit.php');
	}
	
}

// Remove Admin
if(isset($_POST['remove_btn']))
{
    $id = $_POST['remove_id'];
	$adstatus = 1;
	$query = "UPDATE register SET admin_status='$adstatus' WHERE admin_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Removed";
        header('Location: edit.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Removed";
        header('Location: edit.php');
    }
}

//Delete Admin
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];


    $query = "DELETE FROM register WHERE admin_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location: edit.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: edit.php');
    }
}

//Restore
// Remove Admin
if(isset($_POST['restore_btn']))
{
    $id = $_POST['restore_id'];
	$adstatus = 0;
	$query = "UPDATE register SET admin_status='$adstatus' WHERE admin_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Restored";
        header('Location: removed_admin.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Restored";
        header('Location: removed_admin.php');
    }
}
?>