
<?php 

session_start();
if(!isset( $_SESSION["emp_userid"]))
{
    $show = header("location:login.php");//ບັງຄັບໃຫ້ລ່ອກອີນ
}
?>
<?php include 'menu1.php' ;
require "config.php";

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
        

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                          <div class="alert alert-primary h4 text-center mt-4" role="alert">
                                  ລາຍງານການຂາຍສີ້ນຄ້າ 
                           </div>

                                 
                                 <div>
                                      <form name="form1" method="POST" action="report_sale1.php">
                                      <div class="row">
                                             <div class="col-sm-2">
                                                  <input type="date" name="dt1" class="form-control">
                                             </div>
                                            <div class="col-sm-2">
                                                  <input type="date" name="dt2" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                   <button type="submit" class="btn btn-success" ><i class="fas fa-search"></i></button>
                                            </div>
                                       </div>
                                      </form>
                                 </div>
                            </div>
                            <div class="card-body">
                                <table  class="table table-success table-striped">
                                    <thead>
                                        <tr>
                                            <th>ເລກທີ່ໃບບີນສັ່ງຊື້</th>
                                            <th>ວັນທີ່ການສັ່ງຊື້</th>
                                            <th>ລູກຄ້າ</th>
                                            <th>ທີ່ຢູ່ຈັດສົ່ງສີ້ນຄ້າ</th>
                                            <th>ເບີໂທລະສັບ</th>
                                            <th>ລາຄາ</th>
                                         
                                            
                                           
                                        </tr>
                                    </thead>
                                  
                                    
                                    <?php  
                                    $ddt1 =@$_POST['dt1'];
                                    $ddt2 =@$_POST['dt2'];
                                    $add_date= date('Y/m/d', strtotime($ddt2."+1 days"));

                        if(($ddt1 != "")  & ($ddt2 !="")){
                          echo "ຄົ້ນຫາຈາກວັນທີ່ $ddt1 ຮອດ $ddt2 ";
                          $sql = "SELECT * FROM tb_order WHERE order_status = '2' AND reg_date BETWEEN '$ddt1' AND '$ddt1' 
                          ORDER BY reg_date DESC";
                        }else{
                           $sql = "SELECT * FROM tb_order WHERE order_status ='2' ORDER BY reg_date DESC ";
                             }

                                    $total_sum=0;//ຕ້ອງນອກລຸບ ໃນເຮັດວຽກບໍ່ໄດ້
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array( $result)){
                                    $total_sum =$total_sum + $row['total_price'];
                            
                                    ?>
                                       
                                            <tr>
                                               <td><?=$row['orderID']?></td>
                                               <td><?=$row['reg_date']?></td>
                                               <td><?=$row['cus_name']?></td>
                                               <td><?=$row['address']?></td>
                                               <td><?=$row['telephone']?></td>
                                               <td><?=$row['total_price']?></td>
                                            
                                            </tr>
                                   
                              <?php } 
                             mysqli_close($con);
                             ?> 
                              </tbody>
                                </table>
                                   <div class="text-end"><b>ລວມເປັນເງີນທັງໝົດ <?= number_format($total_sum,2)?>ກິບ</b></div>
                            </div>
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