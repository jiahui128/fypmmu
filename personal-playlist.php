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
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Personal Playlist Page</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main System CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Home Page CSS -->
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/newhomepage.css">

    <!-- profile -->
    <link rel="stylesheet" href="css/profile.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!--t Personal Playlist CSS -->

    <link rel="stylesheet" href="css/personalplaylist.css">
    <link rel="stylesheet" type="text/css" href="css/app.css" />

    <!-- Favicon of the Website -->
    <link rel="icon" href="images/sofomusic.jpg">

    <!-- Include font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Script JS -->
    <script src="script.js"></script>

</head>

<body style="background: lightgray;">

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa" style="margin:0px;">&#xf102;</i>
    </button>

    <div class="page-header">

        <a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; "
                title="This is SoFo Logo" /></a>

        <ul id="header">

            <li style="font-size: 14px; color: white; font-weight: bold;">
                <div class="dropdown">

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

            <li style="font-size: 14px; color: white; font-weight: bold;">
                <?php
        $today = date("F j, Y");
        echo $today;
        ?>
            </li>

            <li class="drop">
                <a href="#discover" class="dropbtn">Personal Info</a>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="edit-profile.php">Edit Account</a>
                    <a href="friend-system.php">Friend List</a>
                </div>
            </li>

            <li class="drop">
                <a href="#discover" class="dropbtn">Discover</a>
                <div class="dropdown-content">
                    <a href="playlist.php">Playlist</a>
                    <a href="album.php">Albums</a>
                    <a href="requestsongs.php">Request Songs</a>
                </div>
            </li>

        </ul>

    </div>

    <div class="example-container" style="background: lightgray;">
        <div class="left">
            <div id="white-player">
                <div class="white-player-top">
                    <div>
                        &nbsp;
                    </div>

                    <div class="center">
                        <span class="now-playing">Playlist</span>
                    </div>

                    <div>
                        <img src="https://521dimensions.com/img/open-source/amplitudejs/examples/dynamic-songs/show-playlist.svg"
                            class="show-playlist" />
                    </div>
                </div>

                <div id="white-player-center">
                    <img data-amplitude-song-info="cover_art_url" class="main-album-art" />

                    <div class="song-meta-data">
                        <span data-amplitude-song-info="name" class="song-name"></span>
                        <span data-amplitude-song-info="artist" class="song-artist"></span>
                    </div>

                    <div class="time-progress">
                        <div id="progress-container">
                            <input type="range" class="amplitude-song-slider" />
                            <progress id="song-played-progress" class="amplitude-song-played-progress"></progress>
                            <progress id="song-buffered-progress" class="amplitude-buffered-progress"
                                value="0"></progress>
                        </div>

                        <div class="time-container">
                            <span class="current-time">
                                <span class="amplitude-current-minutes"></span>:<span
                                    class="amplitude-current-seconds"></span>
                            </span>
                            <span class="duration">
                                <span class="amplitude-duration-minutes"></span>:<span
                                    class="amplitude-duration-seconds"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div id="white-player-controls">
                    <div class="amplitude-shuffle amplitude-shuffle-off" id="shuffle"></div>
                    <div class="amplitude-prev" id="previous"></div>
                    <div class="amplitude-play-pause" id="play-pause"></div>
                    <div class="amplitude-next" id="next"></div>
                    <div class="amplitude-repeat" id="repeat"></div>
                </div>

                <div id="white-player-playlist-container">
                    <div class="white-player-playlist-top">
                        <div>

                        </div>
                        <div>
                            <span class="queue">Queue</span>
                        </div>
                        <div>
                            <img src="https://521dimensions.com/img/open-source/amplitudejs/examples/dynamic-songs/close.svg"
                                class="close-playlist" />
                        </div>
                    </div>

                    <div class="white-player-up-next">
                        Up Next
                    </div>

                    <div class="white-player-playlist">

                        <div class="white-player-playlist-song amplitude-song-container amplitude-play-pause"
                            data-amplitude-song-index="0">

                            <img src="images/fireworks.jpg" />

                            <div class="playlist-song-meta">
                                <span class="playlist-song-name">Fireworks</span>
                                <span class="playlist-artist-album">DAOKO × Kenshi Yonezu &bull; Uchiage Hanabi</span>
                            </div>

                        </div>

                    </div>

                    <div class="white-player-playlist-controls">
                        <img data-amplitude-song-info="cover_art_url" class="playlist-album-art" />

                        <div class="playlist-controls">
                            <div class="playlist-meta-data">
                                <span data-amplitude-song-info="name" class="song-name"></span>
                                <span data-amplitude-song-info="artist" class="song-artist"></span>
                            </div>

                            <div class="playlist-control-wrapper">
                                <div class="amplitude-prev" id="playlist-previous"></div>
                                <div class="amplitude-play-pause" id="playlist-play-pause"></div>
                                <div class="amplitude-next" id="playlist-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- This can change into button to playlist.php -->

            <a href="#popup1" class="more-on-ssu">Tutorial on how to use this playlist</a>

            <div id="popup1" class="overlay">

                <div class="popup">

                    <a class="close" href="#">+</a>

                    <div class="content2" style="font-size: 14px; color: black; font-weight: bold;">

                        <img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float: center;"
                            title="This is SoFo Logo" />

                        <br><br>

                        <p style="text-align:center; color:black; text-decoration: underline; font-size: 20px;">Steps on
                            using personal playlist</p>

                        <p style="text-align:justify; color:black; font-weight: none; font-size: 16px;">1) Add playlist
                            by clicking on the button</p>

                        <img src="images/t1.jpg" alt="Tutorial 1" style="width: 300px; float: center;"
                            title="This is tutorial 1" />

                        <br><br>

                        <p style="text-align:justify; color:black; font-weight: none; font-size: 16px;">2) The selected
                            playlist will now be on the queue</p>

                        <img src="images/t2.jpg" alt="Tutorial 2" style="width: 270px; height: 350px; float: center;"
                            title="This is tutorial 2" />

                        <br><br>

                        <p style="text-align:justify; color:black; font-weight: none; font-size: 16px;">3) Enjoy your
                            music!</p>

                        <img src="images/t3.jpg" alt="Tutorial 3" style="width: 270px; height: 350px; float: center;"
                            title="This is tutorial 3" />

                        <br><br>

                        <p style="text-align:justify; color:black; font-weight: none; font-size: 16px;">4) Refresh the
                            personal playlist page to create a new playlist</p>

                        <img src="images/t4.jpg" alt="Tutorial 4" style="width: 270px; height: 350px; float: center;"
                            title="This is tutorial 4" />

                        <br><br>

                    </div>

                </div>

            </div>

            <br>

            <p><i class='fa fa-refresh' style="text-decoration: none;">&nbsp;&nbsp;</i><a
                    href="javascript:history.go(0)"
                    style="text-align: left; font-family: Garamond; font-weight: bold; text-decoration: underline;"
                    role="button">Refresh Playlist</a></p>

        </div>

        <div class="right">

            <div class="song-to-add" song-to-add="0">
                <img src="images/blackpink.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="0">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="1">
                <img src="images/白月光与朱砂痣.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="1">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="2">
                <img src="images/vibez.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="2">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="3">
                <img src="images/negaraku.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="3">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="4">
                <img src="images/rfiy.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="4">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="5">
                <img src="images/X.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="5">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="6">
                <img src="images/lovestory.png" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="6">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="7">
                <img src="images/negaraku.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="7">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="8">
                <img src="images/kero.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="8">
                    Add To Playlist
                </a>
            </div>
            <div class="song-to-add" song-to-add="9">
                <img src="images/sawako.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="9">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="10">
                <img src="images/moana.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="10">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="11">
                <img src="images/every.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="11">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="12">
                <img src="images/beautyandthebeast.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="12">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="13">
                <img src="images/jjlim.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="13">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="14">
                <img src="images/yohime.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="14">
                    Add To Playlist
                </a>
            </div>

            <div class="song-to-add" song-to-add="15">
                <img src="images/amazinggrace.jpg" style="height: 250px;">

                <a class="add-to-playlist-button" song-to-add="15">
                    Add To Playlist
                </a>
            </div>

        </div>
    </div>

    <footer style="text-align: center;">
        <p>Posted By : SoFo Team</p>
        <p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
            / <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a
                href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>

        <small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights
            Reserved.</small>
    </footer>

    <!-- partial -->
    <script src='https://cdn.jsdelivr.net/npm/amplitudejs@latest/dist/amplitude.min.js'></script>
    <script src="./script.js"></script>

</body>

<script>
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
</script>

</html>