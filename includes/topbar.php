<?php

session_start();
error_reporting(0);
include('includes/config.php');
$stud_id = $_SESSION['sess_user_id'];
$username =$_SESSION['sess_username'];
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
	} 
else {
?>
  <nav class="navbar top-navbar bg-maroon box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="#">
                			    GMS | Dashboard
                			</a>
                        </div>
                          	<ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                             
									<li><a href="#" class="color-danger text-center"><i class=""></i> Welcome, <?php echo $username;?>  </a></li>
                				    <li><a href="logout.php" class="color-danger text-center">Logout</a></li>
                					
                		
									                       
                			</ul>
                    </div>
            	</div>
            </nav>
<?php } ?>   
