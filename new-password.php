<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	
	<!-- Favicon of the Website -->
	<link rel="icon" href="images/sofomusic.jpg">
	
</head>

<body>

    <div class="container">
	
        <div class="row">
		
            <div class="col-md-4 offset-md-4 form">
			
				<h1 style="text-align: center;"><a href="index.html"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px;" title="This is SoFo Logo" /></a></h1>	
			
				<br>
			
                <form action="new-password.php" method="POST" autocomplete="off">
                    
					<h2 class="text-center">New Password</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
					
					<br>
					
                    <div class="form-group input-container">					
						
						<i class="fa fa-key icon"></i>
                    
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    
                    <div class="form-group input-container">					
						
						<i class="fa fa-key icon"></i>
                    
						<input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
					
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
					
                </form>
				
            </div>
			
        </div>
		
    </div>
    
</body>
</html>