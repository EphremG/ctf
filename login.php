<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$uname = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$id ='';

$sql ="SELECT * FROM users WHERE UserName=:uname and Password=:password and Role=:role";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':role', $role, PDO::PARAM_STR);
$query-> execute();

if($query->rowCount() > 0)
{
	$_SESSION['alogin']=$_POST['username'];
	
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	foreach($results as $result)
	{   
    $id = $result->id;
    $un = $result->username;
	$_SESSION['sess_user_id'] = $id;
	$_SESSION['sess_username'] = $username;
	
    }
	
	//session_regenerate_id();
	
	
    $_SESSION['sess_userrole'] = $_POST['role'];
	
	$sess = $_SESSION['sess_userrole'];
	session_write_close();

	if( $role == "admin"){
		header('Location: admindashboard.php');
	}elseif( $role == "student"){
		header('Location: studentdashboard.php');
	}
	elseif( $role == "teacher"){
		header('Location: teacherdashboard.php');
	}
	else {
	    echo "<script>alert('Invalid Details');</script>";
	}


#echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
    
    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<html>
<head>
    <title> Grade Management System </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">   
</head>
    <body>
		<div class="login-box">
		<img src="images/avatar.png" class="avatar">
			<h1>Login Here</h1>
				<form method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password">
				<p>Role</p>
				<div class="styled-select slate">
				<select name="role">
					<option value="student">Student</option>
					<option value="teacher">Teacher</option>
					<option value="admin">Admin</option>
				</select> </div><br>
				<input type="submit" name="login" value="Login">
				</form>
		</div>
    </body>
</html>