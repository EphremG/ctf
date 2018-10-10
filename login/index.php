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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body >
     
    <div class="col-sm-offset-2 col-sm-6 center">
    <h3 align="center">Welcome to Grade Management System</h3>
    <div class="container">
    <center> <form class="form-horizontal" method="post">
    <div class="form-group">
            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-8">
                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName">
            </div>
    </div>
    <div class="form-group">
            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
    </div>							
    <div class="form-group">
            <label for="inputrole" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
            <select class="form-control" name="role">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
            </select>
            </div>
    </div>
                                                                                        
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
            </div>
        </div>
    </form>   </center>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                           <p class="text-muted text-center"><small>Copyright © <a href="#">Ephrem Demesa</a> 2018</small></p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div></div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->


    </body>
</html>
