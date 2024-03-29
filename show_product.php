<?php require "config.php"?>
<?php require "menu.php"?> 
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>shop vegetable</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container">
  <div class="row">
<?php  
$key_word  = @$_POST['keyword'];
if($key_word !=""){
  $sql = "SELECT * FROM product WHERE pro_id = '$key_word ' OR pro_name LIKE '%$key_word%' ORDER BY pro_id ";
}else{
  $sql = "SELECT * FROM product WHERE amount > 0 ORDER BY pro_id";
}


$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result )){
$amount1 = $row['amount'];
$image1 = $row['image']; 

?>
    <div class="col-sm-3">
     <?php if($image1 == ""){ ?>
        <img src="img/no image.jpg" alt=" 200px" height="250px"  class="mt-2 p-2 border"><br>
        <?php  } else{ ?>
        <img src="img/<?=$row['image']?>" alt=" 200px" height="250px"  class="mt-2 p-2 border"><br>
        <?php  }
     ?>
     

     ID: <?=$row['pro_id']?> <br>
   <h4 class="text-success">  <?=$row['pro_name']?></h4> 
    ລາຄາ<b class="text-danger" > <?=$row['price']?> </b>kip <br>
   
    <?php 
    if($amount1 <= 0){  ?>
      <a href="#"  class="btn btn-danger mt-2 mb-2" >ສີ້ນຄ້າເບີດແລ້ວ</a>
      <?php }else{ ?>
      <a href="sh_product_detail.php?id=<?=$row['pro_id']?>" class="btn btn-success mt-2 mb-2" >ລາຍລະອຽດ</a>
    <?php } ?>

    </div>
    <?php 
    }
    mysqli_close($con)
?>
  </div>
</div>  
<?php include 'footer.php' ?>         
</body>
</html>
