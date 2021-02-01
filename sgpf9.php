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

    <title>Song 9 - Profile</title>

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
                            id="profilepicture" src="images/sawako.jpg"></a>

                    <p class="example" style="text-align: left; font-family: Garamond; font-weight: bold;">Click for
                        music <i class='fa fa-arrow-up'></i></p>

                    <p class="example" style="text-align: left; font-family: Garamond; font-weight: bold;">Album:
                        <br />Kimi ni Todoke Original Soundtrack<br />
                        Song: <br />Kimi ni Todoke<br />
                        Artist: <br />Tanizawa Tomofumi<br />
                        Released: 2010</p>

                    <p><i class='fa fa-download' style="text-decoration: none;">&nbsp;&nbsp;</i><a
                            href="songs/Kimi_Ni_Todoke.mp3" role="button" download
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
                    在溫和的日光下上課鈴放慢了腳步<br>
                    やさしい日だまりに チャイムがディレイする<br>
                    Yasashii hidamari ni chaimu ga direi suru<br><br>

                    撫摸著臉頰的微風 使呼吸也變得平靜<br>
                    ほほをなでる風　息吹は深くなってく<br>
                    Hoho wo naderu kaze ibuki wa fukakunatteku<br><br>

                    嘗過曲折的淚珠 想過明天的稱呼 當未來的輪廓線 漸漸與你同步<br>
                    遠まわりの涙 名前つけた明日 重なる未来色のライン<br>
                    Toomawari no namida namae tsuketa ashita kasanaru miraiiro no rain<br><br>

                    無論是這份純真的感情 還是一起縱情大笑的日子<br>
                    あどけないこんな気持ちも はじけ飛ぶほど笑い合えた日も<br>
                    Adokenai konna kimochi mo hajiketobu hodo waraiaeta hi mo<br><br>

                    我都希望永遠細心呵護下去<br>
                    大切に育てていけるように<br>
                    Taisetsu ni sodateteikeru youni<br><br>

                    帶我走過了最難過的時光 給了我數不清的第一次<br>
                    とぎれとぎれの時を越えて たくさんの初めてをくれた<br>
                    Togiretogire no toki wo koete takusan no hajimete wo kureta<br><br>

                    只想將這份心意 告訴你<br>
                    つながってゆけ とどけ<br>
                    Tsunagatteyuke todoke<br><br>

                    放學後的黃昏 望著笑著的你的背影<br>
                    放課後の夕闇 笑うきみの背中<br>
                    Houkago no yuuyami warau kimi no senaka<br><br>

                    我默默自語　品味著從未體會的心情<br>
                    ひそかなささやき 触れたことのない想いの中<br>
                    Hisokana sasayaki fureta koto no nai omoi no naka<br><br>

                    在我心中的你 與你心中的我之間<br>
                    僕の中のきみと きみの中の僕で<br>
                    Boku no naka no kimi to kimi no naka no boku de<br><br>


                    未來的輪廓線 漸漸交疊在一起<br>
                    絡まる未来色のライン<br>
                    Karamaru miraiiro no rain<br><br>

                    擁抱著雨過天晴的芬芳 懷著與夢一般的秘密心事<br>
                    雨上がりの街の匂いと 夢みたいな秘密を胸に抱いて<br>
                    Ameagari no machi no nioi to yumemitaina himitsu wo mune ni daite<br><br>

                    多少次因為有你才破涕為笑<br>
                    何度も泣きそうになってまた笑う<br>
                    Nandomo nakisou ni natte mata warau<br><br>

                    要是我能拋開重重的心緒<br>
                    考えるよりずっとはやく<br>
                    Kangaeru yori zutto hayaku<br><br>

                    飛快地撲到你的懷中該多好<br>
                    その胸に飛び込めたらいい<br>
                    Sono mune ni tobikometara ii<br><br>

                    只想將這份心意 告訴你<br>
                    つながってゆけ とどけ<br>
                    Tsunagatteyuke todoke<br><br>

                    明明面對著最在意的你<br>
                    何よりも大事なきみの前で<br>
                    Nani yori mo daijina kimi no mae de<br><br>

                    為何從前的我卻更在意自己會受傷<br>
                    傷つかないように大事にしてたのは そう自分<br>
                    Kizutsukanai youni daiji ni shiteta no wa sou jibun<br><br>

                    即使這一句話說出口就意味著再見<br>
                    その一言がもしもサヨナラのかわりになってしまっても<br>
                    Sono hitogoto ga moshimo sayonara no kawari ni natteshimattemo<br><br>

                    我也要說出　心中的一切<br>
                    ありのまま すべて<br>
                    Ari no mama subete<br><br>

                    無論是這份純真的感情 還是一起縱情大笑的日子<br>
                    あどけないこんな気持ちも はじけ飛ぶほど笑いあえた日も<br>
                    Adokenai konna kimochi mo hajiketobu hodo waraiaeta hi mo<br><br>

                    我都希望永遠細心呵護下去<br>
                    大切に育てていけるように<br>
                    Taisetsu ni sodateteikeru youni<br><br>

                    我要一點點學會長大成人<br>
                    ほんの少し大人になってく<br>
                    Honno sukoshi otona ni natteku<br><br>

                    超越只會憧憬著你的自己<br>
                    君になりたい僕を超えて<br>
                    Kimi ni naritai boku wo koete<br><br>

                    只想將這份心意<br>
                    つながってゆけ<br>
                    Tsunagatteyuke<br><br>

                    馬上將這份心意<br>
                    今すぐきみに<br>
                    Ima sugu kimi ni<br><br>

                    告訴你<br>
                    とどけ<br>
                    Todoke<br><br>
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
            name: 'Kimi Ni Todoke', // SONG NAME
            artist: 'Tanizawa Tomofumi', //ARTIST NAME
            url: 'songs/Kimi_Ni_Todoke.mp3', // PATH NAME AND SONG URL
            cover: 'images/sawako.jpg'
        },

    ]
});
</script>

</html>