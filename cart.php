<?php 
session_start();
require 'config.php';
 require "menu.php"; 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>cart</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>
   <div class="container">
     <form  id=form1 action="insert_cart.php" method="post">
        <div class="row">
          <div class="col-md-10">
          <h5 class="alert alert-success" role="alert"> ລາຍການທີ່ສັ່ງຊື້ສີ້ນຄ້າ</h5>

               
         
       <table class="table table-hover">
         <tr>
            <th>ລຳດັບ</th>
            <th>ຊື່ສີ້ນຄ້າ</th>
            <th>ລາຄາ</th>
            <th>ຈຳນວນ</th>
            <th>ລາຄາລວມ</th>
            <th>ເພີ່ມ - ລົດ</th>
            <th>ລົບ</th>
         </tr>
         <?php 
         $total = 0;
         $sumprice = 0;
         $m = 1;
         $sumTotal=0;
         if(isset($_SESSION["intLine"])){    // ถ้าว่างให้ทำงานใน {}
           
         for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++ ){
           if(( $_SESSION["strProductID"][$i]) !=""){
               $sql1 ="SELECT * FROM product WHERE pro_id = '" .$_SESSION["strProductID"][$i]. "' ";
               $result1 = mysqli_query($con, $sql1);
               $row_pro = mysqli_fetch_array($result1);

               $_SESSION["price"] = $row_pro['price'];
               $Total = $_SESSION["strQty"][$i];
               $sum = $Total * $row_pro['price'];
               $sumprice  =(float)  $sumprice  + $sum;
               $_SESSION["sum_price"] =  $sumprice ;
               $sumTotal =  $sumTotal+ $Total;
         ?>
         <tr>
           
            <td><?=$m?></td>
            <td> <img src="img/<?=$row_pro['image']?>" width="80px" height="100px"  class="border border-dark">
             <?=$row_pro['pro_name']?> </td>
            <td><?=$row_pro['price']?></td>
            <td><?=$_SESSION["strQty"][$i]?></td>
            <td><?= $sum ?></td>
            <td>
               <a  href="order.php?id=<?=$row_pro['pro_id']?>" class="btn btn-secondary">+</a>
               <?php if($_SESSION["strQty"][$i] >= 1){ ?>
               <a  href="order_del.php?id=<?=$row_pro['pro_id']?>" class="btn btn-danger">-</a>
           <?php } ?>
            </td>
            <td> <a href="pro_delete.php?Line=<?=$i?>" ><img src="img/delete.png" width="20px"> </a></td>
         </tr>
         <?php 
         $m =$m+1;
         }
         }
         }  //endif
         ?>
         <tr>
            <td class="text-end " colspan="4">ລວມເປັນເງີນ</td>
            <td class="text-center "><?=$sumprice?></td>
            <td>ກີບ</td>
         </tr>
       </table>
       <p  class="text-end">ຈຳນວນສັ່ງຊື້ <?= $sumTotal?>ອັນ </p>
       <div  style="text-align: right;">
           <a href="show_product.php" > <button type="button" class="btn btn-dark">ເລືອກສີ້ນຄ້າ</button> </a>
             <button type="submit"class="btn btn-primary" >ຢືນຍັນການສັ່ງຊື້</button>
       </div>
          </div>

          <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-info" h4  role="alert">
                        ຂໍ້ການຈັດສົ່ງສີ້ນຄ້າ
                    </div>
                    
                    ຊື່ ແລະ ນາມສະກຸນ:
                    <input type="text "  name="cus_name" class=" form-control"  placeholder=" ຊື່ ແລະ ນາມສະກຸນ..." required >  <br> 
                    ບ່ອນຈັດສົ່ງສີ້ນຄ້າ:
                    <textarea class=" form-control"  placeholder=" ທີ່ຢູ່..."  name="cus_add" rows="3" required  ></textarea>  <br> 
                    ເບີໂທລະສັບ:
                    <input type="number "  name="cus_tel" class=" form-control"  placeholder="  ເບີໂທລະສັບ..." required  >
                    <br> 
                </div>
            </div>
       </div>
       </form>
   </div>
                 
</body>
</html>