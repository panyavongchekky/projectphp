<?php include 'config.php';?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>product addmin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'menu1.php'; ?>
<div class="container-fluid px-4">
<a class="btn btn-primary mt-4 mb-4" href="add_product.php" role="button">add++</a>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      ຂໍ້ມູນສີ້ນຄ້າ
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <thead>
          <tr>
            <th>ຮູບພາບ</th>
            <th>ລະຫັດສີ້ນຄ້າ</th>
            <th>ຊື່ສີ້ນຄ້າ</th>
            <th>ລາຍລະອຽດ</th>
            <th>ປະເພດສີ້າຄ້າ</th>
            <th>ລາຄາ</th>
            <th>ຈຳນວນ</th>
            <th>ແກ້ໄຂ</th>
          </tr>
        </thead>
      
        <tbody>
          <?php
          $sql = "SELECT * FROM product p,type t WHERE p.type_id = t.type_id ORDER BY pro_id";
          $hand = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_array($hand)) {
          ?>
            <tr>
              <td><img src="../img/<?= $row['image'] ?>" width="100px" height="100px"></td>
              <td><?= $row['pro_id'] ?></td>
              <td><?= $row['pro_name'] ?></td>
              <td><?= $row['detail'] ?></td>
              <td><?= $row['type_name'] ?></td>
              <td><?= $row['price'] ?></td>
              <td><?= $row['amount'] ?></td>
              <td><a href="edit_product.php?id=<?= $row['pro_id'] ?>" class="btn btn-success">edit</a></td><!--ສົ່ງໄປ addstock-->
            </tr>
          <?php }
          mysqli_close($con);
          ?>
        </tbody>

      </table>
    </div>
  </div>


  </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>