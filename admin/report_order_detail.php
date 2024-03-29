<?php 

session_start();
if(!isset( $_SESSION["emp_userid"]))
{
    $show = header("location:login.php");//ບັງຄັບໃຫ້ລ່ອກອີນ
}
?>

<?php 
require "config.php";
$ids = $_GET['id'];//ມາຈາກລີພອດອໍເດີ ລາຍລະອຽດ
//ແຈ້ງການຊຳລະເງີນ
$sql1  = "SELECT * FROM tb_order t, payment m WHERE t.orderID = m.orderID AND t.orderID = '$ids'";
$result1 = mysqli_query($con,$sql1 );
$row1 = mysqli_fetch_array($result1);
$image_bill = $row1['pay_image'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" >
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php 
require "menu1.php";  ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 ລາຍການສີ້ນຄ້າທີ່ໄດ້ສັ່ງຊື້
                                 <div>
                                     <br>
                                     <a href="report_order.php">   <button type="button" class="btn btn-success ">ກັບໄປຫນ້າຫລັກ</button></a>
                                     </div>
                                     <br>
                            <div class="card-body">
                                        <h5>ເລກທີ່ໃບບີນສັ່ງຊື້  <?=$ids?> </h5>
                                <table class="table table-success table-striped">
                                    <thead>
                                        <tr>
                                            <th>ລະຫັດສີ້ນຄ້າ</th>
                                            <th>ຊື່ສີ້ນຄ້າ</th>
                                            <th>ລາຄາ</th>
                                            <th>ຈຳນວນ</th>
                                            <th>ລາຄາລວມ</th>
                                         
                                          
                                        </tr> 
                                    </thead>
                                   
                                    
                                    <?php  
                                   
                                    $sql = "SELECT * FROM  order_detail d, product p, tb_order t WHERE d.orderID=t.orderID 
                                    AND d.pro_id = p.pro_id AND d.orderID='$ids' ORDER BY  d.pro_id";
                                    $result = mysqli_query($con, $sql);
                                    $sum_total =0;
                                    while($row = mysqli_fetch_array( $result)){
                                    $sum_total = $row['total_price'];  //ສ້າງມາຮັບຄ່າtotal_price

                                   
                                    ?>
                                       
                                            <tr>
                                               <td><?=$row['pro_id']?></td>      <!--product-->
                                               <td><?=$row['pro_name']?></td>    <!--product-->
                                               <td><?=$row['orderPrice']?></td>  <!--detail-->
                                               <td><?=$row['orderQty']?></td>    <!--detail-->
                                               <td><?=$row['Total']?></td>       <!--detail-->
                                            
                                            
                                          
                             <?php } 
                             mysqli_close($con);
                             ?> 
                              </tbody>
                                </table>
                                <b>ເງີນທີ່ຕ້ອງຈ່າຍ<?=number_format($sum_total,2)?> kip </b>   <!--tb_order/-->
                            </div>
                        </div>
                        <div class="text-center">
                                        <?php  
                                        if($image_bill != ""){  ?>
                                        <div class="text-center">
                                            <h5>ຫລັກຖານການຊຳລະເງີນ</h5><br>
                                            <img src="./img/<?=$row1['pay_image']?>" width="100px">
                                        </div>
                                        <?php } else{ ?>
                                          <h5>ຍັງບໍ່ໄດ້ຊຳລະເງີນ</h5>
                                       <?php }  ?>
                                      
                        </div>
                    </div>
                </main>
                <?php include 'footer.php'?>
               

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

       