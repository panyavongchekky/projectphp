<?php 
include 'config.php';
$ids = $_POST['pid'];//addstock.php
$nums = $_POST['pnum'];

$sql = "UPDATE product SET amount = amount + $nums WHERE pro_id = '$ids' ";
$hand = mysqli_query($con,$sql);
if($hand){
  echo "<script> alert('ການອັບເດດແມ່ນສຳເລັດແລ້ວ'); </script>";
  echo "<script> window.location = 'index.php';</script>";
}else{
  echo "<script> alert('ເກີດຂໍ້ຜິດຜາດໃນການອັບເດດ!'); </script>";
}
mysqli_close($con);
?>