<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
} else {
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

    <title>SoFo Music Playlist</title>

    <!-- Font Awesome (Icons) CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

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

    <!-- Favicon of the Website -->

    <link rel="icon" href="images/sofomusic.jpg">

    <style>
    form.search input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.search button {
        float: left;
        width: 20%;
        padding: 10px;
        background: grey;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.search button:hover {
        background: darkgrey;
    }

    form.search::after {
        content: "";
        clear: both;
        display: table;
    }
    </style>

    <script type='text/javascript'>
    function redirect() {
        //look for text inside the NEW textbox
        var input = document.getElementById('query').value.toLowerCase();
        switch (input) {
            case "daoko":
			case "kenshi yonezu":
			case "fireworks":
                window.location.replace('sgpf1.php');
                break;
            case "blackpink":
			case "how you like that":
                window.location.replace('sgpf2.php');
                break;
            case "大籽":
			case "白月光与朱砂痣":
                window.location.replace('sgpf3.php');
                break;
            case "zayn malik":
			case "vibez":
                window.location.replace('sgpf4.php');
                break;
            case "yiruma":
			case "rivers flows in you":
                window.location.replace('sgpf5.php');
                break;
            case "photograph":
			case "ed sheeran":
                window.location.replace('sgpf6.php');
                break;
            case "love story":
			case "taylor swift":
                window.location.replace('sgpf7.php');
                break;
            case "negaraku":
			case "pierre-jean de béranger":
                window.location.replace('sgpf8.php');
                break;
            case "kimi ni todoke":
			case "tanizawa tomofumi":
                window.location.replace('sgpf9.php');
                break;
            case "where you are":
			case "disney music vevo":
                window.location.replace('sgpf10.php');
                break;
            case "everything is alright":
			case "laura shigihara":
                window.location.replace('sgpf11.php');
                break;
            case "something there":
			case "emma watson":
			case "dans steven":
                window.location.replace('sgpf12.php');
                break;
            case "one thousand years later":
			case "wayne lin jun jie":
                window.location.replace('sgpf13.php');
                break;
            case "as a light smoke":
			case "iris":
			case "tomo":
                window.location.replace('sgpf14.php');
                break;
            case "amazing grace":
			case "john newton":
                window.location.replace('sgpf15.php');
                break;
			case "bang":
			case "bang!!!":
                window.location.replace('sgpf16.php');
                break;
			case "fabulous":
			case "f△bulous":
				window.location.replace('sgpf17.php');
                break;
			case "paradise":
			case "p△r△dise":
			case "issa":
				window.location.replace('sgpf18.php');
                break;
			case "bae":
				window.location.replace('bae.php');
                break;

            default: //no keyword detected so we submit the form.
				alert("Data not found! Please try again.");
                break;
        }
		
        return false; //don't let the form submit
    }
    </script>

</head>

<body style="background: lightgray;">

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa">&#xf102;</i>
    </button>

    <div class="page-header" style="text-align: center;">

        <a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; "
                title="This is SoFo Logo" /></a>

        <ul id="header">

            <li style="font-size: 14px; color: white; font-weight: bold;">
                <div class="dropdown">

                    <button onclick="myFunction()" class="dropbtn">
                        <i class="fa fa-account" style="color: black;">&#xf2bd;</i>
                        Account
                        <i class='fa fa-angle-down' style="color: black;"></i>
                    </button>

                    <div id="myDropdown" class="dropdown-content">
                        <a href="profile.php"><?php echo $fetch_info['name'] ?></a>
                        <a href="feedback.php">Feedback</a>
                        <a href="home.php">Back to Home</a>
                        <a href="logout-user.php">Log Out</a>
                    </div>

                </div>

            </li>

            <li style="font-size: 14px; color: white; font-weight: bold;">
                <?php
                $today = date("F j, Y");
                echo $today;
                ?>
            </li>

            <li style="font-size: 14px; color: white; font-weight: bold;">
                <a href="album.php">Album</a>
            </li>
			
			 <li style="font-size: 14px; color: white; font-weight: bold;">
                <a href="playlist.php">Playlist</a>
            </li>

        </ul>

    </div>

    <div class="main" style="text-align: center;">

        <div class="container">

            <div class="row">

                <div id="newreleases" class="col-md-12">

                    <div>

                        <br>

                        <!--<form class="search" action=""  style="margin: auto; max-width: 630px;">
							
							<input type="text" id="myText" placeholder="Search Songs, Artists, Albums, Playlists">
							
							<button type="submit" onclick="SearchBtn"><i class="fa fa-search"></i></button>
							
						</form>
						
						<script>
						
						</script>-->

                        <form class="search" style="text-transform: capitalize; text-align: center; margin: auto; max-width: 630px;" action="playlist.php" method="get" onsubmit='return redirect();'>
                        <!-- pretty much the same thing except you remove the return false  !-->
                            <input type="text" name="query" id="query" align="center" style="text-transform: capitalize;" placeholder="Type the song name or artist name" columns="2" autocomplete="off">
                            <!--<input type="submit" value="" id="submit">-->
                            <input type="image" src="images/search.jpg" id="submit" align="center" alt="Submit"
                                width="45px" height="45px">
                            <input type="hidden" name="search" value="1">
						</form>

                        <br><br>

                    </div>

                    <div class="col-md-12">

                        <p style="font-family: Comic Sans MS; font-size: 12px;">Checkout our playlists to enjoy a
                            variety of popular songs to fit your mood. Enjoy your music anytime, anywhere.</p>

                        <!-- New Albums are uploaded by the admins (Another webpage to add in) -->

                        <h3>Artist that you had searched : BAE</h3>
						
                    </div>

                </div>
				
				<div class="col-md-3">

                    <a href="sgpf16.php" class="album-poster" data-switch="0">
                        <img class="songimg" src="images/bae1.jpg" alt="BaNG!!!">
                    </a>

                    <h4>BaNG!!!</h4>
                    <p>BAE</p>

                </div>
				
				<div class="col-md-3">

                    <a href="sgpf17.php" class="album-poster" data-switch="1">
                        <img class="songimg" src="images/bae2.jpg" width="250px" height="250px" alt="F△Bulous">
                    </a>

                    <h4>F△Bulous</h4>
                    <p>BAE</p>

                </div>
				
				<div class="col-md-3">

                    <a href="sgpf18.php" class="album-poster" data-switch="2">
                        <img class="songimg" src="images/bae3.jpg" width="250px" height="250px" alt="P△R△DISE">
                    </a>

                    <h4>P△R△DISE</h4>
                    <p>BAE</p>

                </div>

            </div>

        </div>

    </div>

    <div id="aplayer"></div>

    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <!-- Bootstrap Link -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- APlayer Jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js"></script>

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
        audio: [
			{
				name: 'BaNG!!!',
				artist: 'BAE',
				url: 'songs/bae1.mp3',
				cover: 'images/bae1.jpg',
			},
			{
				name: 'F△Bulous',
				artist: 'BAE',
				url: 'songs/bae2.mp3',
				cover: 'images/bae2.jpg',
			},
			{
				name: 'P△R△DISE',
				artist: 'BAE (Feat. ISSA)',
				url: 'songs/bae3.mp3',
				cover: 'images/bae3.jpg',
			},

        ]
    });
    </script>

    <footer style="text-align: center;">
      <p>Posted By : SoFo Team</p>
        <p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
            / <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a
                href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>

        <small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights
            Reserved.</small>
    </footer>

</body>

</html>