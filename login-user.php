<?php require_once "controllerUserData.php"; ?>
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
	
</head>

<body>
    <div class="container">
	
        <div class="row">
		
            <div class="col-md-4 offset-md-4 form login-form">
			
				<h1 style="text-align: center;"><a href="newhome.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px;" title="This is SoFo Logo" /></a></h1>
				
				<br>
			
                <form action="login-user.php" method="POST" autocomplete="">
				
                    <h2 class="text-align: center;">Login</h2>
					
                    <p class="text-align: center;">Login with your email and password.</p>
					
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
					
                     <div class="form-group input-container">
					
						<i class="fa fa-envelope icon"></i>
						
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
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
					
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
				
            </div>
			
        </div>
		
    </div>
    
</body>
</html>