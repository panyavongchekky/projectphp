<?php

session_start();
include 'config.php';
if (!isset($_SESSION["emp_userid"])) {
    $show = header("location:login.php"); //ບັງຄັບໃຫ້ລ່ອກອີນ
}
//ບໍ່ທັນຈ່າຍເງີນ
$sql1 = "SELECT COUNT(orderID) AS order_no FROM tb_order WHERE order_status='1'";
$hand = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($hand);

//ຈ່າຍແລ້ວ
$sql2 = "SELECT COUNT(orderID) AS order_yes FROM tb_order WHERE order_status='2'";
$hand2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_array($hand2);

//ຍົກເລີກ
$sql3 = "SELECT COUNT(orderID) AS order_cancel FROM tb_order WHERE order_status='0'";
$hand3 = mysqli_query($con, $sql3);
$row3 = mysqli_fetch_array($hand3);

//ນ້ອຍກ່ອນສີບ
$sql4 = "SELECT COUNT(pro_id) AS pro_num FROM product WHERE amount <=10";
$hand4 = mysqli_query($con, $sql4);
$row4 = mysqli_fetch_array($hand4);

?>
<?php include 'menu1.php' ?>
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
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">ລາຍການສັ່ງຊື້ ຍັງບໍ່ໄດ້ຊຳລະເງີນ<h4>[<?= $row1['order_no'] ?>]</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">ລາຍການສັ່ງຊື້ ໄດ້ຊຳລະເງີນແລ້ວ<h4>[<?= $row2['order_yes'] ?>]</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order.yes.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger  text-white mb-4">
                            <div class="card-body">ລາຍການສັ່ງຊື້ ທີ່ຍົກເລີກ<h4>[<?= $row3['order_cancel'] ?>]</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="report_order_no.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">ລາຍການສີ້ນທີ່ຍັງຫລືອໝ່ອຍກ່ອນ 10 ອັນ<h4>[<?= $row4['pro_num'] ?>]</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="pro-stock.php">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                ລາຍງານສີ້ນຄ້າທີ່ຍັງເຫລືອ
                            </div>
                            <div class="card-body"><canvas id="graphCanvas" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                ລາຍງານຍອດຂາຍໃນແຕ່ລະເດືອນ
                            </div>
                            <div class="card-body"><canvas id="graphCanvas1" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
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
                                $sql = "SELECT * FROM product p,type t WHERE p.type_id = t.type_id";
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
                                        <td><a href="addstock.php?id=<?= $row['pro_id'] ?>" class="btn btn-success">ເພີ່ມ</a></td><!--ສົ່ງໄປ addstock-->
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
        <?php include 'footer.php' ?>


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


<script type="text/javascript" src="chart.js/js/Chart.min.js"></script>
<script type="text/javascript" src="chart.js/js/jquery.min.js"></script>


</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            showGraph();
        });


        function showGraph() {
            {
                $.post("data_product.php",
                    function(data) {
                        console.log(data);
                        var name = [];
                        var marks = [];

                        for (var i in data) {
                            name.push(data[i].pro_name);
                            marks.push(data[i].amount);
                        }

                        var chartdata = {
                            labels: name,
                            datasets: [{
                                label: 'ຈຳນວນທີ່ຍັງເຫລືອ',
                                backgroundColor: '#00ccff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }]
                        };

                        var graphTarget = $("#graphCanvas");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata
                        });
                    });
            }
        }
    </script>


    <!--ຍອດຂາຍແຕ່ລະເດືອນ-->

    <script>
        $(document).ready(function() {
            showGraph1();
        });


        function showGraph1() {
            {
                $.post("data_sale.php",
                    function(data) {
                        console.log(data);
                        var name = [];
                        var marks = [];

                        for (var i in data) {
                            name.push(data[i].dateMonth);
                            marks.push(data[i].sumTal);
                        }

                        var chartdata = {
                            labels: name,
                            datasets: [{
                                label: 'ຍອດລວມ',
                                backgroundColor: '#33ffbb',
                                borderColor: '#009966',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }]
                        };

                        var graphTarget = $("#graphCanvas1");

                        var barGraph = new Chart(graphTarget, {
                            type: 'line',
                            data: chartdata
                        });
                    });
            }
        }
    </script>