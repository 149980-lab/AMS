<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator PAGE	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- Custom styles for this template-->
   <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->

	
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> A.M.System</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
						
						</li>
                        <li><a href="old/profile.php"><i class="fa fa-gear fa-fw"></i> Older website</a>
                        </li>
						
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> Tag Logs</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Tag Database</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Settings</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Map View</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header" align="center">
                            Status <small>Glance Summary </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
		
			<div class="row">
				<div class="card-deck">
					<div class="col-sm-3">
						<div class="card bg-warning" >
							<div class="card-body text-center">
								<p class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Tags/Assets</p> 
								<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php
														$connecton = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");
					
														$query = "SELECT id FROM tags ORDER BY id";
														$query_run = mysqli_query($connecton, $query);
					
					
														$row = mysqli_num_rows($query_run);
						
														echo '<h1>'. $row. '</h1>'
			  
												?>
								</div>
								<a href="roombook.php" class="btn btn-primary">View Tags <i class="fa fa-tag fa-2x text-grey-300"></i></a>
							</div>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="card bg-danger" >
							<div class="card-body text-center">
								<p class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Users</p> 
								<div class="h5 mb-0 font-weight-bold text-gray-800">
				<?php
					$connecton = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");
					
					$query = "SELECT id FROM login ORDER BY id";
					$query_run = mysqli_query($connecton, $query);
					
					
					$row = mysqli_num_rows($query_run);
					
					echo '<h1>'. $row. '</h1>'
			  
				?>
								</div>
								<a href="usersetting.php" class="btn btn-primary">View Users <i class="fa fa-users fa-2x text-grey-300"></i></a>
							</div>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="card bg-success" >
							<div class="card-body text-center">
								<p class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Locations</p> 
								<div class="h5 mb-0 font-weight-bold text-gray-800">
				<?php
					$connecton = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");
					
					$query = "SELECT id FROM location ORDER BY id";
					$query_run = mysqli_query($connecton, $query);
					
					
					$row = mysqli_num_rows($query_run);
					
					echo '<h1>'. $row. '</h1>'
			  
				?>
								</div>
								<a href="profit.php" class="btn btn-primary">View Locations <i class="fa fa-location-arrow fa-2x text-grey-300"></i></a>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="card bg-warning" >
							<div class="card-body text-center">
								<p class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Missing</p> 
								<div class="h5 mb-0 font-weight-bold text-gray-800">
			  <?php
					$connecton = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");
					
					$query = "SELECT id FROM missing ORDER BY id";
					$query_run = mysqli_query($connecton, $query);
					
					
					$row = mysqli_num_rows($query_run);
					
					echo '<h1>'. $row. '</h1>'
			  
				?>
								</div>
								<a href="roombook.php" class="btn btn-primary">View Tags <i class="fa fa-tag fa-2x text-grey-300"></i></a>
							</div>
						</div>
					</div>
			

				</div>

			</div>
            
			
				<!-- DEOMO-->

				
				<!--DEMO END-->
				
										
                    

                <!-- /. ROW  -->
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>