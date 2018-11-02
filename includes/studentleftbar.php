<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                            <div class="user-info closed">
							<!--<form action="/upload.php" method="post" enctype="multipart/form-data"> -->
								<img src="http://placehold.it/90/c2c2c2?text=User" alt="student" class="img-circle profile-img">
                                <h6 class="title"><?php echo $_SESSION['alogin']; ?></h6>
							<!--<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Upload Image" name="submit"> -->
							      
								</form>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                    </li>
                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>            
					<li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="find-result.php"><i class="fa fa-bars"></i> <span>View Result</span></a></li>
                                            <li><a href="profile.php?profile=<?php echo base64_encode($_SESSION['sess_studentId']); ?>"><i class="fa fa fa-server"></i> <span>My Profile</span></a></li>
                                            <li><a href="comment.php"><i class="fa fa-bars"></i> <span>Blog</span></a></li>
                                        </ul>
                                        <li><a href="changepassword.php"><i class="fa fa fa-server"></i> <span>Change Password</span></a></li>       
                                    </li>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
