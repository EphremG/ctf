<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
else{
    $id = $_GET['id'];
    if($id != ""){
        $sql = "delete from comment where id=:id";
        $deletecomment = $dbh->prepare($sql);
        $deletecomment-> bindParam(':id', $id, PDO::PARAM_INT);
        $deletecomment->execute();
        $msg="Comment removed Succesfully! ";
        header("Location: comment.php");
    }
    else {
        header("Location: comment.php");
    }
}
?>