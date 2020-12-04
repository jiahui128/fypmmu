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
<html lang="en">

<head>
    <meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<title>Welcome to SoFo</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	
	<script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
	
	<style type="text/css">
        body
		{
			font: 14px sans-serif; 
			background: url("images/lightgray.png") no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			text-align: center;	
			height:100%;
			width:100%;
			margin:0;
		}
		
		/*scroll up btn*/
		#myBtn 
		{
			display: none;
			position: fixed;
			bottom: 20px;
			right: 30px;
			z-index: 99;
			font-size: 20px;
			border: none;
			outline: none;
			background-color: #0D98BA;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 30%;
		}
		#myBtn:hover 
		{
			background-color: #555;
		}

		/*header*/
		
		.page-header
		{
			margin:0px;
			background:grey;
			height:90px;
			width:100%;
		}
		.far
		{
			font-size:30px;
		}
		.fas
		{
			font-size:20px;
		}
		#header
		{
			list-style:none;
			float:right;
		}
		#header li
		{
			width:140px;
			height:50px;
			padding:10px;
			display:block;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			margin-right:5px;
			list-style:none;
			float:right;
			margin-top:10px;
		}
		#header li a
		{
			text-decoration:none;
			color:white;
			font-weight:bold;
			display:block;
			padding:5px;
			font-family: Comic Sans MS;
		}
		#header a:hover
		{
			background:darkgrey;
		}
		.dropbtn 
		{
			background-color:grey;
			border: none;
			cursor: pointer;
		}
		.dropbtn:hover, .dropbtn:focus 
		{
			background-color:darkgrey;
		}
		.dropdown 
		{
			position: relative;
			display: inline-block;
		}
		.dropdown-content 
		{
			display: none;
			position: absolute;
			background-color: grey;
			overflow: auto;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 100;
		}
		.dropdown-content a 
		{
			color: white;
			font-family: Comic Sans MS;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}
		.dropdown-content a:hover
		{
			background-color:darkgrey;
		}
		
		/*banner*/
		.banner
		{
			margin:0px;
			width:100%;
			position:relative;
			padding-bottom:35%;
			padding-left:0%;
		}
		.slide_img
		{
			position:absolute;
			width;100%;
			height:100%;
		}
		.slide_img img
		{
			width:100%;
			height:100%;
		}	
		.banner input[type=radio]
		{display:none;}
		.pre, .nxt
		{	
			width:7%;
			height:100%;
			position:absolute;
			top:0;
			background:rgba(88,88,88,.4);
			color:white;
			z-index:99;
			cursor:pointer;
		}
		.pre{left:0;}
		.nxt{right:0;}
		.nav
		{
			width:100%;
			height:11px;
			bottom:12%;
			position:absolute;
			text-align:center;
			z-index:99;
		}
		.dots
		{
			top:-5px;
			width:18px;
			height:18px;
			margin:0 4px;
			position:relative;
			border-radius:50%;
			display:inline-block;
			background:rgba(0,0,0,.4);
		}
		.slide_img
		{
			z-index:-1;
		}
		#i1:checked ~ #banner1,
		#i2:checked ~ #banner2
		{z-index:9;}
		
		#i1:checked ~ .nav #dot1,
		#i2:checked ~ .nav #dot2
		{background:#fff;}
		.btext
		{			
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			top:20%;
			right:20%;
			transform:transparent(-50%,-50%);
			width: 100%;
		}
		.btext a
		{
			text-decoration:none;
			display:inline-block;
			padding:10px 15px;
			color:white;
			margin-top:20px;
			border:1px solid 
		}
		.btext #a1
		{
			background:#555;
			border-color:#555;
		}
		.btext #a1:hover
		{
			background:#728FCE;
			border:1px solid #728FCE;
		}
		.btext #a2
		{
			background:#555;
			border-color:#555;
		}
		.btext #a2:hover
		{
			background#728FCE;
			border:1px solid #728FCE;
		}
		
		/*footer*/
		footer
		{
			background-color:gray;
			padding:10px;
		}
		footer a
		{
			color:white;
		}
		
		/*latest albulm*/
		.n
		{
			background-color:#fafafa;
			padding:8px 15px;
			border: 1px solid #ddd;
			margin-right:40px;
			margin-bottom:10px;
			float:right;
		}
		.s {float:left;}
		.playlist a
		{
			margin-right:10px;
			float:right;
			display: inline-block;
			font-size: 20px;
		}
		#icon{margin-left:20px;}
		.example
		{
			max-width: 450px;
			margin: 0 auto;
			margin-top: 30px;
			margin-bottom: 30px;
			text-align: center;
			letter-spacing: 0.1em;
		}
		.example h4 
		{
			font-size: 22px;
			line-height: 32px;
			text-transform: uppercase;
		}
		.example h5 
		{
			margin-top: 15px;
			margin-bottom: 20px;
			font-size: 18px;
			font-weight: 400;
			color: #aaa;
		}
		.example p 
		{
			margin-bottom: 30px;
			font-size: 15px;
			line-height: 30px;
		}
		
		/*aboutus*/
		.about
		{
			width:120px;
			high:100px;
			margin-bottom:15px;
		}
		#aboutus
		{
			margin-bottom:20px;
		}
		
		.fa {
			font-size: 20px;
			cursor: pointer;
			user-select: none;
		}

		.fa:hover {
			color: darkblue;
			transform: scale(1.2);
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
					<i class="far" style="color: black;">&#xf2bd;</i>
					<sup>Account</sup>
					<i class='fas fa-angle-down' style="color: black;"></i>
				</button>
				
				<div id="myDropdown" class="dropdown-content">
					<a href="profile.php"><?php echo $fetch_info['name'] ?></a>
					<a href="logout-user.php">Log Out</a>
				</div>
				
				</div>
			
			</li>
			
			<li><a href="#aboutus">About Us</a></li>			
			
			<li><a href="#latestalbum">Latest Album</a></li>
		
		</ul>
    </div>
	
	<!-- banner-->
	<div class="banner">
		<input type="radio" name="img" id="i1" checked>
		<input type="radio" name="img" id="i2">
		<div class="slide_img" id="banner1">
				<img src="images/banner3.jpg" style="width: 1263px; object-fit: cover;">
				<label for="i2" class="pre"></label>
				<label for="i2" class="nxt"></label>
				<div class="btext">
				<h1><span style="color: black; font-size:50px;">SoFo</span></h1>
				<a href="#" id="a1">Create Playlist Now</a>
				</div>
		</div>
		<div class="slide_img" id="banner2">
				<img src="images/banner3.jpg" style="width: 1263px; object-fit: cover;">
				<label for="i1" class="pre"></label>
				<label for="i1" class="nxt"></label>
				<div class="btext">
				<h1><span style="color: black; font-size:50px;">SoFo</span></h1>
				<a href="#" id="a1">Listen to Music Now</a>
				</div>
		</div>
		<div class="nav">
			<label class="dots" id="dot1" for="i1"></label>
			<label class="dots" id="dot2" for="i2"></label>
		</div>
	</div>
	
	<!--LatestAlbum-->
	<div style="background-color:white;">
		<div id="latestalbum">
			<!-- content -->
			<div>
				<!-- heading -->
				
				<br>
				
				<h2>Latest Album</h2>
				<hr style="border: 1px solid #ddd; width:30%;">
				<!-- paragraph -->
				<p style="font-size:20px;">Let <strong style="color:#9932CC;">Music</strong> into your <strong style="color:#9932CC;">Soul</strong></p>
			</div>
			<div style="margin-top:30px;">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="playlist">
							<ul class="list-unstyled">
							
								<li>
								
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">One Thousand Years Later</b>
											<br>
											<strong>Album</strong>: Code89757 &nbsp;|&nbsp; <strong>Type</strong>: Chinese &nbsp;|&nbsp; <strong>Singer</strong>: JJ Lim
											<audio id="myAudio" src="songs/onethousandyears.mp3" preload="auto"></audio>
											<span id="icon"><a style="text-decoration: none;" onClick="togglePlay()"><i class="fa fa-play"></i></a></span>
										</p>
										
									</div>
								</li>
							
								<li>
								
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Where You Are</b>
											<br>
											<strong>Album</strong>: Moana &nbsp;|&nbsp; <strong>Type</strong>: English &nbsp;|&nbsp; <strong>Singer</strong>: Disney Music Vevo
											<audio id="myAudio2" src="songs/whereyouare.mp3" preload="auto"></audio>
											<span id="icon"><a style="text-decoration: none;" onClick="togglePlay2()"><i onclick="myFunction(this)" class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
							
								<li>
								
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Everything's Alright</b>
											<br>
											<strong>Album</strong>: To The Moon &nbsp;|&nbsp; <strong>Type</strong>: English &nbsp;|&nbsp; <strong>Singer</strong>: Laura Shigihara
											<audio id="myAudio3" src="songs/every.mp3" preload="auto"></audio>
											<span id="icon"><a style="text-decoration: none;" onClick="togglePlay3()"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								
								<li>
								
								<!-- song information -->
								
									<div class="n">
										<p>
											<b class="s">Kimi Ni Todoke</b>
											<br>
											<strong>Album</strong>: Kimi ni Todoke &nbsp;|&nbsp; <strong>Type</strong>: Japanese &nbsp;|&nbsp; <strong>Singer</strong>: Tanizawa Tomofumi
											<audio id="myAudio4" src="songs/Kimi_Ni_Todoke.mp3" preload="auto"></audio>
											<span id="icon"><a style="text-decoration: none;" onClick="togglePlay4()"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
				
								<li>
								
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Lagu Negaraku</b>
											<br>
											<strong>Album</strong>: National Anthem &nbsp;|&nbsp; <strong>Type</strong>: Malay &nbsp;|&nbsp; <strong>Singer</strong>: Pierre-Jean de Béranger
											<audio id="myAudio5" src="songs/Negaraku.mp3" preload="auto"></audio>
											<span id="icon"><a style="text-decoration: none;" onClick="togglePlay5()"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								
								<li>
								
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Something There</b>
											<br>
											<strong>Album</strong>: Beauty and the Beast &nbsp;|&nbsp; <strong>Type</strong>: English &nbsp;|&nbsp; <strong>Singer</strong>: Disney: Emma and Dans
											<audio id="myAudio6" src="songs/something.mp3" preload="auto"></audio>
											<span id="icon"><a style="text-decoration: none;" onClick="togglePlay6()"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								
							</ul>
						</div>
						
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="example">
							<div>
								<!-- image -->
								<img src="" alt="" />
								<!-- disk image -->
								<img src="" alt="" />
								<!-- title -->
								<h4>Home</h4>
								<!-- composed by -->
								<h5>By Adriana Figueroa</h5>
								<!-- video -->
								<iframe width="420" height="315" src="https://www.youtube.com/embed/HbKrB8F0wY4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								<!-- paragraph -->
								<p>Vocal cover and original lyrics for "Home" from Undertale, feat. FamilyJules7x on guitar.</p>
								<!-- button -->
								<!--<button class="btn btn-lg btn-theme" id="play-video"><i class="fa fa-play"></i>&nbsp; Play Now</button>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="aboutus">
		<div>
			<h2>About us</h2>
			<hr style="border: 1px solid black; width:15%;">
		</div>
		<div style="margin-top:30px;">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="aboutus">
						<img class="about" src="images/aboutus.png" alt="">
						<br>
						<strong>Tan Wei Chin</strong>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="aboutus">
						<img class="about" src="images/vivian_pic.jpg" alt="">
						<br>
						<strong>Vivian Quek</strong>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="aboutus">
						<img class="about" src="images/aboutus.png" alt="">
						<br>
						<strong>Ng Jia Hui</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
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

//To listen to music
var myAudio = document.getElementById("myAudio");
var myAudio2 = document.getElementById("myAudio2");
var myAudio3 = document.getElementById("myAudio3");
var myAudio4 = document.getElementById("myAudio4");
var myAudio5 = document.getElementById("myAudio5");
var myAudio6 = document.getElementById("myAudio6");

var isPlaying = false;
var isPlaying2 = false;
var isPlaying3 = false;
var isPlaying4 = false;
var isPlaying5 = false;
var isPlaying6 = false;

//Song 1
function togglePlay() {
  isPlaying ? myAudio.pause() : myAudio.play();
};

myAudio.onplaying = function() {
  isPlaying = true;
};

myAudio.onpause = function() {
  isPlaying = false;
};

//Song 2
function togglePlay2() {
  isPlaying2 ? myAudio2.pause() : myAudio2.play();
};

myAudio2.onplaying = function() {
  isPlaying2 = true;
};

myAudio2.onpause = function() {
  isPlaying2 = false;
};

//Song 3
function togglePlay3() {
  isPlaying3 ? myAudio3.pause() : myAudio3.play();
};

myAudio3.onplaying = function() {
  isPlaying3 = true;
};

myAudio3.onpause = function() {
  isPlaying3 = false;
};

//Song 4
function togglePlay4() {
  isPlaying4 ? myAudio4.pause() : myAudio4.play();
};

myAudio4.onplaying = function() {
  isPlaying4 = true;
};

myAudio4.onpause = function() {
  isPlaying4 = false;
};

//Song 5
function togglePlay5() {
  isPlaying5 ? myAudio5.pause() : myAudio5.play();
};

myAudio5.onplaying = function() {
  isPlaying5 = true;
};

myAudio5.onpause = function() {
  isPlaying5 = false;
};

//Song 6
function togglePlay6() {
  isPlaying6 ? myAudio6.pause() : myAudio6.play();
};

myAudio6.onplaying = function() {
  isPlaying6 = true;
};

myAudio6.onpause = function() {
  isPlaying6 = false;
};

$('.fa-play').click(function() {
  $(this).toggleClass('fa-pause');
})

</script>

</html>