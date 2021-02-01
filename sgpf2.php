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

    <title>Song 2 - Profile</title>

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

    <!-- JQuery Library -->

    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>

    <!-- Favicon of the Website -->

    <link rel="icon" href="images/sofomusic.jpg">

    <style>
    #profilepicture {
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

    .songprofilepic {
        position: relative;
        border-radius: 7px;
        overflow: hidden;
        box-shadow: 0 15px 35px #3d2173a1;
        transition: all ease 0.4s;
    }

    .songprofilepic:hover {
        box-shadow: none;
        transform: scale(0.98) translateY(5px);
    }
    </style>

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

            <li style="font-size: 14px; color: white; font-weight: bold;">
                <?php
				$today = date("F j, Y");
				echo $today;
				?>
            </li>

        </ul>

    </div>

    <!--Main container. Everything must be contained within a top-level container.-->
    <div class="container-fluid">

        <!--First row (only row)-->
        <div class="row extra_margin">

            <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
            <div class="col-md-4 col-sm-12 col-xs-12">

                <!-- Div to decorate the border of the profile of the song -->
                <div class="songbox">

                    <!-- Placeholder image -->
                    <a href="javascript:void();" class="songprofilepic" style="text-align: center;" data-switch="0"><img
                            id="profilepicture" src="images/blackpink.jpg"></a>

                    <p class="example" style="text-align: left; font-family: Garamond; font-weight: bold;">Click for
                        music <i class='fa fa-arrow-up'></i></p>

                    <p class="example" style="text-align: left; font-family: Garamond; font-weight: bold;">Album: <br />
                        The Album<br />
                        Song: <br />
                        How You Like That<br />
                        Artist: <br />
                        Blackpink<br />
                        Released: 2020</p>

                    <p><i class='fa fa-download' style="text-decoration: none;">&nbsp;&nbsp;</i><a
                            href="songs/HowYouLikeThat.mp3" role="button" download
                            style="text-align: left; font-family: Garamond; font-weight: bold; text-decoration: underline;">Download
                            MP3</a></p>

                    <br>

                    <p><i class='fa fa-download' style="text-decoration: none;">&nbsp;&nbsp;</i><a
                            href="pdf/songlyrics2.pdf"
                            style="text-align: left; font-family: Garamond; font-weight: bold; text-decoration: underline;"
                            role="button" download>Download Lyrics</a></p>

                    <br>

                    <!-- Social buttons using anchor elements and btn-primary class to style -->
                    <p>
                        <a class="btn btn-primary btn-xs" href="sgpf1.php" role="button">Previous</a>
                        <a class="btn btn-primary btn-xs" href="playlist.php" role="button">Playlist</a>
                        <a class="btn btn-primary btn-xs" href="sgpf3.php" role="button">Next</a>
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

                <p style="font-family: Times New Roman; font-size: 16px; font-weight: bold; text-align: center;">
                    BLACKPINK in your area<br><br>

                    boran deusi muneojyeosseo badageul ddulhgo jeo jihakkaji<br>
                    보란 듯이 무너졌어 바닥을 뚫고 저 지하까지<br>
                    I crumbled before your eyes, hit rock bottom and sunk deeper<br>

                    ot kkeutjarak japgetdago jeo nopi du soneul ppeodeobwado<br>
                    옷 끝자락 잡겠다고 저 높이 두 손을 뻗어봐도<br>
                    To grab onto the last bit of hope, I’ve tried to reach out with both of my hands<br><br>

                    dasi kamkamhan igose Light up the sky ni du nuneul bomyeo I’ll kiss you bye<br>
                    다시 캄캄한 이곳에 Light up the sky 니 두 눈을 보며 I’ll kiss you bye<br>
                    Again in this dark place, light up the sky, while looking into your eyes, I’ll kiss you bye<br><br>

                    silkeot biuseora kkoljoheunikka ije neohui hana dul set<br>
                    실컷 비웃어라 꼴좋으니까 이제 너희 하나 둘 셋<br>
                    Laugh all you want while you still can because it’s about to be your turn 1, 2, 3<br><br>

                    Ha how you like that?<br>
                    You gon’ like that, that that that that<br>
                    That that that that<br>
                    How you like that? (Barabim barabum bumbum)<br>
                    How you like that, that that that that<br>
                    That that that that?<br><br>

                    Now look at you now look at me (uh)<br>
                    Look at you now look at me (uh), look at you now look at me<br>
                    How you like that?<br>
                    Now look at you now look at me (uh)<br>
                    Look at you now look at me (uh), look at you now look at me<br>
                    How you like that?<br><br>

                    Your girl need it all and that’s a hundred baek gae junge baek nae mokseul wonhae<br>
                    Your girl need it all and that’s a hundred 백 개 중에 백 내 몫을 원해<br>
                    Your girl need it all and that’s a hundred, 10 out of 10 I want what’s mine<br><br>

                    Karma come and get some ttakhajiman eojjeol su eoptjanha<br>
                    Karma come and get some 딱하지만 어쩔 수 없잖아<br>
                    Karma come and get some, I feel bad but there’s nothing I can do<br><br>

                    What’s up? I’m right back bangasoereul Cock back<br>
                    What’s up? I’m right back 방아쇠를 Cock back<br>
                    What’s up? I’m right back, cock back the trigger<br>
                    Plain Jane get hijacked, don’t like me? Then tell me how you like that, like that<br><br>

                    deo kamkamhan igose Shine like the stars geu misoreul ttimyeo I’ll kiss you goodbye<br>
                    더 캄캄한 이곳에 Shine like the stars 그 미소를 띠며 I’ll kiss you goodbye<br>
                    In this even darker place shine like the stars, with a smile on my face I’ll kiss you
                    goodbye<br><br>

                    silkeot biuseora kkoljoheunikka ije neohui hana dul set<br>
                    실컷 비웃어라 꼴좋으니까 이제 너희 하나 둘 셋<br>
                    Laugh all you want while you still can because it’s about to be your turn 1, 2, 3<br><br>

                    Ha how you like that?<br>
                    You gon’ like that, that that that that<br>
                    That that that that<br>
                    How you like that? (Barabim barabum bumbum)<br>
                    How you like that, that that that that<br>
                    That that that that?<br><br>

                    Now look at you now look at me (uh)<br>
                    Look at you now look at me (uh), look at you now look at me<br>
                    How you like that?<br>
                    Now look at you now look at me (uh)<br>
                    Look at you now look at me (uh), look at you now look at me<br>
                    How you like that?<br><br>

                    nalgae ilheun chaero churakhaetdeon nal<br>
                    날개 잃은 채로 추락했던 날<br>
                    The day I fell without my wings<br><br>

                    eoduun nanal soge gathyeo itdeon nal<br>
                    어두운 나날 속에 갇혀 있던 날<br>
                    Those dark days where I was trapped<br><br>

                    geuttaejjeume neon nal kkeutnaeya haesseo<br>
                    그때쯤에 넌 날 끝내야 했어<br>
                    You should’ve ended me when you had the chance<br><br>

                    Look up in the sky it’s a bird it’s a plane<br><br>

                    Yeah~<br>
                    (Bring out your boss bitch)<br>
                    Yeah~<br>
                    (BLACKPINK!)<br><br>

                    (Dumdumdum dururu dumdumdum dururu) How you like that?<br>
                    (Dumdumdum dururu dumdumdum durururu) You gon’ like that?<br>
                    (Dumdumdum dururu dumdumdum dururu) How you like that?<br>
                    (Dumdumdum dururu dumdumdum durururu)<br><br>
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
            / <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a
                href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>

        <small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights
            Reserved.</small>
    </footer>

</body>

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
$(".songprofilepic").on('click', function(e) {
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
            name: 'How You Like That',
            artist: 'Blackpink',
            url: 'songs/howyoulikethat.mp3',
            cover: 'images/blackpink.jpg',
        },

    ]
});
</script>

</html>