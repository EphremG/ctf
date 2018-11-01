<?php
session_start();
$conn=mysqli_connect('localhost','root','','srms');
//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']); //username Input
  $password=mysqli_real_escape_string($conn,$_POST['password']); // password Input
  $role = mysqli_real_escape_string($conn,$_POST['role']); // Selected role
  if(empty($username)&&empty($password)){
  $error= 'Input Fields are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
 // Solution
//$result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['user']=array(
   'username'=>$row['username'],
   'password'=>$row['password'],
   'role'=>$row['role']
   );
   //$role=$_SESSION['user']['role']; // check from database
   //
   //Redirecting User Based on Role
	$_SESSION['role'] = $role;
    switch($role){
  case 'teacher':
  header('location:teacher.php');
  break;
  case 'student':
  header('location:student.php');
  break;
  case 'admin':
  header('location:admin.php');
  break;
 }
 }else{
$error='Invalid Credential!';
 }
}
}
?>
<html>
<head>
<title>Welcome to the login page!</title>
</head>
<div align="center">
<h1>Welcome to the login page!</h1>
<form method="POST" action="index.php">
<table>
   <tr>
     <td>UserName:</td>
  <td><input type="text" name="username"/></td>
   </tr>
   <tr>
     <td>PassWord:</td>
  <td><input type="text" name="password"/></td>
   </tr>
   <tr><td>Role:</td>
   <td><select name="role">
   <option value="student">Student</option>
   <option value="teacher">Teacher</option>
   <option value="admin">Admin</option>
        </select></td></tr>
   <tr>
     <td></td>
  <td><input type="submit" name="login" value="Login"/></td>
   </tr>
</table>
</form>
<?php if(isset($error)){ echo $error; }?>
</div>
</html>