<?php
session_start();
error_reporting(0);
include('includes/config.php');

$username = $_SESSION['sess_username'];
//echo $_SESSION['sess_studentId'];
$StudentId = $_SESSION['sess_studentId'];
//$StudentId = 1;
//echo $StudentId;
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    } 
elseif($_SESSION['sess_userrole']!="student"){         
    header("Location: index.php"); 
}
else{
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $sql="insert into comment(studentId,comment,name) values (:StudentId, :comment, :name)";
        $addcomment = $dbh->prepare($sql);
        $addcomment-> bindParam(':StudentId', $StudentId, PDO::PARAM_INT);
        $addcomment-> bindParam(':comment', $comment, PDO::PARAM_STR);
        $addcomment-> bindParam(':name', $name, PDO::PARAM_STR);
        $addcomment->execute();
        //print_r($this->pdo->errorInfo());
        $msg="Your Comment succesfully Posted";
    }
?>
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    	<meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Grade Management System | Dashboard</title> 
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" > 
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" > 
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" > 
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" > 
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" > 
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >  
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" > 
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" > 
        <link rel="stylesheet" href="css/main.css" media="screen" > 
        <script src="js/modernizr/modernizr.min.js"></script> 

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">
                    <?php include('includes/studentleftbar.php');?>  
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                            <h2 class="title">WELCOME TO STUDENTS BLOG PAGE</h2>
                                <div class="col-sm-6">
                                   
                                    <center>
                                    <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong></strong><?php echo htmlentities($msg); ?>
                                        </div><?php } ?>
                                        <div class="form-group">
                                            <form action="comment.php" method="POST">
                                            <table>
                                            <br><input type="hidden" value="<?php echo $username; ?>" name="name"/></td></tr>
                                            <label for="comment">Comment:</label>
                                            <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
                                            <tr><td colspan="2"><input type="submit" name="submit" value="Post"></td></tr>
                                            </table>
                                            </form> 
                                        </div>
                                                                                                                 
                                    
                                        </div>
                                        <table class="table table-hover">     
                                         <tbody>
                                                    <?php 
                                                        $query = "SELECT * from comment ";
                                                        $stmt = $dbh->prepare($query);
                                                        $stmt->execute();
                                                        $resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($stmt->rowCount() > 0)
                                                        {
                                                        foreach($resultss as $row)
                                                        {  
                                                        $commentid = $row->id;
                                                    ?>
                                            <tr>
                                                <td><b><?php echo strtoupper($row->Name);?>:</b> </td>
                                                <td><?php echo $row->comment;?> </td>  
                                                <td> <?php  if($StudentId == $row->studentId){?>
                                                            <a href='deletecomment.php?commentid=<?php echo $commentid;?>'><button type="button" class="btn btn-danger">Delete</button></a></td>
                                                
                                                    <?php } ?>     
                                               
                                       <?php  }  ?>
                                       </tr>   
                                        </tbody>
                                        </table>  
                                    <div>   <?php } else {
                                         echo '<div class="alert alert-success left-icon-alert" role="alert"> ';
                                          echo ' <a href="#" class="close" data-dismiss="alert">&times;</a> ';
                                           echo ' <strong></strong>Well done! The flag is Y0U_AR3_7H3_B357 ';
                                         }                                        
                                         ?>
                                       </div>               
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

    </body>
</html>
<?php } ?>
