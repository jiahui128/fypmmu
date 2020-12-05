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
	
    <title>Account - Profile</title>
	
	<!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Main System CSS -->
	<link rel="stylesheet" href="style.css">
	
	<!-- Font Awesome JS -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
	<style>
		 body
		{
			font: 14px sans-serif; 
			background: url("images/lightgray.png") no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			text-align: center;	
			height:100%;
			width:100%;
			margin:0;
		}
		
		/*scroll up btn*/
		#myBtn 
		{
			display: none;
			position: fixed;
			bottom: 20px;
			right: 30px;
			z-index: 99;
			font-size: 20px;
			border: none;
			outline: none;
			background-color: #0D98BA;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 30%;
		}
		
		#myBtn:hover 
		{
			background-color: #555;
		}

		/*header*/
		
		.page-header
		{
			margin:0px;
			background:grey;
			height:90px;
			width:100%;
		}
		
		.far
		{
			font-size:30px;
		}
		
		.fas
		{
			font-size:20px;
		}
		
		#header
		{
			list-style:none;
			float:right;
		}
		
		#header li
		{
			width:140px;
			height:50px;
			padding:10px;
			display:block;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			margin-right:5px;
			list-style:none;
			float:right;
			margin-top:10px;
		}
		
		#header li a
		{
			text-decoration:none;
			color:white;
			font-weight:bold;
			display:block;
			padding:5px;
			font-family: Comic Sans MS;
		}
		
		#header a:hover
		{
			background:darkgrey;
		}
		
		.dropbtn 
		{
			background-color:grey;
			border: none;
			cursor: pointer;
		}
		
		.dropbtn:hover, .dropbtn:focus 
		{
			background-color:darkgrey;
		}
		
		.dropdown 
		{
			position: relative;
			display: inline-block;
		}
		
		.dropdown-content 
		{
			display: none;
			position: absolute;
			background-color: grey;
			overflow: auto;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 100;
		}
		
		.dropdown-content a 
		{
			color: white;
			font-family: Comic Sans MS;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}
		
		.dropdown-content a:hover
		{
			background-color:darkgrey;
		}
		
		/*banner*/
		.banner
		{
			margin:0px;
			width:100%;
			position:relative;
			padding-bottom:35%;
			padding-left:0%;
		}
		
		.slide_img
		{
			position:absolute;
			width;100%;
			height:100%;
		}
		
		.slide_img img
		{
			width:100%;
			height:100%;
		}	
		
		.banner input[type=radio]
		{display:none;}
		.pre, .nxt
		{	
			width:7%;
			height:100%;
			position:absolute;
			top:0;
			background:rgba(88,88,88,.4);
			color:white;
			z-index:99;
			cursor:pointer;
		}
		
		.pre{left:0;}
		.nxt{right:0;}
		.nav
		{
			width:100%;
			height:11px;
			bottom:12%;
			position:absolute;
			text-align:center;
			z-index:99;
		}
		
		.dots
		{
			top:-5px;
			width:18px;
			height:18px;
			margin:0 4px;
			position:relative;
			border-radius:50%;
			display:inline-block;
			background:rgba(0,0,0,.4);
		}
		
		.slide_img
		{
			z-index:-1;
		}
		
		#i1:checked ~ #banner1,
		#i2:checked ~ #banner2
		{z-index:9;}
		
		#i1:checked ~ .nav #dot1,
		#i2:checked ~ .nav #dot2
		{background:#fff;}
		
		.btext
		{			
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			top:20%;
			right:20%;
			transform:transparent(-50%,-50%);
			width: 100%;
		}
		
		.btext a
		{
			text-decoration:none;
			display:inline-block;
			padding:10px 15px;
			color:white;
			margin-top:20px;
			border:1px solid 
		}
		
		.btext #a1
		{
			background:#555;
			border-color:#555;
		}
		
		.btext #a1:hover
		{
			background:#728FCE;
			border:1px solid #728FCE;
		}
		
		.btext #a2
		{
			background:#b7a7c7;
			border-color:#b7a7c7;
		}
		
		.btext #a2:hover
		{
			background:#3c3c;
			border:1px solid #3c3c3c;
		}
		
		/*footer*/
		footer
		{
			background-color:gray;
			padding:10px;
		}
		
		footer a
		{
			color:white;
		}
		
		/*latest albulm*/
		.n
		{
			background-color:#fafafa;
			padding:8px 15px;
			border: 1px solid #ddd;
			margin-right:40px;
			margin-bottom:10px;
			float:right;
		}
		
		.s {float:left;}
		.playlist a
		{
			margin-right:10px;
			float:right;
			display: inline-block;
			font-size: 20px;
		}
		#icon{margin-left:20px;}
		.example
		{
			max-width: 450px;
			margin: 0 auto;
			margin-top: 30px;
			margin-bottom: 30px;
			text-align: center;
			letter-spacing: 0.1em;
		}
		
		.example h4 
		{
			font-size: 22px;
			line-height: 32px;
			text-transform: uppercase;
		}
		
		.example h5 
		{
			margin-top: 15px;
			margin-bottom: 20px;
			font-size: 18px;
			font-weight: 400;
			color: #aaa;
		}
		
		.example p 
		{
			margin-bottom: 30px;
			font-size: 15px;
			line-height: 30px;
		}
		
		/*aboutus*/
		.about
		{
			width:120px;
			high:100px;
			margin-bottom:15px;
		}
		
		#aboutus
		{
			margin-bottom:20px;
		}
		
		.extra_margin
		{
			margin-top: 10px;
		}
		
		#profilepicture
		{
			border-radius: 50%;
			height: 150px;
			width: 150px;
			background-size: cover;
			background-position: center;
			background-blend-mode: multiply;
			color: transparent;
			transition: all .3s ease;
			@include object-center;
		}

	</style>
	
</head>

<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<i class="fa">&#xf102;</i>
	</button>
	
	<div class="page-header">
	
		<a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; " title="This is SoFo Logo" /></a>

		<ul id="header">
		
			<li style="font-size: 14px; color: white; font-weight: bold;"><div class="dropdown">
				
				<button onclick="myFunction()" class="dropbtn">
					<i class="fa fa-account" style="font-size: 18px; color: black;">&#xf2bd;</i>
					Account
					<i class='fa fa-angle-down' style="font-size: 18px; color: black;"></i>
				</button>
				
				<div id="myDropdown" class="dropdown-content">
					<a href="logout-user.php">Log Out</a>
					<a href="feedback.php">Feedback</a>
					<a href="home.php">Back to Home</a>
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
			<img id="profilepicture" src="images/aboutus.png" class="image-rounded">

			<br><br>

			<p><a href="#"><i class="icon-cog" style="color: black;"></i>Edit profile image</a></p>

			<!-- Header text (Person's name) -->
			<h2><?php echo $fetch_info['name'] ?></h2>
			
			<br>
			
			<!-- Social buttons using anchor elements and btn-primary class to style -->
            <p>
                <a class="btn btn-primary btn-xs" href="#" role="button">Friend List</a>
                <a class="btn btn-primary btn-xs" href="#" role="button">Album</a>
                <a class="btn btn-primary btn-xs" href="#" role="button">Playlist</a>
            </p>
			
			<a href="reset-password.php">Change Your Password</a>

			</div> <!-- End Col 1 -->
			
		</div>
	
		<!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
		<div class="col-md-8 col-sm-* col-xs-*">

		<div class="example">

        <!-- "Lead" text at top of column. -->
        <h4 class="lead">Personal Playlist</h4>

		</div>

        <!-- Horizontal rule to add some spacing between the "lead" and body text -->
        <hr />
		
		<br>
		
		<h1>Contents of Profile Page In Here</h1>

		<br>

        <!-- Body text (paragraph 1) -->
        <p>
          Vestibulum ac dui ut arcu pulvinar aliquet. In hac habitasse platea dictumst. Fusce porttitor at quam sit amet placerat. Phasellus placerat nunc vitae enim bibendum interdum. Nunc dapibus nisi a leo tincidunt, vitae dapibus nulla pretium. Etiam eu magna felis. Sed eleifend ligula eget augue consectetur varius. Etiam cursus ex mollis, efficitur eros non, molestie turpis. Nunc malesuada porta semper. Curabitur interdum finibus tortor at semper. Aliquam ornare ut tellus sit amet vehicula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin risus lorem, dignissim id auctor ac, fringilla sit amet erat. In quis accumsan urna, ut ullamcorper risus. Duis id tempor libero.
        </p>

        <!-- Body text (paragraph 2) -->
        <p>
        Aenean hendrerit augue id venenatis mollis. Nunc euismod lorem id interdum tempor. Maecenas euismod euismod arcu blandit rhoncus. Aliquam mattis ornare enim, id molestie nibh dapibus eget. Donec accumsan libero ac ante lobortis, at porttitor neque pretium. Phasellus quis nibh dolor. In nunc mi, cursus quis nunc sit amet, blandit pulvinar nisi. Aenean vel egestas nisl, eu bibendum enim. Mauris ut turpis vel lacus sollicitudin ultrices eu sit amet sapien. Fusce facilisis tempus ligula, et laoreet ligula fringilla eget.
        </p>

        <!-- Body text (paragraph 3) -->
        <p>
        Nam odio leo, convallis non suscipit eu, ullamcorper a ipsum. Morbi vel porttitor arcu. Praesent sed urna consequat, eleifend nisl in, sodales lectus. Praesent diam neque, efficitur vitae euismod sodales, facilisis interdum orci. Quisque ultrices lacus id lorem feugiat auctor. Ut elementum placerat pulvinar. Donec vel nisi erat. Etiam leo dolor, scelerisque vel congue a, tempor nec mi. Vivamus fringilla non lectus non suscipit. Vestibulum iaculis turpis sit amet egestas semper. Suspendisse non ipsum nec purus laoreet venenatis. Nulla vel turpis porta, consequat arcu vitae, condimentum ante.
        </p>

        <!-- Body text (paragraph 4) -->
        <p>
        Pellentesque interdum faucibus faucibus. Donec eu mi et erat semper molestie. Donec volutpat, leo sed bibendum eleifend, nibh odio elementum urna, vel mattis ipsum est vel orci. Proin ac porta nisl, at ultrices enim. Maecenas eu nisl venenatis, accumsan odio ut, ultricies felis. Fusce eget mattis velit, id consectetur nisi. In pharetra arcu orci, ut ultricies ligula pellentesque eget. Suspendisse imperdiet libero magna, in lacinia nibh rutrum ut. Nam non augue a lorem aliquet volutpat. Vivamus vel varius dolor.</p>


		</div> <!-- End column 2 -->

		</div> <!-- End row 1 -->

	</div> <!-- End main container -->

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
</script>

</html>
