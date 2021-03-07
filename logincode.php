<?php
session_start();

$connection = mysqli_connect("localhost","root","","adminpanel");
$errors = array();
$email = "";
if(isset($_POST['loginbtn'])) {
    $result=mysqli_query($connection, "SELECT * FROM register
    WHERE admin_email= '{$_POST['email']}'");
    $pass=mysqli_fetch_array($result);
    if($pass["admin_password"] === $_POST['password']) {
		if($pass['admin_status']==0){
			$email = $_POST['email'];
			$_SESSION['adminemail']= $email;
			
			if($email == "1181202878@student.mmu.edu.my" || $email == $superior2 || $email == $superior3)
			{
				header("Location: index.php");
				
				exit;
			}
			else
			{
				header("Location: index2.php");
				
				exit;
			}
		}
		else{
			echo '<script>';
			echo 'alert("Login unsuccessfully! You are removed by admin");';
			echo 'location.href="login.php"';
			echo '</script>';
		}
    }
    else {
        echo '<script>';
		echo 'alert("Login unsuccessfully! Please try again");';
		echo 'location.href="login.php"';
		echo '</script>';
    }
}

 //if admin click continue button in reset password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $check_email = "SELECT * FROM register WHERE admin_email='$email'";
        $run_sql = mysqli_query($connection, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE register SET code = $code WHERE admin_email = '$email'";
            $run_query =  mysqli_query($connection, $insert_code);
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
	
	//if admin click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE register SET code = $code, admin_password = '$encpass' WHERE admin_email = '$email'";
            $run_query = mysqli_query($connection, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

	//if admin click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($connection, $_POST['otp']);
        $check_code = "SELECT * FROM register WHERE code = $otp_code";
        $code_res = mysqli_query($connection, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['admin_email'];
            $_SESSION['admin_email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
	
	//if admin click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $update_pass = "UPDATE register SET code = $code, admin_password = '$cpassword' WHERE admin_email = '$email'";
            $run_query = mysqli_query($connection, $update_pass);
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
        header('Location: login.php');
    }
?>