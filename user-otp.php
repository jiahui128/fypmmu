<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: newhome.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
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
				
                <form action="user-otp.php" method="POST" autocomplete="off">
				
                    <h2 class="text-center">Code Verification</h2>
					
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
					
                     <div class="form-group input-container">					
						
						<i class="fa fa-folder-open icon"></i>
					
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
					
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit" onclick="codeverified();">
                    </div>
					
					<script>
					
						function codeverified(){
							alert('Code succesfully verified! Please login again');
							window.location.href = 'login-user.php';
						}
					</script>
					
                </form>
				
            </div>
			
        </div>
		
    </div>
    
</body>
</html>