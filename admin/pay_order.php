<?php 
require "config.php";
$ids =$_GET['id'];


$sql ="UPDATE  tb_order SET order_status = 2 WHERE  orderID= '$ids' ";
$result =mysqli_query($con,$sql );
  if($result){
 
   echo  "<script>window.location = 'report_order.php';</script>";
           
} else{
    echo  "<script>alert('ບໍ່ສາມາດລົບຂໍ້ມຸນໄດ້'); </script>";               
}

mysqli_close($con);
?>