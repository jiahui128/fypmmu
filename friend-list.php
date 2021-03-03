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

require 'init.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if ($user_data ===  false) {
        header('Location: logout.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    $all_users = $user_obj->all_users($_SESSION['user_id']);
} else {
    header('Location: logout.php');
    exit;
}
// REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
$get_all_req_sender = $frnd_obj->request_notification($_SESSION['user_id'], true);
// GET MY($_SESSION['user_id']) ALL FRIENDS
$get_all_friends = $frnd_obj->get_all_friends($_SESSION['user_id'], true);
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
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Account - Friend List</title>

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <style>

    </style>

</head>

<body>

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
                            echo "<img id='profilepicture' class='image-rounded' src='images/aboutus.png'  alt='Default Profile Pic'>";
                        } else {
                            echo "<img id='profilepicture' class='image-rounded' src='uploads/" . $row['profile_image'] . "'  alt='Profile Pic'>";
                        }
                    }
                    ?>
                    <h2 style="text-align:center;margin:10px;"><?php echo $fetch_info['name'] ?></h2>
                    <hr style="width:70%;">
                </li>
                <li><a href="profile.php"><i class='far'>&#xf2bb;</i>Account Overview</a></li>
                <li><a href="edit-profile.php"><i style="margin-right:7px;" class="fa">&#xf044;</i>Edit Account</a></li>
                <li><a href="friend-list.php" id="active"><i style="margin-right:5px;" class='fas'>&#xf500;</i>Friend
                        List</a></li>
                <li><a href="personal-playlist.php"><i class='fab'>&#xf3b5;</i>Personal Playlist</a></li>
                <li><a href="requesthistory.php"><i style='margin-right:10px;' class='far'>&#xf017;</i>Request
                        History</a></li>
            </ul>
            <div class="word">
                <div style="width:80%;float:right;">
                    <div class="profile_container">
                        <input type="radio" name="img" id="p1">
                        <input type="radio" name="img" id="p2">
                        <input type="radio" name="img" id="p3" checked>
                        <input type="radio" name="img" id="p4">
                        <nav>
                            <ul style="width:100%;height:5%;float:center;">
                                <li><label class="ch" id="pa1" for="p1">Users</label></li>
                                <li><label class="ch" id="pa2" for="p2">Requests
                                        <span class="badge <?php
                                                            if ($get_req_num > 0) {
                                                                echo 'redBadge';
                                                            }
                                                            ?>"><?php echo $get_req_num; ?>
                                    </label></a></li>
                                <li><label class="ch" id="pa3" for="p3">Friends<span
                                            class="badge"><?php echo $get_frnd_num; ?></span></label></li>
                            </ul>
                        </nav>
                        <br>
                        <!-- all user-->
                        <div class="page" id="page1">
                            <div class="all_users" style="margin-top:30px;">
                                <h3>All Users</h3>
                                <div class="usersWrapper">
                                    <?php
                                    if ($all_users) {
                                        foreach ($all_users as $row) {
                                            echo '<div class="user_box">
													<div class="user_img"><img src="images/' . $row->user_image . '" alt="Profile image"></div>
													<div class="user_info"><span>' . $row->username . '</span>
														<span><a href="user_profile.php?id=' . $row->id . '" class="see_profileBtn" id="pa4" for="p4" style="color: white;">See profile</a></div>
													</div>';
                                        }
                                    } else {
                                        echo '<h4>There is no user!</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--end all user-->

                        <!-- friend request -->
                        <div class="page" id="page2">
                            <div class="all_users" style="margin-top:30px;">
                                <h3>All request senders</h3>
                                <div class="usersWrapper">
                                    <?php
                                    if ($get_req_num > 0) {
                                        foreach ($get_all_req_sender as $row) {
                                            echo '<div class="user_box">
													<div class="user_img"><img src="images/' . $row->user_image . '" alt="Profile image"></div>
													<div class="user_info"><span>' . $row->username . '</span>
														<span><a href="user_profile.php?id=' . $row->sender . '" class="see_profileBtn" style="color: white;">See profile</a></div>
													</div>';
                                        }
                                    } else {
                                        echo '<h4>You have no friend requests!</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--end friend request-->

                        <!-- friends-->
                        <div class="page" id="page3">
                            <div class="all_users" style="margin-top:30px;">
                                <h3>All friends</h3>
                                <div class="usersWrapper">
                                    <?php
                                    if ($get_frnd_num > 0) {
                                        foreach ($get_all_friends as $row) {
                                            echo '<div class="user_box">
													  <div class="user_img"><img src="images/' . $row->user_image . '" alt="Profile image"></div>
													  <div class="user_info"><span>' . $row->username . '</span>
														<span><a href="user_profile.php?id=' . $row->id . '" class="see_profileBtn" style="color: white;">See profile</a></div>
													  </div>';
                                        }
                                    } else {
                                        echo '<h4>You have no friends!</h4>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--end friends-->

                        <!--friends profile-->
                        <div class="page" id="page4">
                            <div class="img">
                                <img src="images/<?php echo $user_data->user_image; ?>" alt="Profile image">
                            </div>
                            <h1><?php echo  $user_data->username; ?></h1>
                            <div class="actions">
                                <br>
                                <?php
                                if ($is_already_friends) {
                                    echo '<a href="functions.php?action=unfriend_req&id=' . $user_data->id . '" class="req_actionBtn unfriend">Unfriend</a>';
                                } else if ($check_req_sender) {
                                    echo '<a href="functions.php?action=cancel_req&id=' . $user_data->id . '" class="req_actionBtn cancleRequest">Cancel Request</a>';
                                } else if ($check_req_receiver) {
                                    echo '<a href="functions.php?action=ignore_req&id=' . $user_data->id . '" class="req_actionBtn ignoreRequest">Decline</a>&nbsp;
										<a href="functions.php?action=accept_req&id=' . $user_data->id . '" onclick="document.getElementById("p3").checked=true;" class="req_actionBtn acceptRequest">Accept</a>';
                                } else {
                                    echo '<a href="functions.php?action=send_req&id=' . $user_data->id . '" class="req_actionBtn sendRequest">Send Request</a>';
                                }
                                ?>
                            </div>
                        </div>
                        <!-- end friends profile-->
                    </div>
                </div>
            </div>
        </form>
    </div>

    <br><br><br><br>

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