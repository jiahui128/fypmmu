<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>

<!DOCTYPE html>    
<html>    

<head>    

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>SoFo Music Streaming Website</title>
	
	<!-- Font Awesome (Icons) CSS -->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
    <!-- Favicon of the Website -->
	
	<link rel="icon" href="images/sofomusic.jpg">
    
	<style>    
	body {    
		background: url("images/lightgray.png") no-repeat center center fixed; 
	}    
	
	*{
		box-sizing: border-box;  
	}
    
	input[type=text], select, textarea {    
		width: 100%;    
		padding: 12px;    
		border: 1px solid rgb(70, 68, 68);    
		border-radius: 4px;    
		resize: vertical;    
	}    

	input[type=email], select, textarea {    
		width: 100%;    
		padding: 12px;    
		border: 1px solid rgb(70, 68, 68);    
		border-radius: 4px;    
		resize: vertical;    
	}    
    
	label {    
		padding: 12px 12px 12px 0;    
		display: inline-block;    
	}    
    
	input[type=submit] {    
		background-color: rgb(37, 116, 161);    
		color: white;    
		padding: 12px 20px;    
		border: none;    
		border-radius: 4px;    
		cursor: pointer;    
		float: right;    
	}    
    
	input[type=submit]:hover {    
		background-color: #45a049;    
	}    
    
	.container {    
		border-radius: 5px;    
		background-color: #f2f2f2;    
		padding: 20px;    
	}    
    
	.col-25 {    
	float: left;    
	width: 25%;    
	margin-top: 6px;    
	}    
    
	.col-75 {    
		float: left;    
		width: 75%;    
		margin-top: 6px;    
	}    
    
	/* Clear floats after the columns */    
	.row:after {    
		content: "";    
		display: table;    
		clear: both;    
	}    
    
	/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */    
	</style>    

</head>    

<body>    

	<h2>FEED BACK FORM</h2>    
	
	<div class="container">    
 
		<form>    
		
		<div class="row">    
     
			<div class="col-25">    
      
				<label for="fname">First Name</label>    
      
			</div>    
		
			<div class="col-75">    
        
				<input type="text" id="fname" name="firstname" placeholder="Your name..">    
			
			</div>    
		
		</div>    
    
		<div class="row">    
			
			<div class="col-25">    
			
				<label for="lname">Last Name</label>    
			
			</div>    
      
			<div class="col-75">    
				
				<input type="text" id="lname" name="lastname" placeholder="Your last name..">    
      
			</div>    
   
		</div>    
   
		<div class="row">    
        
			<div class="col-25">    
        
				<label for="email">Email</label>    
			
			</div>    
        
			<div class="col-75">    
				
				<input type="email" id="email" name="mailid" placeholder="Your email address..">    
        
			</div>    
      
		</div>      
    
		<div class="row">    
     
			<div class="col-25">    
      
				<label for="feed_back">Feed Back</label>    
      
			</div>    
     
			<div class="col-75">    
       
				<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>    
			
			</div>    
   
		</div>    
    
		<div class="row">    
      
			<input type="submit" value="Submit">    
    
		</div>    
 
		</form>    

	</div>    
    
</body>   
 
</html> 