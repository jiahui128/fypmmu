<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
		$userrandomid = rand(999999, 111111);		
		mysqli_query($con, "INSERT INTO usertable (id) VALUES('$userrandomid')");
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: jyquek32@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
		
		header('location: login-user.php');
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: login-user.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
	
    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
			$fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
				if($status == 'verified'){
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					header('location: home.php');
				}else{
					$info = "It's look like you haven't still verify your email - $email";
					$_SESSION['info'] = $info;
					header('location: user-otp.php');
				}
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
		}else{
            $errors['email'] = "It's look like you're not yet registered! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in reset password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: weichin0417@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php?email='.$email);
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
	
	//change password in user page
	if(isset($_POST['change_pwd'])){
		$email = $_SESSION["email"];
		$cur= mysqli_real_escape_string($con, $_POST['curpwd']);
		$new= mysqli_real_escape_string($con, $_POST['newpwd']);
        $cf = mysqli_real_escape_string($con, $_POST['cpwd']);
		$check_email="SELECT * FROM usertable WHERE email = '$email'";
		$res=mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
			$fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($cur, $fetch_pass)){
				// check if password is same
				if($new==$cf){
					$encpass = password_hash($cf, PASSWORD_BCRYPT);
					$sql="UPDATE usertable SET password='$encpass' WHERE email='$email'";
					mysqli_query($con,$sql);
					echo"<script>alert('Password change!')</script>";
					header('Location:profile.php');

				}else{
					echo"<script>alert('New Password and Confirm Password does not match!')</script>";
				}
			}else{
				echo"<script>alert('Current password wrong!')</script>";
			}
		}
	}
	
	//change user profile info
	if(isset($_POST['change_info']))
	{
		$email=$_SESSION["email"];
		
		$check_email="SELECT * FROM usertable WHERE email = '$email'";
		$res=mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0)
		{
			if($_POST['username']=="")
			{	
				//update gender
				if($gender=$_POST['gender'] )
				{
					$query="UPDATE usertable SET gender='$gender' WHERE email='$email'";
					$result= mysqli_query($con,$query);
				}
				//update age
				if($age=$_POST['age'])
				{
					$query="UPDATE usertable SET age='$age' WHERE email='$email'";
					$result= mysqli_query($con,$query);
				}
				echo "<script>alert('User Information Updated!')</script>";
			}
			else if($_POST['gender']=="")
			{
				//update username
				if($uname=$_POST['username'] )
				{
					$query="UPDATE usertable SET name='$uname' WHERE email='$email'";
					$result= mysqli_query($con,$query);
				}
				//update age
				if($age=$_POST['age'])
				{
					$query="UPDATE usertable SET age='$age' WHERE email='$email'";
					$result= mysqli_query($con,$query);
				}
				echo "<script>alert('User Information Updated!')</script>";
			}
			else if($_POST['age']=="")
			{
				//update username
				if($uname=$_POST['username'] )
				{
					$query="UPDATE usertable SET name='$uname' WHERE email='$email'";
					$result= mysqli_query($con,$query);
				}
				//update gender
				if($gender=$_POST['gender'] )
				{
					$query="UPDATE usertable SET gender='$gender' WHERE email='$email'";
					$result= mysqli_query($con,$query);
				}
				echo "<script>alert('User Information Updated!')</script>";
			}
			else
			{
				$uname=$_POST['username'];
				$gender=$_POST['gender'];
				$age=$_POST['age'];
				$query="UPDATE usertable SET name='$uname', gender='$gender', age='$age' WHERE email='$email'";
				$result= mysqli_query($con,$query);
				if($result)
				{
					echo "<script>alert('User Information Updated!')</script>";
				}
				else
				{
					echo "<script>alert('Fail to Update')</script>";
				}
			}
			
		}
	}
	
	//change user profile image
	if(isset($_POST['change_pic']))
	{
		move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name']);
		$q = mysqli_query($con,"UPDATE usertable SET profile_image = '".$_FILES['file']['name']."' WHERE email = '".$_SESSION['email']."' limit 1");
		echo "<script>alert('User Image Changed!') </script>";
	}
	else
	{
		echo "<script>('Please upload a valid image!') </script>";
	}

?>