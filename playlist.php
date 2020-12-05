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

<html lang="en" >

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
	<title>SoFo - Music Player | Audio Player 🎵</title>
  
	<!-- All CSS are listed down here -->
  
	<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
	
	<meta name="apple-mobile-web-app-title" content="CodePen">

	<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

	<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
	
	<!-- Playlist Style CSS -->
	<link rel="stylesheet" href="playliststyle.css">
  
	<!-- Font Awesome CSS -->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
  
	<script>
		window.console = window.console || function(t) {};
	</script>
  
	<script>
		if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		}
	</script>

</head>

<body translate="no" >
  <!-- Tracks used in this music/audio player application are free to use. I downloaded them from Soundcloud and NCS websites. I am not the owner of these tracks. -->

    <div id="app-cover">
        <div id="bg-artwork"></div>
        <div id="bg-layer"></div>
        <div id="player">
            <div id="player-track">
                <div id="album-name"></div>
                <div id="track-name"></div>
                <div id="track-time">
                    <div id="current-time"></div>
                    <div id="track-length"></div>
                </div>
                <div id="s-area">
                    <div id="ins-time"></div>
                    <div id="s-hover"></div>
                    <div id="seek-bar"></div>
                </div>
            </div>
            <div id="player-content">
                <div id="album-art">
                    <img src="images/jjlim.jpg" class="active" id="_1">
                    <img src="images/sawako.jpg" id="_2">
                    <img src="images/moana.jpg" id="_3">
                    <img src="images/negaraku.jpg" id="_4">
                    <img src="images/beautyandthebeast.jpg" id="_5">
					<img src="images/every.jpg" id="_6">
                    <div id="buffer-box">Buffering ...</div>
                </div>
                <div id="player-controls">
                    <div class="control">
                        <div class="button" id="play-previous">
                            <i class="fas fa-backward"></i>
                        </div>
                    </div>
                    <div class="control">
                        <div class="button" id="play-pause-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="control">
                        <div class="button" id="play-next">
                            <i class="fas fa-forward"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- <a href="https://www.youtube.com/channel/UC7hSS_eujjZOEQrjsda76gA/videos" target="_blank" id="ytd-url">My YouTube Channel</a> -->

<!-- All the Javascript Codes Are Written Down Here - Including JQuery Library -->

