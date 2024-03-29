<?php 
session_start();
require "config.php";
$sql = "SELECT * FROM tb_order WHERE orderID = '". $_SESSION["order_id"]."' ";
$result = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];

?>    
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
<div class="container">
  <div class="row">
    <div class="col-md-10">
         <div class="alert alert-success text-center mt-4 h4" role="alert">
              ການສັັ່ງຊື້ແມ່ນສຳເລັດແລ້ວ
         </div>
         ໃບບີນການສັ່ງຊື້: <?=$rs['orderID']?> <br>
         ຊື້ - ນາມສະກຸນ (ລູກຄ້າ): <?=$rs['cus_name']?> <br>
         ທີ່ຢູ່ການຈັດສົ່ງ: <?=$rs['address']?> <br>
         ເບີໂທລະສັບ: <?=$rs['telephone']?> <br>
         ເວລາສັ່ງຊື້: <?=$rs['reg_date']?> <br>
       
   <div class="card mb-4 mt-4">
      <div class="card-body">
         <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ລະຫັດສີ້ນຄ້າ</th>
      <th scope="col">ຊື່ສີ້ນຄ້າ</th>
      <th scope="col">ລາຄາ</th>
      <th scope="col">ຈຳນວນ</th>
      <th scope="col">ລາຄາລວມ</th>
    </tr>
  </thead>
 <tbody>

  <?php 
  $sql1 = "SELECT * FROM order_detail d, product p WHERE d.pro_id = p.pro_id and 
  d.orderID = '".$_SESSION["order_id"]."' ";
  $result1 = mysqli_query($con,$sql1);
    while ($row=mysqli_fetch_array($result1)){

  ?>
    <tr>
      <td><?= $row['pro_id'] ?></td>
      <td><?= $row['pro_name'] ?></td>
      <td><?= $row['orderPrice'] ?></td>
      <td><?= $row['orderQty'] ?></td>
      <td><?= $row['Total'] ?></td>
    </tr>
    </tbody>

<?php
}
?>
</table>
<h6 class="text-end">ລວມເປັນເງີນທັງໝົດ <?=number_format($total_price,2) ;?> ກີບ</h6>
</div>
</div>
  <p class="text-center"> ກາລຸນາໂອນເງີນຫລັງຈາກສັ່ງຊື້ສີ້ນຄ້າ  ຊື່ບັນຊີ mr chekky ເລກບັນຊີ 594-4949-2499 </p> <br>
     <p class="text-center">ຂໍຂອບໃຈທີ່ບໍລິການ ....</p>
  <div class="text-center">
  <a href="show_product.php" class="btn btn-secondary">ກັບຄື້ນ</a>
 <button onclick="window.print()" class="btn btn-primary">ປີ້ນໃບບີນ</button>
 </div>
    </div>
  </div>
</div>


</body>
</html>