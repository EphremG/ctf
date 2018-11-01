<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:index.php');
}
//Restrict admin or Moderator to Access user.php page
if($_SESSION['user']['role']=='admin'){
 header('location:admin.php');
}
if($_SESSION['user']['role']=='moderator'){
 header('location:moderator.php');
}
?>
<h1>Welcome to <?php echo $_SESSION['role'];?> Page</h1>
 
 
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="profile">
<h2>User name is: <?php echo $_SESSION['user']['username'];?> <br>
 Your Role is :<?php echo $_SESSION['role'];?></h2>
 
<div id="logout"><a href="logout.php">Please Click To Logout</a></div>
</div>