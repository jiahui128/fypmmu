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
    <link rel="stylesheet" href="css/newhomepage.css">

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

    .player {
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    audio::-webkit-media-controls-panel,
    video::-webkit-media-controls-panel {
        background: url("images/cute.jpg");
    }

    .audioplayer {
        display: block;
        width: auto;
        margin: 0 auto;
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
                window.location.replace('#popup1');
                break;
            case "blackpink":
            case "how you like that":
                window.location.replace('#popup2');
                break;
            case "大籽":
            case "白月光与朱砂痣":
                window.location.replace('#popup3');
                break;
            case "zayn malik":
            case "vibez":
                window.location.replace('#popup4');
                break;
            case "yiruma":
            case "rivers flows in you":
                window.location.replace('#popup5');
                break;
            case "photograph":
            case "ed sheeran":
                window.location.replace('#popup6');
                break;
            case "love story":
            case "taylor swift":
                window.location.replace('#popup7');
                break;
            case "negaraku":
            case "pierre-jean de béranger":
                window.location.replace('#popup8');
                break;
            case "kimi ni todoke":
            case "tanizawa tomofumi":
                window.location.replace('#popup9');
                break;
            case "where you are":
            case "disney music vevo":
                window.location.replace('#popup10');
                break;
            case "everything is alright":
            case "laura shigihara":
                window.location.replace('#popup11');
                break;
            case "something there":
            case "emma watson":
            case "dans steven":
                window.location.replace('#popup12');
                break;
            case "one thousand years later":
            case "wayne lin jun jie":
                window.location.replace('#popup13');
                break;
            case "as a light smoke":
            case "iris":
            case "tomo":
                window.location.replace('#popup14');
                break;
            case "amazing grace":
            case "john newton":
                window.location.replace('#popup15');
                break;
            case "bang":
            case "bang!!!":
            case "fabulous":
            case "f△bulous":
            case "paradise":
            case "p△r△dise":
            case "bae":
            case "issa":
                window.location.replace('#popup16');
                break;
            case "Lonely":
            case "Justin Bieber, Benny Blanco":
                window.location.replace('#popup17');
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
                <a href="playlist.php">Playlist</a>
            </li>

        </ul>

    </div>

    <div style="text-align: center;">

        <br><br>

        <form class="search" style="text-transform: capitalize; text-align: center; margin: auto; max-width: 630px;"
            action="album.php" method="get" onsubmit='return redirect();'>
            <!-- pretty much the same thing except you remove the return false  !-->
            <input type="text" name="query" id="query" align="center" style="text-transform: capitalize;"
                placeholder="Type the song name or artist name" columns="2" autocomplete="off">
            <!--<input type="submit" value="" id="submit">-->
            <input type="image" src="images/search.jpg" id="submit" align="center" alt="Submit" width="45px"
                height="45px">
            <input type="hidden" name="search" value="1">
        </form>

        <br><br>

    </div>

    <div class="col-md-12" style="text-align: center;">

        <p style="font-family: Comic Sans MS; font-size: 12px;">Checkout our album to enjoy a variety of popular
            songs to fit your mood. Enjoy your music anytime, anywhere.</p>

        <br>

    </div>

    <div class="header_under"></div>
    <!--Start Container for the web content-->
    <div class="playlist_wrapper2">

        <!--<div class="submenu">

            <ul>

                <li><a href="sgpf1.php">#1</a></li>
                <li><a href="sgpf2.php">#2</a></li>
                <li><a href="sgpf3.php">#3</a></li>
                <li><a href="sgpf4.php">#4</a></li>
                <li><a href="sgpf5.php">#5</a></li>
                <li><a href="sgpf6.php">#6</a></li>
                <li><a href="sgpf7.php">#7</a></li>
                <li><a href="sgpf8.php">#8</a></li>
				<li><a href="sgpf9.php">#9</a></li>

            </ul>
			
		</div>-->

        <div class="pcontainer">

            <br>

            <h3 style="text-align: center;">Album Lists</h3>

            <br>

            <div class="row" style="text-align: center;">

                <div class="col-md-3">

                    <a href="#popup1" class="album-poster" data-switch="0">
                        <img class="songimg" src="album/fw1.jpg" alt="Fireworks">
                    </a>

                    <h4>#1 Uchiage Hanabi</h4>
                    <p>DAOKO × Kenshi Yonezu</p>

                </div>

                <div id="popup1" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Uchiage Hanabi</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/fireworks.jpg" width="100px" height="100px">
                                        <a href="sgpf1.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Fireworks</p>
                                    <p>Artist : DAOKO × Kenshi Yonezu</p>
                                    <p>Released : 2017</p>

                                    <!--<div class="player"  onclick="togglePlay(this)">
												
												<img src="images/playbutton.png" id="button" width="30px" height="30px">
												
												<audio>
													<source src="songs/fireworks.mp3" />
												</audio>
									
											</div>-->

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/fireworks.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup2" class="album-poster" data-switch="1">
                        <img class="songimg" src="album/fw2.jpg" alt="How You Like That">
                    </a>

                    <h4>#2 The Album</h4>
                    <p>Blackpink</p>

                </div>

                <div id="popup2" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>The Album</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/blackpink.jpg" width="100px" height="100px">
                                        <a href="sgpf2.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : How You Like That</p>
                                    <p>Artist : Blackpink</p>
                                    <p>Released : 2020</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/HowYouLikeThat.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup3" class="album-poster" data-switch="2">
                        <img class="songimg" src="album/fw3.jpg" alt="白月光与朱砂痣">
                    </a>

                    <h4>#3 大籽</h4>
                    <p>大籽</p>

                    <div id="popup3" class="overlay">

                        <div class="popup">

                            <a class="close" href="#">+</a>

                            <div class="content1">

                                <h3>大籽</h3>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <image src="images/白月光与朱砂痣.jpg" width="100px" height="100px">
                                            <a href="sgpf3.php">Song Profile</a>
                                    </div>

                                    <div style="font-size: 14px; color: black; text-align: left;">

                                        <br>

                                        <p>Song Name : 白月光与朱砂痣</p>
                                        <p>Artist : 大籽</p>
                                        <p>Released : 2021</p>

                                    </div>

                                    <div class="audioplayer">
                                        <p>&nbsp;</p>

                                        <audio controls>
                                            <source src="songs/白月光与朱砂痣.mp3">
                                        </audio>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup4" class="album-poster" data-switch="3">
                        <img class="songimg" src="album/fw4.jpg" alt="Vibez">
                    </a>

                    <h4>#4 Nobody is Listening</h4>
                    <p>Zayn Malik</p>

                </div>

                <div id="popup4" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>NobodyIsListening</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/vibez.jpg" width="100px" height="100px">
                                        <a href="sgpf4.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Vibez</p>
                                    <p>Artist : Zayn Malik</p>
                                    <p>Released : 2021</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/vibez.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup5" class="album-poster" data-switch="4">
                        <img class="songimg" src="album/fw5.png" alt="Rivers Flows In You">
                    </a>

                    <h4>#5 First Love</h4>
                    <p>Yiruma</p>

                </div>

                <div id="popup5" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>First Love</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/rfiy.jpg" width="100px" height="100px">
                                        <a href="sgpf5.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : River Flows in You</p>
                                    <p>Artist : Yiruma</p>
                                    <p>Released : 2001</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/riverflowsinyou.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup6" class="album-poster" data-switch="5">
                        <img class="songimg" src="album/fw6.png" alt="Photograph">
                    </a>

                    <h4>#6 X</h4>
                    <p>Ed Sheeran</p>

                </div>

                <div id="popup6" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>X</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/X.jpg" width="100px" height="100px">
                                        <a href="sgpf6.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Photograph</p>
                                    <p>Artist : Ed Sheeran</p>
                                    <p>Released : 2015</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/Photograph.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup7" class="album-poster" data-switch="6">
                        <img class="songimg" src="album/fw7.png" style="height: 250px;" alt="Love Story">
                    </a>

                    <h4>#7 Fearless</h4>
                    <p>Talyor Swift</p>

                </div>

                <div id="popup7" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Fearless</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/lovestory.png" width="100px" height="100px">
                                        <a href="sgpf7.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Love Story</p>
                                    <p>Artist : Taylor Swift</p>
                                    <p>Released : 2009</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/LoveStory.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup8" class="album-poster" data-switch="7">
                        <img class="songimg" src="album/ab4.jpg" alt="National Anthem">
                    </a>

                    <h4>#8 Malaysia Records</h4>
                    <p>Pierre-Jean de Béranger</p>

                </div>

                <div id="popup8" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Malaysia Records</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/negaraku.jpg" width="100px" height="100px">
                                        <a href="sgpf8.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Negaraku</p>
                                    <p>Artist : Pierre-Jean de Béranger</p>
                                    <p>Released : 1957</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/Negaraku.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup9" class="album-poster" data-switch="8">
                        <img class="songimg" src="album/ab1.jpg" alt="Kimi_Ni_Todoke">
                    </a>

                    <h4>#9 Kimi Ni Todoke</h4>
                    <p>Tanizawa Tomofumi</p>

                </div>

                <div id="popup9" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Kimi Ni Todoke</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/sawako.jpg" width="100px" height="100px">
                                        <a href="sgpf9.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Kimi ni Todoke</p>
                                    <p>Artist : Tanizawa Tomofumi</p>
                                    <p>Released : 2010</p>



                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/Kimi_Ni_Todoke.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup10" class="album-poster" data-switch="9">
                        <img class="songimg" src="album/ab2.jpg" alt="Moana Movie Clip">
                    </a>

                    <h4>#10 Moana</h4>
                    <p>Disney Music Vevo</p>

                </div>

                <div id="popup10" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Moana</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/moana.jpg" width="100px" height="100px">
                                        <a href="sgpf10.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Where You Are</p>
                                    <p>Artist : Disney Music Vevo</p>
                                    <p>Released : 2016</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/whereyouare.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup11" class="album-poster" data-switch="10">
                        <img class="songimg" src="album/ab3.jpg" alt="To The Moon">
                    </a>

                    <h4>#11 To the Moon</h4>
                    <p>Laura Shigihara</p>

                </div>

                <div id="popup11" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>To the Moon</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/every.jpg" width="100px" height="100px">
                                        <a href="sgpf11.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Everything's Alright</p>
                                    <p>Artist : Laura Shigihara</p>
                                    <p>Released : 2011</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/every.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup12" class="album-poster" data-switch="11">
                        <img class="songimg" src="album/ab8.jpg" style="height: 250px;" alt="Beauty and the Beast">
                    </a>

                    <h4>#12 Beauty and the Beast</h4>
                    <p>Disney Music Vevo</p>

                </div>

                <div id="popup12" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>BeautyAndTheBeast</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/beautyandthebeast.jpg" width="100px" height="100px">
                                        <a href="sgpf12.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Something There</p>
                                    <p>Artist : Disney Music Vevo</p>
                                    <p>Released : 2017</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/something.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup13" class="album-poster" data-switch="12">
                        <img class="songimg" src="album/ab5.jpg" alt="Chinese Song">
                    </a>

                    <h4>#13 Code 89757</h4>
                    <p>Wayne Lin Jun Jie</p>

                </div>

                <div id="popup13" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Code 89757</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/jjlim.jpg" width="100px" height="100px">
                                        <a href="sgpf13.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : 1000 Years Later</p>
                                    <p>Artist : Wayne Lin Jun Jie</p>
                                    <p>Released : 2011</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/onethousandyears.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup14" class="album-poster" data-switch="13">
                        <img class="songimg" src="album/ab6.jpg" style="height: 250px;" alt="Onmyoji Song">
                    </a>

                    <h4>#14 Unknown</h4>
                    <p>IRiS (Tomo)</p>

                </div>

                <div id="popup14" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>Unknown</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/yohime.jpg" width="100px" height="100px">
                                        <a href="sgpf14.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : As a Light Smoke</p>
                                    <p>Artist : IRiS (Tomo)</p>
                                    <p>Released : 2020</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/onmyoji.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup15" class="album-poster" data-switch="14">
                        <img class="songimg" src="album/ab7.jpg" alt="Amazing Grace">
                    </a>

                    <h4>#15 On A Blue Ridge Sunday</h4>
                    <p>John Newton</p>

                </div>

                <div id="popup15" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>On a <br />Blue Ridge Sunday</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/amazinggrace.jpg" width="100px" height="100px">
                                        <a href="sgpf15.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Amazing Grace</p>
                                    <p>Artist : John Newton</p>
                                    <p>Released : 2003</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/amazinggrace.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup16" class="album-poster" data-switch="14">
                        <img class="songimg" src="album/ab9.jpg" alt="Bae Paradox Live">
                    </a>

                    <h4>#16 Paradox Live</h4>
                    <p>BAE</p>

                </div>

                <div id="popup16" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content2">

                            <h3>Paradox Live</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/bae1.jpg" width="100px" height="100px">
                                        <a href="sgpf16.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : BaNG!!!</p>
                                    <p>Artist : BAE</p>
                                    <p>Released : 2019</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/bae1.mp3">
                                    </audio>

                                </div>

                                <p>_______________________________________</p>

                                <div class="col-sm-4">

                                    <br>

                                    <image src="images/bae2.jpg" width="100px" height="100px">
                                        <a href="sgpf17.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <p>&nbsp;</p>

                                    <p>Song Name : F△Bulous</p>
                                    <p>Artist : BAE</p>
                                    <p>Released : 2021</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/bae2.mp3">
                                    </audio>

                                </div>

                                <p>_______________________________________</p>

                                <div class="col-sm-4">

                                    <br>

                                    <image src="images/bae3.jpg" width="100px" height="100px">
                                        <a href="sgpf18.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <p>&nbsp;</p>

                                    <p>Song Name : P△R△DISE</p>
                                    <p>Artist : BAE &amp; ISSA</p>
                                    <p>Released : 2020</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/bae3.mp3">
                                    </audio>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-3">

                    <a href="#popup17" class="album-poster" data-switch="14">
                        <img class="songimg" src="album/ab10.jpg" alt="Lonely">
                    </a>

                    <h4>#17 JB6</h4>
                    <p>Justin Bieber, Benny Blanco</p>

                </div>
                <div id="popup17" class="overlay">

                    <div class="popup">

                        <a class="close" href="#">+</a>

                        <div class="content1">

                            <h3>JB6</h3>

                            <div class="row">

                                <div class="col-sm-4">
                                    <image src="images/lonely.png" width="100px" height="100px">
                                        <a href="sgpf19.php">Song Profile</a>
                                </div>

                                <div style="font-size: 14px; color: black; text-align: left;">

                                    <br>

                                    <p>Song Name : Lonely</p>
                                    <p>Artist : Justin Bieber, Benny Blanco</p>
                                    <p>Released : 2020</p>

                                </div>

                                <div class="audioplayer">

                                    <p>&nbsp;</p>

                                    <audio controls>
                                        <source src="songs/lonely.mp3">
                                    </audio>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--End Container-->

        <br><br>

        <!--<div id="aplayer"></div>-->

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
                {
                    name: 'Kimi Ni Todoke',
                    artist: 'Tanizawa Tomofumi',
                    url: 'songs/Kimi_Ni_Todoke.mp3',
                    cover: 'images/sawako.jpg'
                },
                {
                    name: 'Where You Are',
                    artist: 'Disney Music Vevo',
                    url: 'songs/whereyouare.mp3',
                    cover: 'images/moana.jpg',
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
                {
                    name: 'One Thousand Years Later',
                    artist: 'Wayne Lim Jun Jie',
                    url: 'songs/onethousandyears.mp3',
                    cover: 'images/jjlim.jpg',
                },
                {
                    name: 'As A Light Smoke',
                    artist: 'IRiS (Tomo)',
                    url: 'songs/onmyoji.mp3',
                    cover: 'images/yohime.jpg',
                },
                {
                    name: 'Amazing Grace',
                    artist: 'John Newton',
                    url: 'songs/amazinggrace.mp3',
                    cover: 'images/amazinggrace.jpg',
                },
                {
                    name: 'BaNG!!!',
                    artist: 'BAE',
                    url: 'songs/bae1.mp3',
                    cover: 'images/bae1.jpg',
                },
                //{
                //name: 'Lonely',
                //artist: 'Justin Bieber, Benny Blanco',
                //url: 'songs/lonely.mp3',
                //cover: 'images/lonely.png',
                //},

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

        //Album song lists to listen to song
        //function togglePlay(video) {
        //var audio = document.getElementsByTagName("audio")[0];

        //if (audio) {
        //if (audio.paused) {
        //	audio.play();
        //	document.getElementById("button").src = "images/circled-pause.png";
        //} else {
        //	audio.pause();
        //	document.getElementById("button").src = "images/playbutton.png";
        //}
        //}
        //}
        </script>

</body>

</html>