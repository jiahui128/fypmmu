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
	
    <title>Song 6 - Profile</title>
	
	<!-- Font Awesome (Icons) CSS -->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
	<!-- Bootstrap CSS Version 3.37 and 4.4.1 -->
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
	<!-- APlayer CSS --> <!-- Note : A Player (Audio Player) is a custom HTML5 Audio Player with Javascript -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css"/>
	
	<!-- Home Page CSS -->
	
	<link rel="stylesheet" href="css/homepage.css">
	
	<!-- JQuery Library -->
	
	<script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
	
    <!-- Favicon of the Website -->
	
	<link rel="icon" href="images/sofomusic.jpg">
	
	<style>
		
		#profilepicture
		{
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
		
		.songprofilepic{
    		position: relative;
    		border-radius: 7px;
    		overflow: hidden;
    		box-shadow: 0 15px 35px #3d2173a1;
    		transition: all ease 0.4s;
    	}
		
    	.songprofilepic:hover{
    		box-shadow: none;
    		transform: scale(0.98) translateY(5px);
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
		</ul>

    </div>
	
	<!--Main container. Everything must be contained within a top-level container.-->
	<div class="container-fluid">

    <!--First row (only row)-->
    <div class="row extra_margin">

		<!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
		<div class="col-md-4 col-sm-12 col-xs-12">

			<!-- Div to center the header image/name/social buttons -->
			<div class="text-center">
				
			<br><br><br><br><br><br><br>
				
            <!-- Placeholder image -->
			<a href="javascript:void();" class="songprofilepic" data-switch="0"><img id="profilepicture" src="images/jjlim.jpg"></a>
				
			<p class="example" style="font-family: Garamond; font-weight: bold;">Click here for music <i class='fa fa-arrow-up'></i></p>
				
			<p class="example" style="font-family: Garamond; font-weight: bold;">Album: Code 89757 Original Soundtrack<br />
			Song: One Thousand Years Later<br />
			Artist: Wayne Lim Jun Jie<br />
			Released: 2011</p>
			
			<!-- Social buttons using anchor elements and btn-primary class to style -->
            <p>
				<a class="btn btn-primary btn-xs" href="sgpf5.php" role="button">Previous</a>
                <a class="btn btn-primary btn-xs" href="playlist.php" role="button">Playlist</a>
				<a class="btn btn-primary btn-xs" href="sgpf7.php" role="button">Next</a>
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
		
		<p style="font-family: Times New Roman; font-weight: bold; text-align: center;">
			xīn tiào luàn le jié zòu <br>
			心  跳   乱   了 节  奏  <br>
			The heart beat wildly<br><br>
			mèng yě bú zì yóu <br>
			梦   也 不 自 由  <br>
			Dreams are not free<br><br>
			ài shì gè jué duì chéng nuò bù shuō <br>
			爱 是  个 绝  对  承    诺  不 说  <br>
			Love is an absolute commitment not to say<br><br>
			chēng dào yì qiān nián yǐ hòu <br>
			撑    到  一 千   年   以 后  <br>
			After a thousand years<br><br>
			fàng rèn wú nài yān mò chén āi <br>
			放   任  无 奈  淹  没 尘   埃 <br>
			Indulge but drown dust<br><br>
			wǒ zài fèi xū zhī zhōng <br>
			我 在  废  墟 之  中<br>
			I am among the ruins<br><br>
			shǒu zhe nǐ zǒu lái wō <br>
			守   着  你 走  来  喔 <br>
			Watch you come<br><br>
			wǒ de lèi guāng chéng zài bù liǎo wō <br>
			我 的 泪  光    承    载  不 了   喔 <br>
			My tears can't bear it<br><br>
			suó yǒu yì qiè nǐ yào de ài <br>
			所  有  一 切  你 要  的 爱 <br>
			All the love you need<br><br>
			yīn wèi zài yì qiān nián yǐ hòu <br>
			因  为  在  一 千   年   以 后  <br>
			Because in a thousand years<br><br>
			shì jiè záo yǐ méi yǒu wǒ <br>
			世  界  早  已 没  有  我 <br>
			The world has no me<br><br>
			wú fǎ shēn qíng wǎn zhe nǐ de shǒu <br>
			无 法 深   情   挽  着  你 的 手 <br> 
			I can't hold your hand<br><br>
			qiǎn wěn zhe nǐ é  tóu<br>
			浅   吻  着  你 额 头  <br>
			A light kiss on your forehead<br><br>
			bié děng dào yì qiān nián yǐ hòu <br>
			别  等   到  一 千   年   以 后  <br>
			Don't wait a thousand years<br><br>
			suó yǒu rén dōu yí wàng le wǒ <br>
			所  有  人  都  遗 忘   了 我 <br>
			Everyone forgot about me<br><br>
			nà shí hóng sè huáng hūn de shā mò <br>
			那 时  红   色 黄    昏  的 沙  漠 <br>
			Then the red twilight of the desert<br><br>
			néng yǒu shuí <br>
			能   有  谁   <br>
			Who can have<br><br>
			jiě kāi chán rào qiān nián de jì mò <br>
			解  开  缠   绕  千   年   的 寂 寞 <br>
			Unwinding winding millennium loneliness<br><br>
			wū wū fàng rèn wú nài yān mò chén āi <br>
			呜 呜 放   任  无 奈  淹  没 尘   埃 <br>
			Oh ~~ indulge helpless drown dust<br><br>
			wǒ zài fèi xū zhī zhōng <br>
			我 在  废  墟 之  中    <br>
			I am among the ruins<br><br>
			shǒu zhe nǐ zǒu lái wō <br>
			守   着  你 走  来  喔 <br>
			Watch you come<br><br>
			wǒ de lèi guāng chéng zài bù liǎo wō <br>
			我 的 泪  光    承    载  不 了   喔 <br>
			My tears can't bear it<br><br>
			suó yǒu yì qiè nǐ yào de ài <br>
			所  有  一 切  你 要  的 爱 <br>
			All the love you need<br><br>
			yīn wèi zài yì qiān nián yǐ hòu <br>
			因  为  在  一 千   年   以 后  <br>
			Because in a thousand years<br><br>
			shì jiè záo yǐ méi yǒu wǒ <br>
			世  界  早  已 没  有  我 <br>
			The world has no me<br><br>
			wú fǎ shēn qíng wǎn zhe nǐ de shǒu <br>
			无 法 深   情   挽  着  你 的 手  <br>
			I can't hold your hand<br><br>
			qiǎn wěn zhe nǐ é  tóu <br>
			浅   吻  着  你 额 头  <br>
			A light kiss on your forehead<br><br>
			bié děng dào yì qiān nián yǐ hòu <br>
			别  等   到  一 千   年   以 后  <br>
			Don't wait a thousand years<br><br>
			suó yǒu rén dōu yí wàng le wǒ <br>
			所  有  人  都  遗 忘   了 我 <br>
			Everyone forgot about me<br><br>
			nà shí hóng sè huáng hūn de shā mò <br>
			那 时  红   色 黄    昏  的 沙  漠 <br>
			Then the red twilight of the desert<br><br>
			néng yǒu shuí <br>
			能   有  谁   <br>
			Who can have<br><br>
			jiě kāi chán rào qiān nián de jì mò <br>
			解  开  缠   绕  千   年   的 寂 寞 <br>
			Unwinding winding millennium loneliness<br><br>
			Oh yeah oh<br>
			Oh yeah oh<br><br>
			wú fǎ shēn qíng wǎn zhe nǐ de shǒu <br>
			无 法 深   情   挽  着  你 的 手  <br>
			I can't hold your hand<br><br>
			qiǎn wěn zhe nǐ é  tóu <br>
			浅   吻  着  你 额 头  <br>
			A light kiss on your forehead<br><br>
			bié děng dào yì qiān nián yǐ hòu <br>
			别  等   到  一 千   年   以 后  <br>
			Don't wait a thousand years<br><br>
			suó yǒu rén dōu yí wàng le wǒ <br>
			所  有  人  都  遗 忘   了 我 <br>
			Everyone forgot about me<br><br>
			nà shí hóng sè huáng hūn de shā mò <br>
			那 时  红   色 黄    昏  的 沙  漠<br>
			Then the red twilight of the desert<br><br>
			néng yǒu shuí <br>
			能   有  谁   <br>
			Who can have<br><br>
			jiě kāi chán rào qiān nián de jì mò <br>
			解  开  缠   绕  千   年   的 寂 寞 <br>
			Unwinding winding millennium loneliness<br><br>
			Oh  chán rào qiān nián de jì mò <br>
			Oh  缠   绕  千   年   的 寂 寞 <br>
			Ho ~~ twine thousand years of loneliness<br><br>
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


		// NOW I CLICK album-poster TO GET CURRENT SONG ID
		$(".songprofilepic").on('click', function(e){
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
		        name: 'One Thousand Years Later',
				artist: 'Wayne Lim Jun Jie',
				url: 'songs/onethousandyears.mp3',
				cover: 'images/jjlim.jpg',
		    },

		    ]
		});
</script>

</html>
