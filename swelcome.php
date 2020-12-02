<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: slogin.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
	<title>Welcome to SoFo</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	
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
			background:#b7a7c7;
			border-color:#b7a7c7;
		}
		.btext #a2:hover
		{
			background:#3c3c;
			border:1px solid #3c3c3c;
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
    </style>
    
</head>

<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<i class="fa">&#xf102;</i>
	</button>
	
	<div class="page-header">
		<a href="index.html"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; " title="This is SoFo Logo" /></a>
		<ul id="header">
			<li><div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">
					<i class="far">&#xf2bd;</i>
					<b style="margin:0px 5px 15px 5px; font-size:20px; color:white;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
					<i class='fas fa-angle-down'></i>
				</button>
				<div id="myDropdown" class="dropdown-content">
					<a href="slogout.php">Log Out</a>
					<a href="sreset.php">Reset Your Password</a>
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
				<img src="images/banner1.jpg">
				<label for="i2" class="pre"></label>
				<label for="i2" class="nxt"></label>
				<div class="btext">
				<h1><span style="color:#abc; font-size:50px;"><i class="fa fa-music"></i>SoFo</span> Just For You!</h1>
				<a href="#" id="a1">Download Now</a>
				</div>
		</div>
		<div class="slide_img" id="banner2">
				<img src="images/banner2.jpg" style="width:1345px;">
				<label for="i1" class="pre"></label>
				<label for="i1" class="nxt"></label>
				<div class="btext">
				<h2>Let Soul To Music Now</h2>
				<a href="#" id="a2">Try Now</a>
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
											<b class="s">Song 1</b>
											<br>
											<strong>Album</strong>: Title &nbsp;|&nbsp; <strong>Type</strong>: Rock &nbsp;|&nbsp; <strong>Singer</strong>: Dawn
											<span id="icon"><a href="#"><i class="fa fa-pause"></i></a>
											<a href="#"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								<li>
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Song 2</b>
											<br>
											<strong>Album</strong>: Title &nbsp;|&nbsp; <strong>Type</strong>: Rock &nbsp;|&nbsp; <strong>Singer</strong>: Dawn
											<span id="icon"><a href="#"><i class="fa fa-pause"></i></a>
											<a href="#"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								<li>
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Song 3</b>
											<br>
											<strong>Album</strong>: Title &nbsp;|&nbsp; <strong>Type</strong>: Rock &nbsp;|&nbsp; <strong>Singer</strong>: Dawn
											<span id="icon"><a href="#"><i class="fa fa-pause"></i></a>
											<a href="#"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								<li>
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Song 4</b>
											<br>
											<strong>Album</strong>: Title &nbsp;|&nbsp; <strong>Type</strong>: Rock &nbsp;|&nbsp; <strong>Singer</strong>: Dawn
											<span id="icon"><a href="#"><i class="fa fa-pause"></i></a>
											<a href="#"><i class="fa fa-play"></i></a></span>
										</p>
									</div>
								</li>
								<li>
								<!-- song information -->
									<div class="n">
										<p>
											<b class="s">Song 5</b>
											<br>
											<strong>Album</strong>: Title &nbsp;|&nbsp; <strong>Type</strong>: Rock &nbsp;|&nbsp; <strong>Singer</strong>: Dawn
											<span id="icon"><a href="#"><i class="fa fa-pause"></i></a>
											<a href="#"><i class="fa fa-play"></i></a></span>
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
								<h4>Perfect Melodi</h4>
								<!-- composed by -->
								<h5>By Himanshu</h5>
								<!-- paragraph -->
								<p>Lorem Ipsum has been the industry's standard dummy text ever since 1500.</p>
								<!-- button -->
								<a href="#" class="btn btn-lg btn-theme" id="playNowBtn"><i class="fa fa-play"></i>&nbsp; Play Now</a>
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
						<img class="about" src="images/aboutus.png" alt="">
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
</script>

</html>