<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<script id="rendered-js" >
$(function ()
{
	var playerTrack = $("#player-track"),bgArtwork = $('#bg-artwork'),bgArtworkUrl,albumName = $('#album-name'),trackName = $('#track-name'),albumArt = $('#album-art'),sArea = $('#s-area'),seekBar = $('#seek-bar'),trackTime = $('#track-time'),insTime = $('#ins-time'),sHover = $('#s-hover'),playPauseButton = $("#play-pause-button"),i = playPauseButton.find('i'),tProgress = $('#current-time'),tTime = $('#track-length'),seekT,seekLoc,seekBarPos,cM,ctMinutes,ctSeconds,curMinutes,curSeconds,durMinutes,durSeconds,playProgress,bTime,nTime = 0,buffInterval = null,tFlag = false,
		albums = ['Code 89757', 'Kimi ni Todoke', 'Moana', 'National Anthem', 'Beauty and the Beast', 'To The Moon'],
		trackNames = ['One Thousand Years Later - JJ Lim', 'Kimi Ni Todoke - Tanizawa Tomofumi', 'Where You Are - Disney Music Vevo', 'Lagu Negaraku - Pierre-Jean de Béranger', 'Something There - Emma Watson and Dans Steven', 'Everything is Alright - Laura Shigihara'],
		albumArtworks = ['_1', '_2', '_3', '_4', '_5', '_6'],
		trackUrl = ['songs/onethousandyears.mp3', 'songs/Kimi_Ni_Todoke.mp3', 'songs/whereyouare.mp3', 'songs/Negaraku.mp3', 'songs/something.mp3', 'songs/every.mp3'],
		playPreviousTrackButton = $('#play-previous'),
		playNextTrackButton = $('#play-next'),currIndex = -1;

	function playPause()
	{
		setTimeout(function ()
		{
			if (audio.paused)
			{
				playerTrack.addClass('active');
				albumArt.addClass('active');
				checkBuffering();
				i.attr('class', 'fas fa-pause');
				audio.play();
			} 
			
			else
			{
				playerTrack.removeClass('active');
				albumArt.removeClass('active');
				clearInterval(buffInterval);
				albumArt.removeClass('buffering');
				i.attr('class', 'fas fa-play');
				audio.pause();
			}
		}, 300);
	}

	function showHover(event)
	{
		seekBarPos = sArea.offset();
		seekT = event.clientX - seekBarPos.left;
		seekLoc = audio.duration * (seekT / sArea.outerWidth());

		sHover.width(seekT);

		cM = seekLoc / 60;

		ctMinutes = Math.floor(cM);
		ctSeconds = Math.floor(seekLoc - ctMinutes * 60);

		if (ctMinutes < 0 || ctSeconds < 0)
			return;

		if (ctMinutes < 0 || ctSeconds < 0)
			return;

		if (ctMinutes < 10)
			ctMinutes = '0' + ctMinutes;
		
		if (ctSeconds < 10)
			ctSeconds = '0' + ctSeconds;

		if (isNaN(ctMinutes) || isNaN(ctSeconds))
			insTime.text('--:--');
		
		else
			insTime.text(ctMinutes + ':' + ctSeconds);

			insTime.css({ 'left': seekT, 'margin-left': '-21px' }).fadeIn(0);

	}

	function hideHover()
	{
		sHover.width(0);
		insTime.text('00:00').css({ 'left': '0px', 'margin-left': '0px' }).fadeOut(0);
	}

	function playFromClickedPos()
	{
		audio.currentTime = seekLoc;
		seekBar.width(seekT);
		hideHover();
	}

	function updateCurrTime()
	{
		nTime = new Date();
		nTime = nTime.getTime();

		if (!tFlag)
		{
			tFlag = true;
			trackTime.addClass('active');
		}

		curMinutes = Math.floor(audio.currentTime / 60);
		curSeconds = Math.floor(audio.currentTime - curMinutes * 60);

		durMinutes = Math.floor(audio.duration / 60);
		durSeconds = Math.floor(audio.duration - durMinutes * 60);

		playProgress = audio.currentTime / audio.duration * 100;

		if (curMinutes < 10)
			curMinutes = '0' + curMinutes;
		
		if (curSeconds < 10)
			curSeconds = '0' + curSeconds;

		if (durMinutes < 10)
			durMinutes = '0' + durMinutes;
    
		if (durSeconds < 10)
			durSeconds = '0' + durSeconds;

		if (isNaN(curMinutes) || isNaN(curSeconds))
			tProgress.text('00:00');
		
		else
			tProgress.text(curMinutes + ':' + curSeconds);

		if (isNaN(durMinutes) || isNaN(durSeconds))
			tTime.text('00:00');
		
		else
			tTime.text(durMinutes + ':' + durSeconds);

		if (isNaN(curMinutes) || isNaN(curSeconds) || isNaN(durMinutes) || isNaN(durSeconds))
			trackTime.removeClass('active');
		
		else
			trackTime.addClass('active');

		seekBar.width(playProgress + '%');
		
		if (playProgress == 100)
		{
			i.attr('class', 'fa fa-play');
			seekBar.width(0);
			tProgress.text('00:00');
			albumArt.removeClass('buffering').removeClass('active');
			clearInterval(buffInterval);
		}
	}

	function checkBuffering()
	{
		clearInterval(buffInterval);
		buffInterval = setInterval(function ()
		{
			if (nTime == 0 || bTime - nTime > 1000)
			albumArt.addClass('buffering');
		
			else
			albumArt.removeClass('buffering');

			bTime = new Date();
			bTime = bTime.getTime();
		}, 100);
	}

	function selectTrack(flag)
	{
		if (flag == 0 || flag == 1)
			++currIndex;
	
		else
			--currIndex;

		if (currIndex > -1 && currIndex < albumArtworks.length)
		{
			if (flag == 0)
				i.attr('class', 'fa fa-play');
			
			else
			{
				albumArt.removeClass('buffering');
				i.attr('class', 'fa fa-pause');
			}

			seekBar.width(0);
			trackTime.removeClass('active');
			tProgress.text('00:00');
			tTime.text('00:00');

			currAlbum = albums[currIndex];
			currTrackName = trackNames[currIndex];
			currArtwork = albumArtworks[currIndex];

			audio.src = trackUrl[currIndex];

			nTime = 0;
			bTime = new Date();
			bTime = bTime.getTime();

			if (flag != 0)
			{
				audio.play();
				playerTrack.addClass('active');
				albumArt.addClass('active');

				clearInterval(buffInterval);
				checkBuffering();
			}

			albumName.text(currAlbum);
			trackName.text(currTrackName);
			albumArt.find('img.active').removeClass('active');
			$('#' + currArtwork).addClass('active');

			bgArtworkUrl = $('#' + currArtwork).attr('src');

			bgArtwork.css({ 'background-image': 'url(' + bgArtworkUrl + ')' });
		} 
		
		else
		{
			if (flag == 0 || flag == 1)
				--currIndex;
			
			else
				++currIndex;
		}
	}

	function initPlayer()
	{
		audio = new Audio();

		selectTrack(0);

		audio.loop = false;

		playPauseButton.on('click', playPause);

		sArea.mousemove(function (event) {showHover(event);});

		sArea.mouseout(hideHover);

		sArea.on('click', playFromClickedPos);

		$(audio).on('timeupdate', updateCurrTime);

		playPreviousTrackButton.on('click', function () {selectTrack(-1);});
		playNextTrackButton.on('click', function () {selectTrack(1);});
	}

	initPlayer();
	});
	
	//# sourceURL=pen.js

</script>

</body>

</html>