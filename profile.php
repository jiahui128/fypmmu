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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
    <title>Account - Profile</title>
	
	<!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Main System CSS -->
	<link rel="stylesheet" href="style.css">
	
	<!-- Home Page CSS -->
	<link rel="stylesheet" href="css/homepage.css">
	
	<!-- Font Awesome JS -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
	<style>
		
		
		.extra_margin
		{
			margin-top: 10px;
		}
		
		#profilepicture
		{
			border-radius: 50%;
			height: 150px;
			width: 150px;
			background-size: cover;
			background-position: center;
			background-blend-mode: multiply;
			color: transparent;
			transition: all .3s ease;
			@include object-center;
		}

	</style>
	
</head>

<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<i class="fa">&#xf102;</i>
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
		</ul>

    </div>
	
	<!--Main container. Everything must be contained within a top-level container.-->
	<div class="container-fluid">

    <!--First row (only row)-->
    <div class="row extra_margin">

		<!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
		<div class="col-md-4 col-sm-12 col-xs-12">

			<!-- Div to center the header image/name/social buttons -->
			<div class="text-center">
				
			<br><br><br><br><br><br><br>
				
            <!-- Placeholder image -->
			<img id="profilepicture" src="images/aboutus.png" class="image-rounded">

			<br><br>

			<p><a href="#"><i class="icon-cog" style="color: black;"></i>Edit profile image</a></p>

			<!-- Header text (Person's name) -->
			<h2><?php echo $fetch_info['name'] ?></h2>
			
			<br>
			
			<!-- Social buttons using anchor elements and btn-primary class to style -->
            <p>
                <a class="btn btn-primary btn-xs" href="friend-system.html" role="button">Friend List</a>
                <a class="btn btn-primary btn-xs" href="#" role="button">Album</a>
                <a class="btn btn-primary btn-xs" href="playlist.php" role="button">Playlist</a>
            </p>
			
			<a href="change-password.php">Change Your Password</a>

			</div> <!-- End Col 1 -->
			
		</div>
	
		<!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
		<div class="col-md-8 col-sm-* col-xs-*">

		<div class="example">

        <!-- "Lead" text at top of column. -->
        <h4 class="lead">Personal Playlist</h4>

		</div>

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />
		
		<br>
		
		<h1>Contents of Profile Page In Here</h1>

		<br>

        <!-- Body text (paragraph 1) -->
        <p>
        Music is composed and performed for many purposes, ranging from aesthetic pleasure, religious or ceremonial purposes, or as an entertainment product for the marketplace.
        </p>

        <!-- Body text (paragraph 2) -->
        <p>
		When music was only available through sheet music scores, such as during the Classical and Romantic eras, music lovers would buy the sheet music of their favourite pieces and songs so that they could perform them at home on the piano.
		</p>

        <!-- Body text (paragraph 3) -->
        <p>
		With the advent of the phonograph, records of popular songs, rather than sheet music became the dominant way that music lovers would enjoy their favourite songs.
		</p>
		
        <!-- Body text (paragraph 4) -->
        <p>
		All right reserved. No part of this website may be reproduced or used in any manner without written permission of the copyright owner except for the use of quotations in a website review.
		</p>

		</div> <!-- End column 2 -->

		</div> <!-- End row 1 -->

	</div> <!-- End main container -->

</body>

<script>
// Latest Album
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
