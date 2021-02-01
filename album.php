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

    <title>SoFo Music Album</title>

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

    <!-- Several Pages CSS -->

    <link rel="stylesheet" type="text/css" href="css/index.css" />

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
            case 'uchiage hanabi', '1':
                window.location.replace('sgpf1.php');
                break;
            case 'The Album', '2':
                window.location.replace('sgpf2.php');
                break;
            case '大籽', '3':
                window.location.replace('sgpf3.php');
                break;
            case 'Nobody Is Listening', '4':
                window.location.replace('sgpf4.php');
                break;
            case 'First Love', '5':
                window.location.replace('sgpf5.php');
                break;
            case 'X', '6':
                window.location.replace('sgpf6.php');
                break;
            case 'Fearless', '7':
                window.location.replace('sgpf7.php');
                break;
            case 'malaysia record', '8':
                window.location.replace('sgpf8.php');
                break;

            default: //no keyword detected so we submit the form.
                return true;
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
                <a href="playlist.php">Playlist</a>
            </li>

        </ul>

    </div>

    <div style="text-align: center;">

        <br><br>

        <form class="search" style="margin: auto; max-width: 630px;" action="playlist.php" method="get"
            onsubmit='return redirect();'>
            <!-- pretty much the same thing except you remove the return false  !-->
            <input type="text" name="query" id="query" align="center"
                placeholder="Type the album name or code no, e.g. 1" columns="2" autocomplete="off" delay="1500"
                onfocus="if(this.value==this.defaultValue)this.value=''"
                onblur="if(this.value=='')this.value=this.defaultValue">
            <!--<input type="submit" value="" id="submit">-->
            <input type="image" src="images/search.jpg" id="submit" align="center" alt="Submit" width="45px"
                height="45px">
            <input type="hidden" name="search" value="1">
        </form>

        <br><br>

    </div>

    <div class="col-md-12" style="text-align: center;">

        <p style="font-family: Comic Sans MS; font-size: 12px;">Checkout our playlists to enjoy a variety of popular
            songs to fit your mood. Enjoy your music anytime, anywhere.</p>

        <br>

    </div>

    <div class="header_under"></div>
    <!--Start Container for the web content-->
    <div class="playlist_wrapper2">

        <div class="submenu">

            <ul>

                <li><a href="sgpf1.php">#1</a></li>
                <li><a href="sgpf2.php">#2</a></li>
                <li><a href="sgpf3.php">#3</a></li>
                <li><a href="sgpf4.php">#4</a></li>
                <li><a href="sgpf5.php">#5</a></li>
                <li><a href="sgpf6.php">#6</a></li>
                <li><a href="sgpf7.php">#7</a></li>
                <li><a href="sgpf7.php">#8</a></li>

            </ul>

        </div>

        <div class="pcontainer">

            <br>

            <h3 style="text-align: center;">Album Lists</h3>

            <br>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="0">
                    <img class="songimg" src="album/1.jpg" alt="DAOKO x Kenshi Yonezu">
                </a>

                <br>

                <h4 style="text-align: center;">Uchiage Hanabi</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="1">
                    <img class="songimg" src="album/ab2.png" alt="Blackpink">
                </a>

                <br>

                <h4 style="text-align: center;">The Album</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="2">
                    <img class="songimg" src="album/3.jpg" alt="大籽">
                </a>

                <br>

                <h4 style="text-align: center;">大籽</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="3">
                    <img class="songimg" src="album/4.jpg" alt="Zayn Malik">
                </a>

                <br>

                <h4 style="text-align: center;">Nobody Is Listening</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="4">
                    <img class="songimg" src="album/ab5.png" style="height: 250px;" alt="Yiruma">
                </a>

                <br>

                <h4 style="text-align: center;">First Love</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="5">
                    <img class="songimg" src="album/6.jpg" style="height: 250px;" alt="Ed Sheeran">
                </a>

                <br>

                <h4 style="text-align: center;">X</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="6">
                    <img class="songimg" src="album/ab7.png" style="height: 250px;" alt="Taylor Swift">
                </a>

                <br>

                <h4 style="text-align: center;">Fearless</h4>

            </div>

            <div class="col-md-3">

                <a href="#" class="album-poster" data-switch="7">
                    <img class="songimg" src="album/8.jpg" style="height: 250px;" alt="National Anthem">
                </a>

                <br>

                <h4 style="text-align: center;">Malaysia Records</h4>

            </div>

        </div>

    </div>
    <!--End Container-->

    <br><br>

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
            {
                name: 'River Flows In You',
                artist: 'Yiruma',
                url: 'songs/riverflowsinyou.mp3',
                cover: 'images/rfiy.jpg',
            },
            {
                name: 'Photograph',
                artist: 'Ed Sheeran',
                url: 'songs/Photograph.mp3',
                cover: 'images/X.jpg',
            },
            {
                name: 'Love Story',
                artist: 'Taylor Swift',
                url: 'songs/LoveStory.mp3',
                cover: 'images/lovestory.png',
            },
            {
                name: 'Negaraku',
                artist: 'Pierre-Jean de Béranger',
                url: 'songs/Negaraku.mp3',
                cover: 'images/negaraku.jpg',
            },


        ]
    });

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