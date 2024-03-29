<?php require "config.php" ?>
<?php require "menu.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>


  <div class="container">
    <div class="row">


      <?php
      $ids = $_GET['id'];

      $sql = "SELECT * FROM product INNER JOIN type ON product.type_id = type.type_id 
  WHERE product.pro_id = '$ids' ";

      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
      //print_r($row);

$num_rows = mysqli_num_rows($result);

// ตรวจสอบก่อนว่ามีข้อมูลหรือไม่
if ($num_rows > 0) {
  ?>
  <div class="col-md-4">
  <img src="img/<?= $row['image'] ?> " width="300px" class="mt-2 p-2 border">
</div>
<div class="col-md-6">
  ID: <?= $row['pro_id'] ?> <br>
  <h4 class="text-success"> <?= $row['pro_name'] ?></h4>
  ປະເພດສີ້ນຄ້າ: <?= $row['type_name'] ?> <br>
  ລາຍລະອຽດ: <?= $row['detail'] ?> <br>
  ລາຄາ<b class="text-danger"> <?= $row['price'] ?> </b>kip <br>
  <a href="order.php?id=<?= $row['pro_id'] ?>" class="btn btn-success">ສັ່ງຊື້</a>
</div>
<?php 
} else {
    echo  "ไม่พบข้อมูลรายละเอียด";
}
      
      ?>


     

    </div>
  </div>
  <?php
  mysqli_close($con);
  ?>
</body>

</html>