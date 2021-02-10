<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
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
					<div class="form-element">
						<div class="form-group input-container">					
						
							<i class="fa fa-key icon"></i>
                    
							<input class="form-control" id="password-field" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" placeholder="Create new password" required>
						</div>
						<div class="toggle-password">
							<i class="fa fa-eye"></i>
							<i class="fa fa-eye-slash"></i>
						</div>
								
						<div class="password-policies">
							<div class="policy-length">
							8 Characters
							</div>
							<div class="policy-number">
							Contains Number
							</div>
							<div class="policy-uppercase">
							Contains Uppercase
							</div>
							<div class="policy-special">
							Contains Special Characters
							</div>
						</div>
							
					</div>
                    
					<div class="form-element">
						<div class="form-group input-container">					
						
							<i class="fa fa-key icon"></i>
                    
							<input class="form-control" id="password-field1" type="password" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[!@#$%^&*+`~=?\|<>/]).{8,}" placeholder="Confirm your password" required>
						</div>
						<div class="toggle-password">
							<i class="fa fa-eye"></i>
							<i class="fa fa-eye-slash"></i>
						</div>
								
						<div class="password-policies">
							<div class="policy-length">
							8 Characters
							</div>
							<div class="policy-number">
							Contains Number
							</div>
							<div class="policy-uppercase">
							Contains Uppercase
							</div>
							<div class="policy-special">
							Contains Special Characters
							</div>
						</div>
							
					</div>
					
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
					
                </form>
				
            </div>
			
        </div>
		
    </div>
    
</body>
<script>
	function _id(name)
	{
		return document.getElementById(name);
	}
	function _class(name)
	{
		return document.getElementsByClassName(name);
	}
	//eye icon
	_class("toggle-password")[0].addEventListener("click",function()
	{
		_class("toggle-password")[0].classList.toggle("active");
		if(_id("password-field").getAttribute("type")=="password")
		{
			_id("password-field").setAttribute("type","text");
		}
		else
		{
			_id("password-field").setAttribute("type","password");
		}
	});
						
	_class("toggle-password")[1].addEventListener("click",function()
	{
		_class("toggle-password")[1].classList.toggle("active");
		if(_id("password-field1").getAttribute("type")=="password")
		{
			_id("password-field1").setAttribute("type","text");
		}
		else
		{
			_id("password-field1").setAttribute("type","password");
		}
	});
						
	//password-field
	_id("password-field").addEventListener("focus",function()
	{
		_class("password-policies")[0].classList.add("active");
	});
	_id("password-field").addEventListener("blur",function()
	{
		_class("password-policies")[0].classList.remove("active");
	});
	_id("password-field").addEventListener("keyup",function()
	{
		let password=_id("password-field").value;
						
		if(/[A-Z]/.test(password))
		{
			_class("policy-uppercase")[0].classList.add("active");
		}
		else
		{
			_class("policy-uppercase")[0].classList.remove("active");
		}
		if(/[0-9]/.test(password))
		{
			_class("policy-number")[0].classList.add("active");
		}
		else
		{
			_class("policy-number")[0].classList.remove("active");
		}
		if(/[^A-Za-z0-9]/.test(password))
		{
			_class("policy-special")[0].classList.add("active");
		}
		else
		{
			_class("policy-special")[0].classList.remove("active");
		}
		if(password.length>7)
		{
			_class("policy-length")[0].classList.add("active");
		}
		else
		{
			_class("policy-length")[0].classList.remove("active");
		}
		});
</script>
</html>