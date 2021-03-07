<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar2.php'); 

?>        

    <!-- Begin Page Content -->
         <div class="container-fluid">

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
			
			<h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                
				<a href="adminlogout.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
				
				<i class="fas fa-user fa-sm text-white-50"></i> Logout</a>
        
		</div>

    <!-- Content Row -->
        <div class="row">

    <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Register Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                    require 'dbconfig.php';
									
                                    $query = "SELECT admin_status FROM register WHERE admin_status=0";
                                    $query_run = mysqli_query($connection, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<p> Total Admin : '.$row.'</p>'
                                ?>
                            </div>
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Users</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" >
								<?php
                                    $connection = mysqli_connect("localhost","root","","userform");

                                    $query = "SELECT situation FROM usertable WHERE situation = 0";
                                    $query_run = mysqli_query($connection, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<p> Total Users : '.$row.'</p>'
                            ?>
							</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    <!-- Song Request Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Song Requests
                            </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
								
								<?php
                                    $connection = mysqli_connect("localhost","root","","songform");

                                    $query = "SELECT song_id FROM songtable ORDER BY song_id";
                                    $query_run = mysqli_query($connection, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<p> Total Song Requests: '.$row.'</p>'
                            ?>
								
								</div>
                            </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- Song Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Songs</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
							
							<?php
                                    $connection = mysqli_connect("localhost","root","","songform");

                                    $query = "SELECT status FROM recordedsong WHERE status=0";
                                    $query_run = mysqli_query($connection, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<p> Total Songs : '.$row.'</p>'
                            ?>
							
							</div>
                        </div>
                            <div class="col-auto">
                            <i class="fas fa-music fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
	    <!-- Lyrics Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Lyrics</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php
                                    $connection = mysqli_connect("localhost","root","","songform");

                                    $query = "SELECT lyrics_no FROM lyricstable ORDER BY lyrics_no";
                                    $query_run = mysqli_query($connection, $query);

                                    $row = mysqli_num_rows($query_run);

                                    echo '<p> Total Lyrics : '.$row.'</p>'
                            ?>
							
							</div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-file-pdf fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Other Elements -->
            <div class="card shadow mb-4" style="z-index: 0;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Weather Forecast</h6>
                </div>
            
				<div class="card-body">
					<div class="col-auto">
                            <div style="color: #455052; max-width: 250px; width: 100%; border: 1px solid #428bca; background-image: radial-gradient(circle, #fff, #f5faff, #e5efff);"><script src="https://www.weatherwx.com/weather-js-vert/my/malacca.js"></script></div>
                    </div>
                </div>
            </div>
			
			&nbsp;&nbsp;
		
		<!-- Other Elements -->
            <div class="card shadow mb-4" style="z-index: 0;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Office Site Map</h6>
                </div>
            
				<div class="card-body">
					<div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7436995687485!2d102.27392491380607!3d2.2494934983604224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56b9710cf4b%3A0x66b6b12b75469278!2sMultimedia%20University!5e0!3m2!1sen!2smy!4v1611651248126!5m2!1sen!2smy" width="550" height="430" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>	
					    </div>
                    </div>
                </div>
            </div>
			
    <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
	
            
<?php
include('includes/scripts.php');
?>

    