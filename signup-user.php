<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	
</head>

<body>

    <div class="container">
	
        <div class="row">
		
            <div class="col-md-4 offset-md-4 form">
				
				<h1 style="text-align: center;"><a href="index.html"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px;" title="This is SoFo Logo" /></a></h1>
				
				<br>
				
				<h2 class="text-align: center;">Register</h2>
						
                <p class="text-align: center;">Please enter your details below.</p>
			
                <form action="signup-user.php" method="POST" autocomplete="">
					
                    <?php
					
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
					
                    <div class="form-group input-container">
					
						<i class="fa fa-user icon"></i>
						
                        <input class="form-control" type="text" name="name" placeholder="Enter your username" required value="<?php echo $name ?>">
                    </div>
					
                    <div class="form-group input-container">
					
						<i class="fa fa-envelope icon"></i>
						
                        <input class="form-control" type="email" name="email" placeholder="Enter your email address" required value="<?php echo $email ?>">
                    </div>
					
                    <div class="form-group input-container">
					
						<i class="fa fa-key icon"></i>
						
                        <input class="form-control" type="password" name="password" placeholder="Enter your password" required>
                    </div>
					
                    <div class="form-group input-container">
					
						<i class="fa fa-key icon"></i>
						
                        <input class="form-control" type="password" name="cpassword" placeholder="Re-enter your password" required>
                    </div>
					
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Create Account" onclick="register();">
                    </div>
					
					<script>
					
						function register(){
							alert('Succesfully Registered!');
							window.location.href = 'login-user.php';
						}
					</script>
					
					
					
                    <div class="link login-link text-center">Already have an account? <a href="login-user.php">Login here</a></div>
                </form>
		
				<!--<br>
		
				<p><small style="font: 10px sans-serif;  color: black;">&copy; Copyright 2020, SoFo Team. All Rights Reserved.</small></p>
				-->
				
            </div>
			
        </div>
		
    </div>
	
    
</body>
</html>