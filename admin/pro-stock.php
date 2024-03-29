

<?php 

session_start();
include 'config.php';
if(!isset( $_SESSION["emp_userid"]))
{
    $show = header("location:login.php");//ບັງຄັບໃຫ້ລ່ອກອີນ
}

?>
<?php include 'menu1.php'?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                             <h4 class="alert alert-danger">ລາຍການສີ້ນຄ້າຍັງນ້ອຍກ່ອນ 10 ແລ້ວເດີ</h4> 
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
                                            <th>ເພີ່ມສະຕ໋ອກສີ້ນຄ້າ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>pro_id</th>
                                            <th>pro_name</th>
                                            <th>detail</th>
                                            <th>type_name</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM product p,type t WHERE p.type_id = t.type_id AND amount < 10";
                                        $hand = mysqli_query($con,$sql);
                                        while($row = mysqli_fetch_array($hand))
                                        {
                                        ?>
                                        <tr>
                                            <td><img src="../img/<?=$row['image']?>" width="100px" height="100px"></td>
                                            <td><?=$row['pro_id']?></td>
                                            <td><?=$row['pro_name']?></td>
                                            <td><?=$row['detail']?></td>
                                            <td><?=$row['type_name']?></td>
                                            <td><?=$row['price']?></td>
                                            <td><?=$row['amount']?></td>
                                            <td><a href="addstock.php?id=<?=$row['pro_id']?>" class="btn btn-success">ເພີ່ມ</a></td><!--ສົ່ງໄປ addstock-->
                                        </tr>
                                        <?php }
                                    mysqli_close($con);
                                    ?> 
                                    </tbody>
                                   
                                </table>
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