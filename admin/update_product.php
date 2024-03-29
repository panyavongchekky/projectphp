<?php  
include 'config.php';//ຮັບມາຈາກ edit product
$proid   = $_POST['pid'];
$proname = $_POST['pname'];
$detail   = $_POST['detail'];
$type_id  = $_POST['typeID'];
$price    = $_POST['price'];
$amount   = $_POST['num'];
$img      = $_POST['txtimg'];

 
if (is_uploaded_file($_FILES['file1']['tmp_name'])){
  $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']),PATHINFO_EXTENSION);
  $image_upload_path = "../img/".$new_image_name;
  move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
  } else{
    $new_image_name = "$img";//ຖ້າບໍ່ອັບຮຸບເອົາໂຕເກົ່າ
  }

  //ແກ້ໄຂຂໍ້ມູນ

$sql  = "UPDATE product SET 
pro_name = '$proname',
detail   = '$detail', 
type_id   = '$type_id',
price    = '$price',
amount   = '$amount',
image    = '$new_image_name'
WHERE pro_id ='$proid'";

if(!mysqli_query($con,$sql)){
  echo "<script> alert('ແກ້ໄຂຂໍ້ມຸນບໍ່ສຳເລັດ'); </script>"; 
}

else{
  echo "<script> alert('ແກ້ໄຂຂໍ້ມຸນສຳເລັດ'); </script>";
  echo "<script> window.location='show_product.php'; </script>";
}

?>