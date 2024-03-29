<?php
session_start();
require 'config.php';
$order_id = "";
$cusname = "";
$total = 0;
$orderstatus ="";

if (isset($_POST['btn1'])) {
  $key_word = $_POST['keyword'];
  if ($key_word != "") {
    $sql = "SELECT * FROM tb_order WHERE orderID  = '$key_word' ";
    unset ($_SESSION['error']);
  } else {
    echo "<script>window.location='pay_ment.php'; </script>";
    unset ($_SESSION['error']);
  }

  $hand = mysqli_query($con, $sql);
  //ກວດເບີ່ງຖ້ງເປັນຄ່າວ່າ error
  $num1 = mysqli_num_rows($hand);
  if ($num1 == 0) {
    echo "<script>window.location='pay_ment.php'; </script>";
    $_SESSION['error'] = "ບໍ່ມີຂໍ້ມຸນການສັ່ງຊື້";
  } else {
    $row = mysqli_fetch_array($hand);
    $order_id = $row['orderID'];
    $cusname = $row['cus_name'];
    $total = $row['total_price'];
    $orderstatus  = $row['order_status'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pay</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <div class="conainer ">
    <?php require 'menu.php'; ?>
    <div class="row mt-4 ">
      <div class="col-md-4">
        <div class="alert alert-success" role="alert">
          ແຈ້ງການຊຳລະເງີນ
        </div>

        <!--ຄົ້ນຫາໃບບີນ-->
        <div class="border mt-5 p-2 my-2" style="background-color:#f0f0f5">
          <form action="pay_ment.php" method="POST">
            <label> ເລກທີ່ໃບສັ່ງຊື້: </label>
            <input type="text" name="keyword">
            <button type="submit" name="btn1" class="btn btn-primary">ຄົ້ນຫາ</button> <br>
            <?php
            if(isset($_SESSION['error'])){
              echo "<div class = 'text-danger'>";
                echo $_SESSION['error'];
               echo  "</div>";
            }
            ?>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <!--ສົ່ງໄປ insertPayment-->
        <form action="insertPayment.php" method="POST" enctype="multipart/form-data">
          <label class="mt-4">ເລກທີ່ໃບສັ່ງຊື້:</label>
          <input type="text" name="order_id" required value=<?= $order_id ?>><br>
          <?php
           
           if($orderstatus == '1'){
            echo "<div class = 'text-danger'>";
            echo "ຍັງບໍ່ໄດ້ຊຳລະເງີນ";
            echo  "</div>";
           }elseif($orderstatus  == '2' ){
            echo "<div class = 'text-success'>";
            echo "ຊຳລະເງີນແລ້ວ";
            echo  "</div>";
           }
          ?>
        <br>

          <label class="mt-4">ຊື່ນາມສະກຸນ :</label>
          <textarea name="cusName" class="form-control" required rows="1"><?= $cusname ?> </textarea>
          <label class="mt-4">ຈຳນວນເງີນ</label>
          <input type="number" name="total_price" class="form-control" value=<?= $total ?> required>
          <label class="mt-4">ວັນທີ່ໂອນ</label>
          <input type="date" name="pay_date" class="form-control" required>
          <label class="mt-4">ເວລາທີ່ໂອນ</label>
          <input type="time" name="pay_time" class="form-control" required>
          <label class="mt-4">ຫລັກຖານການຊຳລະເງີນ</label>
          <input type="file" name="file1" class="form-control" required><br>
          <?php 
          if($orderstatus == '2'){ ?>
          <button type="submit" name="btn2" class="btn btn-primary " disabled>submit</button>
          <?php }else{ ?>
          <button type="submit" name="btn2" class="btn btn-primary ">submit</button>
          <?php } ?>
        </form>
      </div>
    </div>

    <br />

  </div>



</body>

</html>