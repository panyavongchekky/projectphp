<?php  
include 'config.php';
//ຮັບຄ່າຈາກ add product

$p_id    = $_POST['pid'];
$pname   = $_POST['pname'];
$detail  = $_POST['detail'];
$typeID  = $_POST['typeID'];
$price   = $_POST['price'];
$num     = $_POST['num'];


//ບໍ່ໃຫ້ໄອດີຄືກັນ
$check = "SELECT * FROM product WHERE pro_id  = '$p_id'";
$hand = mysqli_query($con,$check);
$num1  = mysqli_num_rows($hand);

if($num1 > 0 )  {
  echo "<script> alert('ລະຫັດສີ້ນຄ້ານີ້ມີຢູໃນຖານຂໍ້ມຸນແລ້ວ'); </script>";
  echo "<script> window.location='add_product.php'</script>";

}


if (is_uploaded_file($_FILES['file1']['tmp_name'])){
  $new_image_name = 'pr_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']),PATHINFO_EXTENSION);
  $image_upload_path = "../img/".$new_image_name;
  move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
  } else{
    $new_image_name = "";
  }


$sql = "INSERT INTO product (pro_id,pro_name,detail,type_id,price,amount,image)
VALUES('$p_id','$pname','$detail','$typeID ','$price','$num','$image_upload_path') ";

$result = mysqli_query($con,$sql);
if($result){
    echo "<script> alert('ບັນທືກຂໍ້ມຸນສຳເລັດ'); </script>";
    echo "<script> window.location='add_product.php'</script>";
}else{
    echo "<script> alert('ເກີດຂໍ້ຜິດພາດ'); </script>";
}
mysqli_close($con);

 ?> 



