<?php require_once "controllerUserData.php"; ?>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS Version 3.37 and 4.4.1 -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- APlayer CSS -->
    <!-- Note : A Player (Audio Player) is a custom HTML5 Audio Player with Javascript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css" />

    <!-- Home Page CSS -->

    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/newhomepage.css">

    <!-- JQuery Library -->

    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>

    <!-- Font Header Javascript -->
    <script
        src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
    </script>

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

</head>

<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa">&#xf102;</i>
    </button>

    <div class="page-header" style="text-align: center;">

        <a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; "
                title="This is SoFo Logo" /></a>

        <ul id="header">
			
			<li><a href="http://localhost/FYP/admin/login.php">Admin Login</a></li>
            
			<li><a href="login-user.php">Login</a></li>

            <li><a href="signup-user.php">Sign Up</a></li>            

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
                <h1><span style="color: black; font-size:50px; font-style: italic; font-family: Georgia;">Welcome to
                        SoFo</span></h1>
                <!--<a href="playlist.php" id="a1">Create Playlist Now</a>-->

                <blockquote contenteditable="true"><q style="color: black;">Music is love in search of a word - Sidney
                        Lanier</q>
                    <!-- <cite style="color: black;">Sidney Lanier</cite>-->
                </blockquote>

            </div>
        </div>
        <div class="slide_img" id="banner2" style="text-align: center;">
            <img src="images/banner4.jpg">
            <label for="i1" class="pre"></label>
            <label for="i1" class="nxt"></label>
            <div class="btext">
                <h1><span style="color: black; font-size:50px; font-style: italic; font-family: Georgia;">Where Music
                        Plays</span></h1>

                <!--<a href="#popupmenu" class="MoreBtn" style="color: black;">Listen to Music Now</a>-->

                <!--<div id="popupmenu" class="overlay">
				
					<div class="popup">
								
							<a href="#" class="close">+</a>
						
							<div class="content2" style="font-size: 14px; color: black; font-weight: bold;">
									
								<img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float: center;" title="This is SoFo Logo" />
								
								<br><br>
								
								<br><br>
		
								<p style="text-align:center; color:black; font-size: 20px;">Login or Sign Up to our website to access for more features!</p>
        
								<br><br>
		
								<a class="accountbtn" href="login-user.php">&nbsp;&nbsp;Login User&nbsp;&nbsp;</a>
					
								<br><br><br>
				
								<a class="accountbtn" href="signup-user.php">Register User</a>
								
							</div>
								
					</div>
				
				</div>-->

                <blockquote contenteditable="true"><q style="font-size: 16px; color: black;">Be ready for a new whole
                        world of music</q>
                    <!-- <cite style="color: black;">Sidney Lanier</cite>-->
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
                    <img class="songimg" src="images/fireworks.jpg" style="height: 250px; object-fit: cover;"
                        alt="Fireworks">
                </a>

                <h4>Fireworks</h4>
                <p>DAOKO × Kenshi Yonezu</p>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="1">
                    <img class="songimg" src="images/blackpink.jpg" style="height: 250px; object-fit: cover;"
                        alt="How You Like That">
                </a>

                <h4>How You Like That</h4>
                <p>Blackpink</p>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="2">
                    <img class="songimg" src="images/白月光与朱砂痣.jpg" style="height: 250px; object-fit: cover;"
                        alt="白月光与朱砂痣">
                </a>

                <h4>白月光与朱砂痣</h4>
                <p>大籽</p>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="3">
                    <img class="songimg" src="images/vibez.jpg" style="height: 250px; object-fit: cover;" alt="Vibez">
                </a>

                <h4>Vibez</h4>
                <p>Zayn Malik</p>


                <br><br>

                <div style="text-align: right;">
                    <a href="#popup2" class="MoreBtn">More >></a>
                </div>

                <div id="popup2" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content2" style="font-size: 14px; color: black; font-weight: bold;">

                            <img src="images/SoFo.png" alt="SoFo Logo"
                                style="width: 270px; height: 80px; float: center;" title="This is SoFo Logo" />

                            <br><br>

                            <br><br>

                            <p style="text-align:center; color:black; font-size: 20px;">Login or Sign Up to our website
                                to access for more features!</p>

                            <br><br>

                            <a class="accountbtn" href="login-user.php">&nbsp;&nbsp;Login User&nbsp;&nbsp;</a>

                            <br><br><br>

                            <a class="accountbtn" href="signup-user.php">Register User</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div id="releasingsoon" class="col-md-12">

                <!-- New Albums are uploaded by the admins (Another webpage to add in) -->

                <h3>Releasing Soon</h3>

            </div>

            <div class="slide">
                <input type="radio" name="video" id="v1" checked>
                <input type="radio" name="video" id="v2">
                <input type="radio" name="video" id="v3">
                <div class="slide_video" id="one">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/MPIMlO_09Cw"
                        style="cursor: pointer;" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="example"
                        style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">
                        Album:
                        <br />MarBlue Original Soundtrack<br />
                        <br />Song: <br />故海潮生<br />
                        <br />Artist: <br />三无Marblue<br />
                        <br />Released: Nov 1, 2020<br />
                        <br />Requested by: Vivian Quek
                    </p>
                    <label for="v3" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
                    <label for="v2" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
                    <br><br>
                    <div style="text-align: right;margin-top:10px;">
                        <a href="#popup2" class="MoreBtn">More >></a>
                    </div>
                </div>
                <div class="slide_video" id="two">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/OxQLddxnImQ"
                        style="cursor: pointer;" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="example"
                        style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">
                        Album:
                        <br />贰拾玖区Area29<br />
                        <br />Song: <br />阿拉斯加海灣<br />
                        <br />Artist: <br />菲道尔<br />
                        <br />Released: Sep 27, 2020<br />
                        <br />Requested by: Tan Wei Chin
                    </p>
                    <label for="v1" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
                    <label for="v3" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
                    <br><br>
                    <div style="text-align: right;margin-top:10px;">
                        <a href="#popup2" class="MoreBtn">More >></a>
                    </div>
                </div>
                <div class="slide_video" id="three">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/CwkzK-F0Y00"
                        style="cursor: pointer;" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="example"
                        style="text-align: left; font-family: Garamond; font-size: 20px; font-weight: bold;float:right;">
                        Album:
                        <br />LiSA Official YouTube<br />
                        <br />Song: <br />紅蓮華<br />
                        <br />Artist: <br />LiSA<br />
                        <br />Released: May 31, 2019<br />
                        <br />Requested by: Ng Jia Hui
                    </p>
                    <label for="v2" class="p"><i style='font-size:24px' class='fas'>&#xf104;</i></label>
                    <label for="v1" class="n"><i style='font-size:24px' class='fas'>&#xf105;</i></label>
                    <br><br>

                    <div style="text-align: right;margin-top:10px;">
                        <a href="#popup2" class="MoreBtn">More >></a>
                    </div>

                    <div id="popup2" class="overlay">

                        <div class="popup">

                            <a class="close" href="#">+</a>

                            <div class="content2" style="font-size: 14px; color: black; font-weight: bold;">

                                <img src="images/SoFo.png" alt="SoFo Logo"
                                    style="width: 270px; height: 80px; float: center;" title="This is SoFo Logo" />

                                <br><br>

                                <br><br>

                                <p style="text-align:center; color:black; font-size: 20px;">Login or Sign Up to our
                                    website to access for more features!</p>

                                <br><br>

                                <a class="accountbtn" href="login-user.php">&nbsp;&nbsp;Login User&nbsp;&nbsp;</a>

                                <br><br><br>

                                <a class="accountbtn" href="signup-user.php">Register User</a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <br><br>

        <!--<div id="ourteam">
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
					
					<div style="text-align: right;">
						<a href="#popup2" class="MoreBtn">More >></a>
						
					</div>
					
					<div id="popup2" class="overlay">
						
						<div class="popup">
								
								<a class="close" href="#">+</a>
						
								<div class="content2" style="font-size: 14px; color: black; font-weight: bold;">
									
									<img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float: center;" title="This is SoFo Logo" />
								
									<br><br>
								
									<br><br>
		
									<p style="text-align:center; color:black; font-size: 20px;">Login or Sign Up to our website to access for more features!</p>
        
									<br><br>
		
									<a class="accountbtn" href="login-user.php">&nbsp;&nbsp;Login User&nbsp;&nbsp;</a>
					
									<br><br><br>
				
									<a class="accountbtn" href="signup-user.php">Register User</a>
								
								</div>
								
						</div>
					
					</div>
				
				</div>
			
			</div>-->

    </div>

    </div>

    </div>

    <br>

    <footer style="text-align: center;">
        <p>Posted By : SoFo Team</p>
        <p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
            / <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a
                href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>

        <small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights
            Reserved.</small>
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
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    //Scroll top button
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

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
    $(".album-poster").on('click', function(e) {
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
        audio: [{
                name: 'Fireworks', // SONG NAME
                artist: 'DAOKO × Kenshi Yonezu', //ARTIST NAME
                url: 'songs/fireworks.mp3', // PATH NAME AND SONG URL
                cover: 'images/fireworks.jpg',
            },
            {
                name: 'How You Like That',
                artist: 'Blackpink',
                url: 'songs/HowYouLikeThat.mp3',
                cover: 'images/blackpink.jpg',
            },
            {
                name: '白月光与朱砂痣',
                artist: '大籽',
                url: 'songs/白月光与朱砂痣.mp3',
                cover: 'images/白月光与朱砂痣.jpg',
            },
            {
                name: 'Vibez',
                artist: 'Zayn Malik',
                url: 'songs/vibez.mp3',
                cover: 'images/vibez.jpg',
            },

        ]
    });
    </script>

    <script id="rendered-js">
    function splitWords() {
        let quote = document.querySelector("blockquote q");
        quote.innerText.replace(/(<([^>]+)>)/ig, "");
        quotewords = quote.innerText.split(" "),
            wordCount = quotewords.length;
        quote.innerHTML = "";

        for (let i = 0; i < wordCount; i++) {
            if (window.CP.shouldStopExecution(0)) break;
            quote.innerHTML += "<span>" + quotewords[i] + "</span>";

            if (i < quotewords.length - 1) {
                quote.innerHTML += " ";
            }

        }
        window.CP.exitedLoop(0);

        quotewords = document.querySelectorAll("blockquote q span");
        fadeWords(quotewords);

    }

    function getRandom(min, max) {
        return Math.random() * (max - min) + min;
    }

    function fadeWords(quotewords) {
        Array.prototype.forEach.call(quotewords, function(word) {

            let animate = word.animate([{
                        opacity: 0,
                        filter: "blur(" + getRandom(2, 5) + "px)"
                    },

                    {
                        opacity: 1,
                        filter: "blur(0px)"
                    }
                ],

                {

                    duration: 1000,
                    delay: getRandom(500, 3300),
                    fill: 'forwards'
                });


        });
    }

    splitWords();
    //# sourceURL=pen.js
    </script>

</body>

</html>