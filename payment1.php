<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}

ob_start();
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Available tags</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="payment1.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                        <a class="active-menu" href="payment.php"><i class="fa fa-dashboard"></i>User Dashboard</a>
                    </li>
					
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           AVAILABLE<small> Tags </small>
                        </h1>
                    </div>
                </div> 
                 
                                 
 <?php

	
	$conn = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");
	$sql = "SELECT id,tag_num,asset,snum, department,description,add_date From tags";
	$re = mysqli_query($conn,$sql);

?>
                
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
									
											<th>Tag #</th>
											<th>Tag</th>
                                            <th>Asset</th>
											<th>S/Num</th>
											<th>Department</th>
											<th>Description</th>
											<th>Date Added</th> 
											<th>Update</th>
											<th>Remove</th>

                                        </tr>
                                    </thead>
                                    <tbody>
									

                                        
									<?php
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											$tn = $row['tag_num'];
											$as = $row['asset'];
											$sn = $row['snum'];
											$de = $row['department'];
											$ds = $row['description'];

											
											if($id % 2 ==0 )
											{
												echo"<tr class='gradeC'>
												
													<td>".$row['id']."</td>
													<td>".$row['tag_num']."</td>
													<td>".$row['asset']."</td>
													<td>".$row['snum']."</td>
													<td>".$row['department']."</td>
													<td>".$row['description']."</td>
													<td>".$row['add_date']."</td>

													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingdel1.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
												
													<td>".$row['id']."</td>
													<td>".$row['tag_num']."</td>
													<td>".$row['asset']."</td>
													<td>".$row['snum']."</td>
													<td>".$row['department']."</td>
													<td>".$row['description']."</td>
													<td>".$row['add_date']."</td>

													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingdel1.php?eid=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
											
											}
										
										}
										
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
					<div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
															Add New Admin
													</button>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Add new User name</label>
                                            <input name="newus"  class="form-control" placeholder="Enter User name">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>New Password</label>
                                            <input name="newps"  class="form-control" placeholder="Enter Password">
											</div>
                                        </div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="in" value="Add" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
						if(isset($_POST['in']))
						{
							$newus = $_POST['newus'];
							$newps = $_POST['newps'];
							
							$newsql ="Insert into login (usname,pass) values ('$newus','$newps')";
							if(mysqli_query($conn,$newsql))
							{
							echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
							
						
							}
						header("Location: payment1.php");
						}
						?>
						
					<div class="panel-body">
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Change the User name and Password</h4>
                                        </div>
										<form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Tag Number</label>
                                            <input name="tag_num" value="<?php echo $tn; ?>" class="form-control" placeholder="Enter Tag Number">
											</div>
										</div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Asset</label>
                                            <input name="asset" value="<?php echo $as; ?>" class="form-control" placeholder="Enter asset">
											</div>
                                        </div>
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Serial number</label>
                                            <input name="snum" value="<?php echo $sn; ?>" class="form-control" placeholder="Enter Serial Number">
											</div>
                                        </div>										
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Department</label>
                                            <input name="department" value="<?php echo $de; ?>" class="form-control" placeholder="Enter Department">
											</div>
                                        </div>										
										<div class="modal-body">
                                            <div class="form-group">
                                            <label>Change Description</label>
                                            <input name="description" value="<?php echo $ds; ?>" class="form-control" placeholder="Enter Description">
											</div>
                                        </div>										

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                           <input type="submit" name="up" value="Update" class="btn btn-primary">
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
                <!-- /. ROW  -->
                <?php 
				if(isset($_POST['up']))
				{
					$tag_num = $_POST['tag_num'];
					$asset = $_POST['asset'];
					$snum = $_POST['snum'];
					$department = $_POST['department'];
					$description = $_POST['description'];


					$upsql = "UPDATE `tags` SET `tag_num`='$tag_num',`asset`='$asset',`snum`='$snum',`department`='$department',`description`='$description' WHERE id = '$id'";
					if(mysqli_query($conn,$upsql))
					{
					echo' <script language="javascript" type="text/javascript"> alert("Tag update") </script>';
					
				
					}
				
				header("Location: payment1.php");
				
				}
				ob_end_flush();
	
				
				?>
                                
                  
            
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
