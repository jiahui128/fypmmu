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
    header('Location: newhome.php');
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
    <title>Account - Edit Profile</title>
	
	<!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Main System CSS -->
	<link rel="stylesheet" href="style.css">
	
	<!-- Home Page CSS -->
	<link rel="stylesheet" href="css/homepage.css">
	
	<!--profile-->
	<link rel="stylesheet" href="css/profile.css">
	
	<!-- Font Awesome JS -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
	<!-- Favicon of the Website -->
	<link rel="icon" href="images/sofomusic.jpg">
	
	<style>
	/*edit image*/
	.post_img
	{
		width:95%;
		margin-left:10px;
	}
	.img
	{
		font-size:16px;
	}
	#post_button
	{
		width: 20%;
		font-size:14px;
		padding:7px;
		border:none;
		background:#157DEC;
		float:right;
		border-radius:10px;
		color:white;
		font-style:italic;
	}
	#post_button:hover
	{
		background:#4CC417;
	}
	
	/*change password*/
	.changee
	{
		margin-left:10px;
		float:left;
		width:95%;
	}
	.pwd
	{
	    float: left;
		width: 80%;
		height: 25px;
		margin-bottom:15px;
	}
	.cfbtn
	{
		padding:7px;
		width:20%;
		color:white;
		border:none;
		background:#157DEC;
		font-style:italic;
		border-radius:10px;
		border:none;
		float:right;
		margin-top:10px;
	}
	.cfbtn:hover
	{
		background:#4CC417;
		border:none;
	}
	
	/*user info*/
	.info
	{
		
	}
	</style>
	
</head>

<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<i class="fa" style="margin:0px;">&#xf102;</i>
	</button>
	
	<div class="page-header">
	
		<a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; " title="This is SoFo Logo" /></a>

		<ul id="header">
		
			<li style="font-size: 14px; color: white; font-weight: bold;"><div class="dropdown">
				
				<button onclick="myFunction()" class="dropbtn">
					<i class="fa fa-account" style="font-size: 18px; color: black;">&#xf2bd;</i>
					Account
					<i class='fa fa-angle-down' style="font-size: 18px; color: black;"></i>
				</button>
				
				<div id="myDropdown" class="dropdown-content">
					<a href="home.php">Back to Home</a>
					<a href="feedback.php">Feedback</a>
					<a href="logout-user.php">Log Out</a>
				</div>
				
				</div>
			</li>
			
			<li style="font-size: 14px; color: white; font-weight: bold;" >
				<?php
					$today = date("F j, Y");
					echo $today;
				?>
			</li>
			
		</ul>

    </div>
	
	<div class="profile">
		<form class="fileform" method="post" enctype="multipart/form-data">
			<ul class="list">
				<li style="text-align:center;">
					<?php
						$email = $_SESSION["email"];
						$q=mysqli_query($con,"SELECT * FROM usertable WHERE email= '$email'");
						while($row=mysqli_fetch_assoc($q))
						{
							if($row['profile_image'] == "")
							{
								echo "<img id='profilepicture' class='image-rounded' src='images/aboutus.png'  alt='Default Profile Pic'>";
							}
							else
							{
								echo "<img id='profilepicture' class='image-rounded' src='uploads/".$row['profile_image']."'  alt='Profile Pic'>";					
							}
						}
					?>
					<h2 style="text-align:center;margin:10px;"><?php echo $fetch_info['name'] ?></h2>
					<hr style="width:70%;">
				</li>
				<li><a href="profile.php"><i class='far'>&#xf2bb;</i>Account Overview</a></li>
				<li><a href="edit-profile.php" id="active"><i style="margin-right:7px; font-size:20px;" class="fa">&#xf044;</i>Edit Account</a></li>
				<li><a href="friend-list.php"><i style="margin-right:5px;" class='fas'>&#xf500;</i>Friend list</a></li>
				<li><a href="personal-playlist.php"><i class='fab'>&#xf3b5;</i>Personal Playlist</a></li>
			</ul>
			<div class="word">
				<div style="width:79%;float:right;">
					<h1><b>Edit Profile</b></h1>
					<div class="post_img">
						<h4>Edit Image</h4>
						<input type="file" name="file" class="img">
						<input id="post_button" type="submit" name="change_pic" value="Change">
					</div>
					<hr style="width:95%;margin:50 0 0 5;">
					<div class="post_img">
						<h4>Edit Profile Info</h4>
						<label style="margin-right:20px;float:left;">User Name</label><input type="text" name="username" class="pwd"><br><br>
						<label style="margin-right:44px;float:left;">Gender</label><input type="text" name="gender" class="pwd"><br><br>
						<label style="margin-right:67px;float:left;">Age</label><input type="text" name="age" class="pwd"><br><br>
						<input style="margin-top:10px;" id="post_button" type="submit" name="change_info" value="Change">
					</div>
					<hr style="width:95%;margin:90 0 0 5;">
					<div class="changee">
						<h4>Change Password</h4>
						<label style="margin-right:10px;float:left;">Current Password</label><input type="password" name="curpwd" class="pwd"><br><br>
						<label style="margin-right:33px;float:left;">New Password</label><input type="password" name="newpwd" class="pwd"><br><br>
						<label style="margin-right:7px;float:left;">Confirm Password</label><input type="password" name="cpwd" class="pwd"><br><br>
						<input class="cfbtn" type="submit" name="change_pwd" value="Confirm">
						
						<br>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<br><br><br><br>
	
	<footer style="text-align: center;">
			<p>Posted By : SoFo Team</p>
			<p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
			/ <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>
		
			<small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights Reserved.</small>
	</footer>

</body>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() 
{
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) 
{
  if (!event.target.matches('.dropbtn')) 
  {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) 
	{
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) 
	  {
        openDropdown.classList.remove('show');
      }
    }
  }
}

//Scroll top button
//Get the button
var mybutton = document.getElementById("myBtn");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</html>