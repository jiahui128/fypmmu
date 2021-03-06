<?php require_once "controllerUserData.php"; ?>
<?php
$conuser = mysqli_connect("localhost", "root", "", "userform");
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
require 'init.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $user_data = $user_obj->find_user_by_id($_GET['id']);
        if ($user_data ===  false) {
            header('Location: profile.php');
            exit;
        } else {
            if ($user_data->id == $_SESSION['user_id']) {
                header('Location: profile.php');
                exit;
            }
        }
    }
} else {
    header('Location: logout.php');
    exit;
}
// CHECK FRIENDS
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['user_id'], $user_data->id);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['user_id'], $user_data->id);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['user_id'], $user_data->id);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <title><?php echo  $user_data->username; ?></title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main System CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Home Page CSS -->
    <link rel="stylesheet" href="css/homepage.css">

    <!--profile-->
    <link rel="stylesheet" href="css/profile.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Favicon of the Website -->
    <link rel="icon" href="images/sofomusic.jpg">

    <!-- friend system-->
    <link rel="stylesheet" href="css/friend.css">
    <link rel="stylesheet" href="try.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <style>

    </style>

    <link rel="stylesheet" href="friend.css">
    <link rel="stylesheet" href="try.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- User Profile -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="userprofile.css">

</head>

<body style="background-color: lightgray;">

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

        </ul>

    </div>

    <div class="profile">
        <form class="fileform">
            <ul class="list">
                <li style="text-align:center;">
                    <?php
                    $email = $_SESSION["email"];
                    $q = mysqli_query($con, "SELECT * FROM usertable WHERE email= '$email'");
                    while ($row = mysqli_fetch_assoc($q)) {
                        if ($row['profile_image'] == "") {
                            echo "<img id='profilepicture' src='images/aboutus.png'  alt='Default Profile Pic'>";
                        } else {
                            echo "<img id='profilepicture' src='uploads/" . $row['profile_image'] . "'  alt='Profile Pic'>";
                        }
                    }
                    ?>
                    <h2 style="text-align:center;margin:10px;"><?php echo $fetch_info['name'] ?></h2>
                    <hr style="width:70%;">
                </li>
                <li><a href="profile.php"><i class='far'>&#xf2bb;</i>Account Overview</a></li>
                <li><a href="edit-profile.php"><i style="margin-right:7px;" class="fa">&#xf044;</i>Edit Account</a></li>
                <li><a href="friend-list.php" id="active"><i style="margin-right:5px;" class='fas'>&#xf500;</i>Friend
                        list</a></li>
                <li><a href="personal-playlist.php"><i class='fab'>&#xf3b5;</i>Personal Playlist</a></li>
                <li><a href="requesthistory.php"><i style='margin-right:10px;' class='far'>&#xf017;</i>Request
                        History</a></li>
            </ul>
            <div class="word">
                <div style="width:80%;float:right;">
                    <div class="profile_container">
                        <div class="inner_profile">
                            <div style="margin-bottom:20px;font-size:20px;">
                                <a href="friend-list.php" class="close" style="font-size: 45px;">+</a>
                            </div>
                            <div class="img">
                                <img src="images/<?php echo $user_data->user_image; ?>" alt="Profile image">
                            </div>

                            <h1><?php echo  $user_data->username; ?></h1>
                            <div class="actions">

                                <br>

                                <?php
                                if ($is_already_friends) {
                                    echo '<a href="functions.php?action=unfriend_req&id=' . $user_data->id . '" class="req_actionBtn unfriend" onclick="alert(\'You are not friend now!\')";>Unfriend</a>';
                                } elseif ($check_req_sender) {
                                    echo '<a href="functions.php?action=cancel_req&id=' . $user_data->id . '" class="req_actionBtn cancleRequest" onclick="alert(\'Your request has been canceled!\')";>Cancel Request</a>';
                                } elseif ($check_req_receiver) {
                                    echo '<a href="functions.php?action=ignore_req&id=' . $user_data->id . '" class="req_actionBtn ignoreRequest" onclick="alert(\'You had rejected the friend request!\')";>Decline</a>&nbsp;
										<a href="functions.php?action=accept_req&id=' . $user_data->id . '" class="req_actionBtn acceptRequest" onclick="acceptf()">Accept</a>';
                                } else {
                                    echo '<a href="functions.php?action=send_req&id=' . $user_data->id . '" class="req_actionBtn sendRequest" onclick="alert(\'Your request has been send!\')";>Send Request</a>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row" style="margin-left:50px">
                                <div class="col-md-6 img">

                                    <div>

                                        <br><br><br>
                                        <h3><b>Name: </b><i><?php echo  $user_data->username; ?></i></h3>

                                        <p>
                                            <b>Email:</b> <?php echo  $user_data->user_email; ?><br>
                                            <b>Gender:</b> <?php echo  $user_data->user_gender; ?><br>
                                            <b>Age:</b> <?php echo  $user_data->user_age; ?><br>
                                            <b>Country:</b> <?php echo  $user_data->user_country; ?><br>

                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </form>
    </div>
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