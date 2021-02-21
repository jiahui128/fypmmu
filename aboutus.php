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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SoFo Music Our Team Page</title>

    <!-- Font Awesome (Icons) CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Bootstrap CSS Version 3.37 and 4.4.1 -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Home Page CSS -->

    <link rel="stylesheet" href="css/homepage.css">

    <!-- Several Pages CSS -->

    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" href="style.css">

    <!-- Favicon of the Website -->

    <link rel="icon" href="images/sofomusic.jpg">

</head>

<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa">&#xf102;</i>
    </button>

    <div class="page-header" style="text-align: center;">

        <a href="home.php"><img src="images/SoFo.png" alt="SoFo Logo" style="width: 270px; height: 80px; float:left; " title="This is SoFo Logo" /></a>

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

    <div class="header_under"></div>
    <!--Start Container for the web content-->
    <div class="playlist_wrapper">

        <div class="pcontainer">

            <br>

            <h3 style="text-align: center;">Our Team</h3>

            <div style="margin-top:30px; text-align: center;">

                <div class="row">

                    <div class="col-md-4 col-sm-4">

                        <div class="aboutus">
                            <img class="about" src="images/weichin.jpeg" alt="">
                            <br>
                            <strong>Tan Wei Chin</strong>
                        </div>

                    </div>

                    <div class="col-md-4 col-sm-4">

                        <div class="aboutus">

                            <img class="about" src="images/vivian_pic.jpg" alt="">
                            <br>
                            <strong>Vivian Quek</strong>

                        </div>

                    </div>

                    <div class="col-md-4 col-sm-4">

                        <div class="aboutus">
                            <img class="about" src="images/Jiahui.jpg" alt="">
                            <br>
                            <strong>Ng Jia Hui</strong>

                        </div>

                    </div>

                </div>

            </div>

            <br><br>
            <div style="text-align:justify;font-size:16px;">
                In this current century, due to the rapid growth of information technology, more and more music is
                available freely online. People can search for their favorite songs online in ease and download it as
                mp3 files, etc.

                <br><br>

                SoFo Music is a new released online music streaming website and contains a lots of greatest collections
                of musical compositions, ranging from well-known standards to new songs by emerging artists.

                <br><br>

                SoFo Music is created by three enthusiastic amateurs in programming, who just begin to start to learn
                how to code. The members are : Vivian Quek Jia Yi, Ng Jia Hui, and Tan Wei Chin. All of the members are
                currently pursuing their diploma in Information Technology in Multimedia University, Melaka.

                <br><br>

                The main objective of developing this Online Music Gallery System web-based application is to provide a
                user friendly environment for those who is passionate in music and needs a platform for them to store
                the songs in a list they want to listen, and also play their songs---- either instrumental or with
                lyrics.
            </div>
        </div>
        <!--End Container-->

    </div>

    <br><br>

    <footer style="text-align: center;">
        <p>Posted By : SoFo Team</p>
        <p>Contact Us : <a href="mailto:1181202878@student.mmu.edu.my">Email(Vivian Quek)</a>
            / <a href="mailto:1181203410@student.mmu.edu.my">Email(Ng Jia Hui)</a> / <a href="mailto:1191200801@student.mmu.edu.my">Email(Tan Wei Chin)</a></p>

        <small style="font-size: 14px; font: 14px sans-serif;">&copy; Copyright 2020, SoFo Team. All Rights
            Reserved.</small>
    </footer>

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
    </script>


</body>

</html>