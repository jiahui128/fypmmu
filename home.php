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
<html lang="en">

<head>
    
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>SoFo Music Streaming Website</title>
	
	<!-- Font Awesome (Icons) CSS -->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	
	<!-- Bootstrap CSS Version 3.37 and 4.4.1 -->
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
	<!-- APlayer CSS --> <!-- Note : A Player (Audio Player) is a custom HTML5 Audio Player with Javascript -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css"/>
	
	<!-- Home Page CSS -->
	
	<link rel="stylesheet" href="css/homepage.css">
	
	<!-- JQuery Library -->
	
	<script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
	
	<!-- Font Header Javascript -->
	<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js'></script>
	
    <!-- Favicon of the Website -->
	
	<link rel="icon" href="images/sofomusic.jpg">
    
	<!-- Text Javascript -->
	
	<script>
		window.console = window.console || function(t) {};
	</script>

	<script>
		if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		}
	</script>
	
	<style>
	
	.Dbutton {
		display: inline-block;
		text-align: center;
		vertical-align: middle;
		padding: 10px 10px;
		border: 1px solid #000000;
		border-radius: 8px;
		background: #fff2f2;
		background: -webkit-gradient(linear, left top, left bottom, from(#fff2f2), to(#a19e9e));
		background: -moz-linear-gradient(top, #fff2f2, #a19e9e);
		background: linear-gradient(to bottom, #fff2f2, #a19e9e);
		text-shadow: #591717 1px 1px 1px;
		font: normal normal bold 20px comic sans ms;
		color: #ffffff;
		text-decoration: none;
	}
	
	.Dbutton:hover,
		.button:focus {
		background: #ffffff;
		background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#c1bebe));
		background: -moz-linear-gradient(top, #ffffff, #c1bebe);
		background: linear-gradient(to bottom, #ffffff, #c1bebe);
		color: #ffffff;
		text-decoration: none;
	}

	.Dbutton:active {
		background: #999191;
		background: -webkit-gradient(linear, left top, left bottom, from(#999191), to(#a19e9e));
		background: -moz-linear-gradient(top, #999191, #a19e9e);
		background: linear-gradient(to bottom, #999191, #a19e9e);
	}
	
	.Dbutton:before{
		content:  "\0000a0";
		display: inline-block;
		height: 24px;
		width: 24px;
		line-height: 24px;
		margin: 0 4px -6px -4px;
		position: relative;
		top: 0px;
		left: 0px;
		background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABOklEQVRIibWVPU4DMRCFv1gpIqAPVNyAA1BEUNDnFhHislwAGoRCUiFFiVYIHIrM7FqOB/8oPMlae9Z+43m2Z0aA4x8xlq83HDlgUsnZCV/PGRPreA68A9vKtpS1LiaMxytg39iWiDqjhAPFzx8ywCCF4izo74ApsAvPINx9uNAivxYixSYxzyvhBQf9NtFOLPiI3MTYsJde3VXmv7Mc5CRS5KL1LY+sq5lsOUjZX4F74Ap4AL5K+R3DIW+lD8d3+y6xAesd9DylEnXAczD22BfkOIQC+wS4Ebu221L+UolegJk4m8k4K1GNg5qWPQMHrAsksPDJ4dyc5cADi0Yna+CJoSaYEp0EqatWkuxSSCY/rQcOeAMurYkFOBeeMPX3uegbeAQ+GskVPu5rBFqgW4q8wozcqskn6f8CqVV+vpABbsUAAAAASUVORK5CYII=") no-repeat left center transparent;
		background-size: 100% 100%;
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
					<i class="fa fa-account" style="color: black;">&#xf2bd;</i>
					Account
					<i class='fa fa-angle-down' style="color: black;"></i>
				</button>
				
				<div id="myDropdown" class="dropdown-content">
					<a href="profile.php"><?php echo $fetch_info['name'] ?></a>
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
			
			<li class="drop"> 
				<a href="#discover" class="dropbtn">Discover</a>
				<div class="dropdown-content">
					<a href="playlist.php">Playlist</a>
					<a href="album.php">Albums</a>
					<a href="aboutus.php">About us</a>
					<a href="requestsongs.php">Request Songs</a>
					<a href="friend-system.php">Friendlist</a>
				</div>
			</li>	
			
			<li><a href="#ourteam">Our Team</a></li>		
			
			<li><a href="#latestreleases">Latest Releases</a></li>
			
			<li><a href="#releasingsoon">Releasing Soon</a></li>
		
		</ul>
    </div>
	
	<!-- banner-->
	<div class="banner" style="text-align: center;">
		<input type="radio" name="img" id="i1" checked>
		<input type="radio" name="img" id="i2">
		<div class="slide_img" id="banner1">
				<img src="images/banner3.jpg">
				<label for="i2" class="pre"></label>
				<label for="i2" class="nxt"></label>
				<div class="btext">
				<h1><span style="color: black; font-size:50px; font-style: italic; font-family: Georgia;">Welcome to SoFo</span></h1>
				<!--<a href="playlist.php" id="a1">Create Playlist Now</a>-->
				
				<blockquote contenteditable="true"><q style="color: black;">Music is love in search of a word - Sidney Lanier</q>
					<!-- <cite style="color: black;">Sidney Lanier</cite>-->
				</blockquote>
				
				</div>
		</div>
		<div class="slide_img" id="banner2" style="text-align: center;">
				<img src="images/banner4.jpg">
				<label for="i1" class="pre"></label>
				<label for="i1" class="nxt"></label>
				<div class="btext">
				<h1><span style="color: black; font-size:50px; font-style: italic; font-family: Georgia;">Where Music Plays</span></h1>
				<a href="playlist.php" id="a1">Listen to Music Now</a>
				</blockquote>
				
				</div>
		</div>
		<div class="nav">
			<label class="dots" id="dot1" for="i1"></label>
			<label class="dots" id="dot2" for="i2"></label>
		</div>
	</div>
	
	<!--Songs-->
	<div class="container" style="text-align: center;">
			
			<div class="row">
				
				<div id="latestreleases" class="col-md-12">
					
					<br><br>
				
					<h3>Latest Releases</h3>
				
				</div>
			
				<div class="col-md-3">
					
					<a href="javascript:void();" class="album-poster" data-switch="0">
					<img class="songimg" src="images/sawako.jpg" style="height: 250px; object-fit: cover;" alt="Kimi_Ni_Todoke">
					</a>
				
					<h4>Kimi Ni Todoke</h4>
					<p>Tanizawa Tomofumi</p>
			
				</div>
			
				<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="1">
					<img class="songimg" src="images/moana.jpg" style="height: 250px; object-fit: cover;" alt="Moana Movie Clip">
					</a>
				
					<h4>Where You Are</h4>
					<p>Disney Music Vevo</p>
				
				</div>
				
				<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="2">
					<img class="songimg" src="images/every.jpg" style="height: 250px; object-fit: cover;" alt="To The Moon">
					</a>
				
					<h4>Everything&#180s Alright</h4>
					<p>Laura Shigihara</p>
				
				</div>

				<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="3">
					<img class="songimg" src="images/beautyandthebeast.jpg" style="height: 250px; object-fit: cover;" alt="Beauty and the Beast">
					</a>
				
					<h4>Something There</h4>
					<p>Disney Music Vevo</p>
					
					<br>
				
					<p style="text-align: right;">
						<a href="playlist.php" class="MoreBtn">More >></a>
					</p>
				
				</div>
			
				<!--<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="4">
					<img class="songimg" src="images/negaraku.jpg" style="height: 250px; object-fit: cover;" alt="National Anthem">
					</a>
					
					<h4>Negaraku</h4>
					<p>Pierre-Jean de Béranger</p>
				
				</div>
			
				<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="5">
					<img class="songimg" src="images/jjlim.jpg" style="height: 250px; object-fit: cover;" alt="Chinese Song">
					</a>
				
					<h4>One Thousand Years Later</h4>
					<p>JJ Lim</p>
			
				</div>
			
				<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="6">
					<img class="songimg" src="images/yohime.jpg" style="height: 250px; object-fit: cover;" alt="Onmyoji Song">
					</a>
					
					<h4>As A Light Smoke</h4>
					<p>IRiS (Tomo)</p>
				
				</div>
			
				<div class="col-md-3">
					
					<a href="#" class="album-poster" data-switch="7">
					<img class="songimg" src="images/amazinggrace.jpg" style="height: 250px; object-fit: cover;" alt="Amazing Grace">
					</a>
				
					<h4>Amazing Grace</h4>
					<p>John Newton</p>
					
					<br>
			
				</div>-->
			
			</div>

			<div class="row">
				
				<div id="releasingsoon" class="col-md-12">
				
				<!-- New Albums are uploaded by the admins (Another webpage to add in) -->
				
					<h3>Releasing Soon</h3>
			
				</div>
			
				<!--<div class="col-md-2">
					
					<a href="#" class="album-poster">
					<img class="songimg" src="https://images.pexels.com/photos/1699161/pexels-photo-1699161.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					</a>
				
					<h4>This Line</h4>
				
				</div>
			
				<div class="col-md-2">
					
					<a href="#" class="album-poster">
					<img class="songimg" src="https://images.pexels.com/photos/838702/pexels-photo-838702.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					</a>
				
					<h4>Is Empty</h4>
			
				</div>
			
				<div class="col-md-2">
				
					<a href="#" class="album-poster">
					<img class="songimg" src="https://images.pexels.com/photos/894156/pexels-photo-894156.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					</a>
				
					<h4>Don't Know</h4>
			
				</div>
			
				<div class="col-md-2">
				
					<a href="#" class="album-poster">
					<img class="songimg" src="https://images.pexels.com/photos/2118046/pexels-photo-2118046.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					</a>
				
					<h4>What To</h4>
			
				</div>
			
				<div class="col-md-2" class="album-poster">
				
					<a href="#" class="album-poster">
					<img class="songimg" src="https://images.pexels.com/photos/1735240/pexels-photo-1735240.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					</a>
				
					<h4>Write Here</h4>
			
				</div>
			
				<div class="col-md-2">
					
					<a href="#" class="album-poster">
					<img class="songimg" src="https://images.pexels.com/photos/2272854/pexels-photo-2272854.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
					</a>
				
					<h4>From Vivian</h4>
				
				</div>-->
				
				<div class="slide">
					<input type="radio" name="video" id="v1" checked>
					<input type="radio" name="video" id="v2">
					<input type="radio" name="video" id="v3">
					<input type="radio" name="video" id="v4">
					<div class="slide_video" id="one">	
						<iframe width="560" height="315" src="https://www.youtube.com/embed/MPIMlO_09Cw" style="cursor: pointer;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<p class="example" style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">Album: 
							<br />MarBlue Original Soundtrack<br />
							<br />Song: <br />故海潮生<br />
							<br />Artist: <br />三无Marblue<br />
							<br />Released: Nov 1, 2020<br />
							<br />Requested by: Vivian Quek
						</p>
						<label for="v4" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
						<label for="v2" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
					</div>
					<div class="slide_video" id="two">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/OxQLddxnImQ" style="cursor: pointer;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<p class="example" style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">Album: 
							<br />贰拾玖区Area29<br />
							<br />Song: <br />阿拉斯加海灣<br />
							<br />Artist: <br />菲道尔<br />
							<br />Released: Sep 27, 2020<br />
							<br />Requested by: Tan Wei Chin
						</p>
						<label for="v1" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
						<label for="v3" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
					</div>
					<div class="slide_video" id="three">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/CwkzK-F0Y00" style="cursor: pointer;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<p class="example" style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">Album: 
							<br />LiSA Official YouTube<br />
							<br />Song: <br />紅蓮華<br />
							<br />Artist: <br />LiSA<br />
							<br />Released: May 31, 2019<br />
							<br />Requested by: Ng Jia Hui
						</p>
						<label for="v2" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
						<label for="v4" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
					</div>		
					<div class="slide_video" id="four">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/JGwWNGJdvx8" style="cursor: pointer;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<p class="example" style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">Album: 
							<br />÷<br />
							<br />Song: <br />Shape of You<br />
							<br />Artist: <br />Ed Sheeran<br />
							<br />Released: Jan 30, 2017<br />
							<br />Requested by: Tan Wei Chin
						</p>
						<label for="v3" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
						<label for="v1" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
					</div>	
				</div>
			
			</div>
			
			<br><br>
			
			<div id="ourteam">

			<div class="col-md-12">
						
					
					<h3>Our Team</h3>
			
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
					
					<br><br><br>
				
					<p style="text-align: right;">
						<a href="aboutus.php" class="MoreBtn">More >></a>
					</p>
				
				</div>
			
			</div>
		
		</div>
		
		<br><br>
		
		<div class="row">
				
				<div id="discover" class="col-md-12">
				
				<!-- New Albums are uploaded by the admins (Another webpage to add in) -->
				
					<h3>Discover</h3>
					
					<div><a class="Dbutton" href="playlist.php">Playlists</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="Dbutton" href="album.php">Albums</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="Dbutton" href="aboutus.php">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="Dbutton" href="requestsongs.php">Request Songs</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="Dbutton" href="friend-system.php">Friend List</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="Dbutton" href="feedback.php">Feedback</a></div>
			
				</div>
			
			
		</div>
	
	</div>

	</div>
	
	<footer style="text-align: center;">
			<p>Posted By : SoFo Team</p>
			<p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
			/ <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>
		
			<small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights Reserved.</small>
	</footer>
		
	<!-- Jquery Link -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	
	<!-- Bootstrap Link -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	<!-- APlayer Jquery link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>	
	
	<div id="aplayer"></div>
		
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
		$(".album-poster").on('click', function(e){
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
		        name: 'Kimi Ni Todoke', // SONG NAME
		        artist: 'Tanizawa Tomofumi', //ARTIST NAME
		        url: 'songs/Kimi_Ni_Todoke.mp3', // PATH NAME AND SONG URL
		        cover: 'images/sawako.jpg'
		    },
			{
		        name: 'Where You Are',  
		        artist: 'Disney Music Vevo', 
		        url: 'songs/whereyouare.mp3', 
		        cover: 'images/moana.jpg' 
		    },
			{
				name: 'Everything is Alright',
				artist: 'Laura Shigihara',
				url: 'songs/every.mp3',
				cover: 'images/every.jpg',
			},
			{
				name: 'Something There',
				artist: 'Disney Music Vevo',
				url: 'songs/something.mp3',
				cover: 'images/beautyandthebeast.jpg',
			},

		    ]
		});
	
	</script>
	
	<script id="rendered-js" >
		function splitWords() {
			let quote = document.querySelector("blockquote q");
			quote.innerText.replace(/(<([^>]+)>)/ig, "");
			quotewords = quote.innerText.split(" "),
			wordCount = quotewords.length;
			quote.innerHTML = "";
  
			for (let i = 0; i < wordCount; i++) {if (window.CP.shouldStopExecution(0)) break;
				quote.innerHTML += "<span>" + quotewords[i] + "</span>";
    
				if (i < quotewords.length - 1) {
					quote.innerHTML += " ";
				}
			
			}window.CP.exitedLoop(0);
  
		quotewords = document.querySelectorAll("blockquote q span");
		fadeWords(quotewords);
	
		}

		function getRandom(min, max) {
		return Math.random() * (max - min) + min;
	}

	function fadeWords(quotewords) {
		Array.prototype.forEach.call(quotewords, function (word) {
    
		let animate = word.animate([{
			opacity: 0,
			filter: "blur(" + getRandom(2, 5) + "px)" },
		
		{
			opacity: 1,
			filter: "blur(0px)" }],

		{
			
			duration: 1000,
			delay: getRandom(500, 3300),
			fill: 'forwards' });


		});
	}

	splitWords();
	//# sourceURL=pen.js
    </script>
	
</body>

</html>