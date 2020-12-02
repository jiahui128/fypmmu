<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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
			
                <form action="reset-password.php" method="POST" autocomplete="">
				
                    <h2 class="text-center">Reset Password</h2>
					
                    <p class="text-center">Enter your email address</p>
					
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
					
                    <div class="form-group input-container">					
						
						<i class="fa fa-envelope icon"></i>
						
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    
					<div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
					
                </form>
				
            </div>
			
        </div>
		
    </div>
    
</body>
</html>