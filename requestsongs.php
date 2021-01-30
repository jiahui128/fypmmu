<?php require_once "requestdata.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Songs Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	
	<!-- Favicon of the Website -->
	<link rel="icon" href="images/sofomusic.jpg">
	
	<style>
	.form-element
	{
		position:relative;
	}
	.form-element input
	{
		width:100%
		padding:10px;
		font-size:20px;
	}
	.form-element .toggle-password
	{
		position:absolute;
		width:40px;
		height:40px;
		top:2px;
		right:2px;
		border-radius:50%;
		text-align:center;
		line-height:35px;
		font-size:20px;
		cursor:pointer;
	}
	.form-element .toggle-password.active i.fa-eye
	{
		display:none;
	}
	.form-element .toggle-password.active i.fa-eye-slash
	{
		display:inline;
	}
	.form-element .toggle-password i.fa-eye-slash
	{
		display:none;
	}
	.form-element .password-policies
	{
		position:realtive;
		text-align:left;
		width:90%;
		padding:0px;
		height:0px;
		background:#f5f5f5;
		border-radius:5px;
		margin:10px 45px 10px;
		box-sizing:border-box;
		opacity:0;
		overflow:hidden;
		transition:height 200ms ease-in-out,
					opacity 200ms ease-in-out;
	}
	.form-element .password-policies.active
	{
		opacity:1;
		padding:10px;
		height:170px;
	}
	.form-element .password-policies > div
	{
		margin:15px 10px;
		font-weight:600;
		color:#888;
	}
	.form-element .password-policies > div.active
	{
		color:#111;
	}
	</style>
	
</head>

<body>

    <div class="container">
	
        <div class="row">
		
            <div class="col-md-4 offset-md-4 form">
				
				<h1 style="text-align: center;"><a href="index.html"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px;" title="This is SoFo Logo" /></a></h1>
				
				<br>
				
				<h2 class="text-align: center;">Request Songs</h2>
						
                <p class="text-align: center;">Please enter the song's information</p>
			
				<?php
					if(isset($_SESSION['success']) && $_SESSION['success'] !='')
					{
						echo '<p class="bg-success text-white"> '.$_SESSION['success'].'</p>';
						unset($_SESSION['success']);
					}

					if(isset($_SESSION['status']) && $_SESSION['status'] !='')
					{
						echo '<p class="bg-secondary text-white"> '.$_SESSION['status'].'</p>';
						unset($_SESSION['status']);
					}
				?>
			
                <form action="requestdata.php" method="POST" autocomplete="">		
					
                    <div class="form-group input-container">
					
						<i class="fa fa-music icon"></i>
						
                        <input class="form-control" type="text" name="name" placeholder="Enter song name" required>
                    </div>
					
                    <div class="form-group input-container">
					
						<i class="fa fa-book icon"></i>
						
                        <input class="form-control" type="text" name="album" placeholder="Enter album name" required>
                    </div>
					
					<div class="form-element">
					
						<div class="form-group input-container">
						
							<i class="fa fa-user icon"></i>
							
							<input class="form-control" type="text" name="artist" placeholder="Enter artist name" required>
						</div>	
							
					</div>
					
                    <div class="form-group">
                        <input class="form-control button" type="submit" onclick="submitForm()" name="submitbtn" value="Request Songs">
                    </div>
					</script>	
					
                    <div class="link login-link text-center"><a href="home.php">Back to Home Page</a></div>
                </form>
				
				<script>
				function submitForm() {
					alert("Thank you! We will check your requested songs. If the song is valid, we will update to the releasing board soon");
				}
				</script>
				
            </div>
			
        </div>
		
    </div>
	
    
</body>

</html>