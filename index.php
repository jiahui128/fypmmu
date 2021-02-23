<?php
require 'init.php';
// IF USER MAKING LOGIN REQUEST
if(isset($_POST['email']) && isset($_POST['password'])){
  $result = $user_obj->loginUser($_POST['email'],$_POST['password']);
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email'])){
  header('Location: profile.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	
	<!-- Favicon of the Website -->
	<link rel="icon" href="images/sofomusic.jpg">
	
	<style>
		.errorMsg{
			color: white;
		}
		
		.successMsg{
			color: white;
		}
	</style>
	
</head>

<body>
    <div class="container">
	
        <div class="row">
		
            <div class="col-md-4 offset-md-4 form login-form">
			
				<h1 style="text-align: center;"><a href="newhome.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px;" title="This is SoFo Logo" /></a></h1>
				
				<br>
			
                <form action="" method="POST">
				
                    <h2 class="text-align: center;">Login</h2>
					
                    <p class="text-align: center;">Login with your email and password.</p>
					
					<div>  
					  <?php
						if(isset($result['errorMessage'])){
						  echo '<p class="bg-danger errorMsg">'.$result['errorMessage'].'</p>';
						}
						if(isset($result['successMessage'])){
						  echo '<p class="bg-danger successMsg">'.$result['successMessage'].'</p>';
						}
					  ?>    
					</div>
					
					<div class="form-group input-container">
					
						<i class="fa fa-envelope icon"></i>
						
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required>
                    </div>
					
                    <div class="form-group input-container">
					
						<i class="fa fa-key icon"></i>
						
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    
					<div class="link forget-pass text-left"><a href="reset-password.php">Forgot password?</a></div>
                    
					<div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
					
					<!--<div class="form-group">
                        <input class="form-control button" type="reset" name="reset" value="Reset">
                    </div>-->
					
                    <div class="link login-link text-center">Not yet a member? <a href="signup.php">Signup now</a></div>
					
					<br>
					
					<div class="link login-link text-center"><a href="newhome.php">Back to Home Page</a></div>
				
				</form>
    	
            </div>
			
        </div>
		
    </div>
    
</body>
</html>