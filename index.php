<?php require "config.php"?>
<?php require "menu.php"?> 
<?php require "header.php"?> 
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>shop vegetable</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<style>
body {
  background-color: #fbfffa;
}
</style>

</head>
<body>


<div class="container">
  <div class="row">
<?php  
$sql = "SELECT * FROM product ORDER BY pro_id LIMIT 8";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result )){
  $amount1 = $row['amount'];
?>
    <div class="col-sm-3">
     <img src="img/<?=$row['image']?>" alt=" 200px" height="250px"  class="mt-2 p-2 border"><br>
     ID: <?=$row['pro_id']?> <br>
   <h4 class="text-success">  <?=$row['pro_name']?></h4> 
    ລາຄາ<b class="text-danger" > <?=$row['price']?> </b>kip <br>

    <?php 
    if($amount1 <= 0){  ?>
      <a href="#"  class="btn btn-danger mt-2 mb-2 disabled" >ສີ້ນຄ້າເບີດແລ້ວ</a>
      <?php }else{ ?>
      <a href="sh_product_detail.php?id=<?=$row['pro_id']?>" class="btn btn-success mt-2 mb-2" >ລາຍລະອຽດ</a>
    <?php } ?>
   

   
    </div>
    <?php 
    }
    mysqli_close($con)
    ?>
    </div>
    <div class="text-center"><a class="btn btn-primary" href="show_product.php" role="button">ສະແດງສີ້ນຄ້າທັງໝົດ...</a></div>

</div>  
<div class="container-fluid"  style="background-color:  #fbfffa; "></div>


<?php include 'footer.php' ?> 
<script>
  function myFunction(data){
    console.log(data);

  }
</script>
</body>
</html>