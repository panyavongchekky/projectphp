<?php  
include 'config.php';
//ຮັບຄ່າຈາກ register

$name     = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tel    = $_POST['phone'];
$username = $_POST['username '];
$password = $_POST['password '];

$password = hash('sha512',$password);

$sql = "INSERT INTO tb_employee values('','$name','$lastname','$tel','$username','$password') ";
$result = mysqli_query($con,$sql);

if($result){
    echo "<script> alert('ບັນທືກຂໍ້ມຸນສຳເລັດ'); </script>";
    echo "<script> window.location='fr_employee.php'</script>";
}else{
    echo "error".$sql."<br>".mysqli_error($con);
    echo "<script> alert('ບັນທືກຂໍ້ມຸນບໍໍ່ສຳເລັດ'); </script>";
}
mysqli_close($con);
 ?>