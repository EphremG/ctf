<style>
@media (max-width:1800px){
    .left-sidebar {
        display: block !important;
        display: table-cell !important;
    vertical-align: top !important;
    }
    .left-sidebar, .main-page, .right-sidebar { */
        vertical-align: left !important;
    }
}

</style>
<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                          <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="#"> <span>Dashboard</span> </a>
                                    </li>
                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>            
					<li class="has-children">
                                        <a href="#"></i> <span>Menu</span></a>
                                        <ul class="child-nav">
                                            <li><a href="find-result.php"> <span>View Result</span></a></li>
                                            <li><a href="profile.php?profile=<?php echo base64_encode($_SESSION['sess_studentId']); ?>"><span>My Profile</span></a></li>
                                            <li><a href="comment.php"><span>Blog</span></a></li>
                                        </ul>
                                        <li><a href="#"> <span>Change Password</span></a></li>       
                                    </li>
                            </div>
                        </div>
</div>
