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

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>SoFo Music About Us Page</title>
	
	<!-- Font Awesome (Icons) CSS -->
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
	<!-- Bootstrap CSS Version 3.37 and 4.4.1 -->
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
	<!-- Home Page CSS -->
	
	<link rel="stylesheet" href="css/homepage.css">
	
	<!-- Several Pages CSS -->
	
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	
    <!-- Favicon of the Website -->
	
	<link rel="icon" href="images/sofomusic.jpg">

	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="friend-system.js"></script>

	<style>
		body{
			background: lightgray;
		}
		
		.header2{

		width:100%;
		height:80px;
		text-align:center;
		font-family:tahoma;
		color:blue;
		padding-top:30px;
		font-size:25px;

		}

		#submit{

		width:100%;
		height:30px;
		}
		
	</style>

  <script>


  </script>
  
</head>
<body>

	<div>

	<button onclick="topFunction()" id="myBtn" title="Go to top">
		<i class="fa">&#xf102;</i>
	</button>
	
	<div class="page-header" style="text-align: center;">
	
		<a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; " title="This is SoFo Logo" /></a>
	
		<ul id="header">
	
			<li style="font-size: 14px; color: white; font-weight: bold;"><div class="dropdown">
	
				<button onclick="myFunction()" class="dropbtn">
					<i class="fa fa-account" style="color: black;">&#xf2bd;</i>
					Account
					<i class='fa fa-angle-down' style="color: black;"></i>
				</button>
				
				<div id="myDropdown" class="dropdown-content">
					<a href="profile.php"><?php echo $fetch_info['name'] ?></a>
					<a href="home.php">Back to Home</a>
					<a href="logout-user.php">Log Out</a>
				</div>
				
				</div>
			
			</li>
			
			<li style="font-size: 14px; color: white; font-weight: bold;" >
				<?php
					$today = date("F j, Y");
					echo $today;
				?>
			</li>
			
		</ul>
		
	</div>
	
	<br><br>
	
  <!-- Trigger the modal with a button -->
	
  <!-- Trigger the modal with a button -->

   <button type="button" onClick="show()" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal1" style="width:100%">View Current Friends</button>

  <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal2" style="width:100%">Add New Friend</button>




  <!-- Modal 1 -->

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sofo Friend List</h4>
        </div>
        <div class="modal-body">


           <div id="display">list here</div>



        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!--end of modal 1-->


  <!-- Modal 2  dont forget to check modal id -->

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Sofo Friend List</h4>
        </div>
        <div class="modal-body">

          <form id="form" action="#">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="friend_name" type="text" class="form-control" name="friend_name" placeholder="friend's name" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <input id="country_name" type="text" class="form-control" name="country_name" placeholder="country" required>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-download-alt"></i></span>
                    <button id="submit" type="button"  onclick="insert()" class="btn btn-primary" name="submit">Add New Friend</button>
                  </div>
                </form> 




        </div>



        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!--end of modal 2-->
	<div>



	</div>

	</div>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<footer style="text-align: center;">
			<p>Posted By : SoFo Team</p>
			<p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
			/ <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>
		
			<small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights Reserved.</small>
	</footer>
	
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

</body>

</html>