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

    <title>Song 1 - Profile</title>

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
                    <a href="javascript:void();" class="songprofilepic" style="text-align: left;" data-switch="0"><img
                            id="profilepicture" src="images/fireworks.jpg"></a>

                    <p class="example" style="text-align: left; font-family: Garamond; font-weight: bold;">Click for
                        music <i class='fa fa-arrow-up'></i></p>

                    <p class="example" style="text-align: left; font-family: Garamond; font-weight: bold;">Album:
                        <br />Uchiage Hanabi<br />
                        Song: <br />Fireworks<br />
                        Artist: <br />DAOKO × Kenshi Yonezu<br />
                        Released: 2017
                    </p>

                    <p><i class='fa fa-download' style="text-decoration: none;">&nbsp;&nbsp;</i><a
                            href="songs/Fireworks.mp3" role="button" download
                            style="text-align: left; font-family: Garamond; font-weight: bold; text-decoration: underline;">Download
                            MP3</a></p>

                    <br>

                    <p><i class='fa fa-download' style="text-decoration: none;">&nbsp;&nbsp;</i><a
                            href="pdf/songlyrics1.pdf" role="button" download
                            style="text-align: left; font-family: Garamond; font-weight: bold; text-decoration: underline;">Download
                            Lyrics</a></p>

                    <br>

                    <!-- Social buttons using anchor elements and btn-primary class to style -->

                    <!--<a class="btn btn-primary btn-xs" href="sgpf1.php" role="button">Previous</a>-->
                    <p style="text-align: left;">
                        <a class="btn btn-primary btn-xs" href="playlist.php" role="button">Playlist</a>
                        <a class="btn btn-primary btn-xs" href="sgpf2.php" role="button">Next</a>
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
                    あの日見渡した渚を 今も思い出すんだ<br>
                    ano hi miwatashita nagisa wo ima mo omoidasun da<br>
                    那日眺望過的海岸 如今仍能憶起<br><br>

                    砂の上に刻んだ言葉 君の後ろ姿<br>
                    suna no ue ni kizanda kotoba kimi no ushiro sugata<br>
                    沙灘上刻劃下的文字 你的背影<br><br>

                    寄り返す波が 足元をよぎり何かを攫う<br>
                    yori kaesu nami ga ashimoto wo yogiri nanikawo sarau<br>
                    浪花往返 沖過腳邊帶走了些什麼<br><br>

                    夕凪の中 日暮れだけが通り過ぎて行く<br>
                    yuunagi no naka higure dake ga toori sugite yuku<br>
                    風平浪靜之中 日暮獨自溜走<br><br>

                    パッと光って咲いた 花火を見ていた<br>
                    patto hikatte saita hanabi wo miteita<br>
                    啪一聲綻放光芒 我們看著煙花<br><br>

                    きっとまだ 終わらない夏が<br>
                    kitto mada owaranai natsu ga<br>
                    還未結束的夏天 一定會將<br><br>

                    曖昧な心を 解かして繋いだ<br>
                    aimai na kokoro wo tokashite tsunaida<br>
                    曖昧的心 融化後相繫一起<br><br>

                    この夜が 続いて欲しかった<br>
                    kono yoru ga tsuzuite hoshikatta<br>
                    多希望 這個夜晚繼續下去<br><br>

                    「あと何度君と同じ花火を見られるかな」って<br>
                    ato nando kimi to onaji hanabi wo mirareru kanatte<br>
                    「還能再與你共賞幾次同樣的煙花呢」<br><br>

                    笑う顔に何ができるだろうか<br>
                    warau kao ni nani ga dekiru darouka<br>
                    為那笑臉我又能做些什麼<br><br>

                    傷つくこと 喜ぶこと 繰り返す波と情動<br>
                    kizutsuku koto yorokobu koto kurikaesu nami to joudou<br>
                    受傷 喜悅 浪來浪去與情動<br><br>

                    焦燥 最終列車の音<br>
                    shousou saishuu ressha no oto<br>
                    焦躁 末班列車的聲音<br><br>

                    何度でも 言葉にして君を呼ぶよ<br>
                    nando demo kotoba ni shite kimi wo yobuyo<br>
                    無論幾次 我都會化作話語呼喚你<br><br>

                    波間を選び もう一度<br>
                    namima wo erabi mou ichido<br>
                    待浪退時 再一次<br><br>

                    もう二度と悲しまずに済むように<br>
                    mou nidoto kanashi mazu ni sumuyou ni<br>
                    是為了讓悲傷不再繼續就此而終<br><br>

                    はっと息を飲めば 消えちゃいそうな光が<br>
                    hatto iki wo nomeba kiechai souna hikari ga<br>
                    深深倒吸一口氣 那即將消失的光芒<br><br>

                    きっとまだ 胸に住んでいた<br>
                    kitto mada mune ni sundeita<br>
                    一定仍會 久留在胸中<br><br>

                    手を伸ばせば触れた あったかい未来は<br>
                    te wo nobaseba fureta attakai mirai wa<br>
                    只要伸出手便能觸碰 那溫暖的未來<br><br>

                    ひそかに二人を見ていた<br>
                    hisoka ni futari wo miteita<br>
                    正暗中窺伺著我倆<br><br>

                    パッと花火が<br>
                    patto hanabi ga<br>
                    啪一聲煙花<br><br>

                    夜に咲いた<br>
                    yoru ni saita<br>
                    於夜裡綻放<br><br>

                    夜に咲いて<br>
                    yoru ni saite<br>
                    夜裡綻放後<br><br>

                    静かに消えた<br>
                    shizuka ni kieta<br>
                    悄悄消失無蹤<br><br>

                    離さないで<br>
                    hanasa naide<br>
                    別讓我走<br><br>

                    もう少しだけ<br>
                    mou sukoshi dake<br>
                    再一下下就好<br><br>

                    もう少しだけ<br>
                    mou sukoshi dake<br>
                    再一下下就好<br><br>

                    このままで<br>
                    kono mama de<br>
                    維持現在這樣<br><br>

                    あの日見渡した渚を 今も思い出すんだ<br>
                    ano hi miwatashita nagisa wo ima mo omoidasun da<br>
                    那日眺望過的海岸 如今仍能憶起<br><br>

                    砂の上に刻んだ言葉 君の後ろ姿<br>
                    suna no ue ni kizanda kotoba kimi no ushiro sugata<br>
                    沙灘上刻劃下的文字 你的背影<br><br>

                    パッと光って咲いた 花火を見ていた<br>
                    patto hikatte saita hanabi wo miteita<br>
                    啪一聲綻放光芒 我們看著煙花<br><br>

                    きっとまだ 終わらない夏が<br>
                    kitto mada owaranai natsu ga<br>
                    還未結束的夏天 一定會將<br><br>

                    曖昧な心を 解かして繋いだ<br>
                    aimai na kokoro wo tokashite tsunaida<br>
                    曖昧的心 融化後相繫一起<br><br>

                    この夜が 続いて欲しかった<br>
                    kono yoru ga tsuzuite hoshikatta<br>
                    多希望 這個夜晚繼續下去<br><br>
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
            name: 'Fireworks', // SONG NAME
            artist: 'DAOKO x Kenshi Yonezu', //ARTIST NAME
            url: 'songs/Fireworks.mp3', // PATH NAME AND SONG URL
            cover: 'images/fireworks.jpg'
        },

    ]
});
</script>

</html>