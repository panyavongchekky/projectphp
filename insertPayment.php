<!--ຍັງບໍ່ຜ່ານຂໍ້ມຸບໍ້ລົງຖານ-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

</head>
<body>
  

<?php  
include 'config.php'; //ຮັຍມາຈາກpay_ment

if($_POST){

$orderID = mysqli_real_escape_string($con,$_POST['order_id']);
$totalPrice =mysqli_real_escape_string($con, $_POST['total_price']);
$payDate =mysqli_real_escape_string($con, $_POST['pay_date']);
$payTime =mysqli_real_escape_string($con, $_POST['pay_time']);
if (is_uploaded_file($_FILES['file1']['tmp_name'])){
  $new_image_name = 'b_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']),PATHINFO_EXTENSION);
  $image_upload_path = "./img/".$new_image_name;
  move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
  } else{
    $new_image_name = "";
  }

    $sql = "INSERT INTO FROM payment (orderID,pay_money,pay_date,pay_time,pay_image)
    VALUES ('$orderID','$totalPrice','$payDate','$payTime','$new_image_name')";
    $hand = mysqli_query($con,$sql);
    if( $hand){
      echo "<script> alert('ບັນທືກຂໍ້ມູນສຳເລັດແລ້ວ'); </script>";
      echo "<script>window.location='pay_ment.php'; </script>";

    }else{
      echo '<script>
      setTimeout(function() {
      swal({
      title: "ເກີດຂໍ້ຜິດພາດໃນການບັນທືກ",
      type: "error"
      }, function() {
      window.location = "login.php"; 
      });
      }, 1000);
      </script>';
  exit();
    }
     mysqli_close($con);
  }  
?>  
</body>
</html>

      
