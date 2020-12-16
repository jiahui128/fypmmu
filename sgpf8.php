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
	
    <title>Song 8 - Profile</title>
	
	<!-- Font Awesome (Icons) CSS -->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
	<!-- Bootstrap CSS Version 3.37 and 4.4.1 -->
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
	<!-- APlayer CSS --> <!-- Note : A Player (Audio Player) is a custom HTML5 Audio Player with Javascript -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css"/>
	
	<!-- Home Page CSS -->
	
	<link rel="stylesheet" href="css/homepage.css">
	
	<!-- JQuery Library -->
	
	<script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
	
    <!-- Favicon of the Website -->
	
	<link rel="icon" href="images/sofomusic.jpg">
	
	<style>
		
		#profilepicture
		{
			border-radius: 100%;
			height: 150px;
			width: 150px;
			background-size: cover;
			background-position: center;
			background-blend-mode: multiply;
			color: transparent;
			transition: all .3s ease;
			@include object-center;
		}
		
		.songprofilepic{
    		position: relative;
    		border-radius: 7px;
    		overflow: hidden;
    		box-shadow: 0 15px 35px #3d2173a1;
    		transition: all ease 0.4s;
    	}
		
    	.songprofilepic:hover{
    		box-shadow: none;
    		transform: scale(0.98) translateY(5px);
    	}

	</style>
	
</head>

<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<i class="fa">&#xf102;</i>
	</button>
	
	<div class="page-header" style="text-align: center;">
	
		<a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; " title="This is SoFo Logo" /></a>

		<ul id="header">
		
			<li style="font-size: 14px; color: white; font-weight: bold;"><div class="dropdown">
				
				<button onclick="myFunction()" class="dropbtn">
					<i class="fa fa-account" style="font-size: 18px; color: black; text-align: center;">&#xf2bd;</i>
					Account
					<i class='fa fa-angle-down' style="font-size: 18px; color: black; text-align: center;"></i>
				</button>
				
				<div id="myDropdown" class="dropdown-content">
					<a href="profile.php"><?php echo $fetch_info['name'] ?></a>
					<a href="feedback.php">Feedback</a>
					<a href="home.php">Back to Home</a>
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
			<a href="javascript:void();" class="songprofilepic" data-switch="0"><img id="profilepicture" src="images/amazinggrace.jpg"></a>
				
			<p class="example" style="font-family: Garamond; font-weight: bold;">Click here for music <i class='fa fa-arrow-up'></i></p>
				
			<p class="example" style="font-family: Garamond; font-weight: bold;">Album:  On A Blue Ridge Sunday <br />
			Song: Amazing Grace<br />
			Artist: John Newton<br />
			Released: 2003</p>
			
			<!-- Social buttons using anchor elements and btn-primary class to style -->
            <p>
				<a class="btn btn-primary btn-xs" href="sgpf7.php" role="button">Previous</a>
                <a class="btn btn-primary btn-xs" href="playlist.php" role="button">Playlist</a>
				<!--<a class="btn btn-primary btn-xs" href="sgpf9.php" role="button">Next</a>-->
			</p>
			
			</div> <!-- End Col 1 -->
			
		</div>
	
		<!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
		<div class="col-md-8 col-sm-* col-xs-*">

		<div class="example">

        <!-- "Lead" text at top of column. -->
        <h4 class="lead" style="font-family: Garamond; font-weight: bold;">Lyrics</h4>

		<!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />

		</div>
		
		<p style="font-family: Times New Roman; font-weight: bold; text-align: center;">
			Amazing grace<br>
			How sweet the sound<br>
			That saved a wretch like me<br>
			I once was lost<br>
			But now I'm found<br>
			Was blind, but now I see<br><br>
			'Twas grace that taught<br>
			My heart to fear<br>
			And grace my Fears relieved<br>
			How precious did<br>
			That grace appear<br>
			The hour I first believed<br><br>
			Through many dangers<br>
			Toils and snares<br>
			We have already come<br>
			'Twas grace hath brought<br>
			Us safe thus far<br>
			And grace will lead us home<br><br>
			When we've been there<br>
			Ten thousand years<br>
			Bright shining as the sun<br>
			We'll have no less days to sing God's praise<br>
			Than when we first begun<br><br>
			Amazing grace<br>
			How sweet the sound<br>
			That saved a wretch like<br>
			I once was lost<br>
			But now I'm found<br>
			Was blind, but now I see<br><br>
		</p>

		</div> <!-- End column 2 -->

		</div> <!-- End row 1 -->

	</div> <!-- End main container -->
	
	<!-- Jquery Link -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	
	<!-- Bootstrap Link -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	<!-- APlayer Jquery link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>	
	
	<div id="aplayer"></div>
	
	<footer style="text-align: center;">
			<p>Posted By : SoFo Team</p>
			<p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
			/ <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>
		
			<small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights Reserved.</small>
	</footer>

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


		// NOW I CLICK album-poster TO GET CURRENT SONG ID
		$(".songprofilepic").on('click', function(e){
			var dataSwitchId = $(this).attr('data-switch');
			//console.log(dataSwitchId);

			// and now i use aplayer switch function see
			ap.list.switch(dataSwitchId); //this is static id but i use dynamic 

			// aplayer play function
			// when i click any song to play
			ap.play();

			// click to slideUp player see
			$("#aplayer").addClass('showPlayer');
		});
		
		const ap = new APlayer({
		    container: document.getElementById('aplayer'),
		    listFolded: true,
		    audio: [
		    {
		        name: 'Amazing Grace',
				artist: 'John Newton',
				url: 'songs/amazinggrace.mp3',
				cover: 'images/amazinggrace.jpg',
		    },

		    ]
		});
</script>

</html>
