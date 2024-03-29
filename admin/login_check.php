<?php
include 'config.php';
session_start();
$username =$_POST['username'];
$password=$_POST['password'];
   
$password = hash('sha512',$password);

$sql ="SELECT * FROM tb_employee WHERE username='$username' AND password='$password' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

if($row > 0 ){
 $_SESSION["emp_username"]=$row['username'];
 $_SESSION["emp_password"]=$row['password'];
 $_SESSION["emp_userid"]=$row['id'];
 $_SESSION["emp_name"]=$row['name'];
 $_SESSION["emp_lastname"]=$row['lastname'];
 $_SESSION["error"] ="";
 $show = header("location:index.php");
 $_SESSION["error"] ="";
}else{
   $_SESSION["error"] = "<P>your username or password is invaild</P>";
   $show = header("location:login.php");
}

echo $show;

?>

<?php 

