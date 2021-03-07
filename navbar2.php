<?php
if(!isset($_SESSION['adminemail'])){
	header('location:login.php');
}
?>
<body style="background: white;">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/FYP/newhome.php"">
    <div><img src="SoFo.png" alt="SoFo Logo" style="width: 100%; height: 100%; float:left;" title="This is SoFo Logo" /></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Manage Accounts
</div>


<!-- Nav Item - Edit Admins Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        
	<i class="fas fa-fw fa-user"></i>
        
	<span>Manage Admins</span>
    
	</a>
	
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        
		<div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin Profile</h6>
            <a class="collapse-item" href="#" id="admin1">Edit Admin Profile</a>
			<a class="collapse-item" href="#" id="admin2">Removed Admin Details</a>
		</div>
   
   </div>
</li>
<!-- Nav Item - Edit Users Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
        aria-expanded="true" aria-controls="collapseUsers">
        
	<i class="fas fa-fw fa-user"></i>
        
	<span>Manage Users</span>
    
	</a>
	
    <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        
		<div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Profile</h6>
            <a class="collapse-item" href="#" id="user1">Edit User Profile</a>
			<a class="collapse-item" href="#" id="user2">Removed Users Details</a>
		</div>
   
   </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Manage Songs
</div>
<!-- Nav Item - Song Requests Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        
	<i class="fas fa-fw fa-music"></i>
        
	<span>Edit Songs Details</span>
		
    </a>
	
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        
		<div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Song Info</h6>
            <a class="collapse-item" href="pendingsongs2.php">Pending Requests</a>
            <a class="collapse-item" href="completesong2.php">Completed Songs</a>
			<a class="collapse-item" href="removed_pendingsongs2.php">Removed Requests Details</a>
			<a class="collapse-item" href="removed_song2.php">Removed Songs Details</a>
        </div>
		
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Manage Lyrics
</div>
<!-- Nav Item - Lyrics Page Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseThree">
        
	<i class="fas fa-fw fa-headphones"></i>
        
	<span>Edit Lyrics Information</span>
		
    </a>
	
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        
		<div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Lyrics Details</h6>
            <a class="collapse-item" href="lyricstable2.php">Edit Lyrics Details</a>
			<a class="collapse-item" href="removed_lyrics2.php">Removed Lyrics Details</a>
        </div>
		
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Contact Superior Admins
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
        aria-expanded="true" aria-controls="collapseFour">
        
	<i class="fas fa-fw fa-envelope"></i>
        
	<span>Emails</span>
		
    </a>
	
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        
		<div class="bg-white py-2 collapse-inner rounded">
        
		<h6 class="collapse-header">Enquiry</h6>
			
        <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=1181202878@student.mmu.edu.my" target="_blank" class="collapse-item">Vivian Quek</a><br>
		
		<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=1181203410@student.mmu.edu.my" target="_blank" class="collapse-item">Ng Jia Hui</a><br>
		
		<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=1191200801@student.mmu.edu.my" target="_blank" class="collapse-item">Tan Wei Chin</a><br>
        </div>
		
    </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<!--<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        
	<i class="fas fa-fw fa-wrench"></i>
        
	<span>Utilities</span>
    
	</a>
	
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        
		<div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
     
		</div>
   
   </div>
</li>-->
<!-- Divider -->
<!--<hr class="sidebar-divider">-->
<!-- Heading -->
<!--<div class="sidebar-heading">
    Addons
</div>-->
<!-- Nav Item - Pages Collapse Menu -->
<!--<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>-->
<!-- Nav Item - Charts -->
<!--<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>-->
<!-- Nav Item - Tables -->
<!--<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>-->
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<!--<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>-->
</ul>
<!-- End of Sidebar -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
	
<script>
var el = document.getElementById('admin1');
el.onclick = showFoo;

var el2 = document.getElementById('admin2');
el2.onclick = showFoo;

var el3 = document.getElementById('user1');
el3.onclick = showFoo2;

var el4 = document.getElementById('user2');
el4.onclick = showFoo2;


function showFoo() {
  alert('Sorry, only superior admin can manage admin!');
  return false;
}

function showFoo2() {
  alert('Sorry, only superior admin can manage users!');
  return false;
}
</script>
	
</body>