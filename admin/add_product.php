
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
                      
                        <div class="card mb-4 mt-4">
                          
                            
                            <div class="card-body">
               <div class="row">
                 <div class="col-sm-6">

                               
      <div class="alert alert-primary h4" role="alert">
            ເພີ່ມຂໍ້ມູນສີ້ນຄ້າ
      </div>
      <form method="post" action="insert_product.php" enctype="multipart/form-data">
      <label>ລະຫັດສີນຄ້າ: </label>
      <input type="text" name="pid"  class="form-control" placeholder="ລະຫັດສີນຄ້າ..." required>
      <label>ຊຶື່ສີນຄ້າ: </label>
      <input type="text" name="pname"  class="form-control" placeholder="ຊຶື່ສີນຄ້າ..." required>
      <label>ລາຍລະອຽດສີນຄ້າ: </label>
      <textarea class="form-control" placeholder="ລາຍລະອຽດສີນຄ້າ..." required name="detail"></textarea>
      <label>ປະເພດສິ້ນຄ້າ: </label>
      <select name="typeID" class="form-select">

     <?php
     $sql = "SELECT * FROM type ORDER BY type_name";
     $hand = mysqli_query($con , $sql);
     while($row  = mysqli_fetch_array($hand)){
      ?>
      <option value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
      <?php
    }
    mysqli_close($con);
     ?>
     </select>
  
     <label>ລາຄາ: </label>
     <input type="number" name="price"  class="form-control" required placeholder="ລາຄາ..."><br>
     <label>ຈຳນວນ: </label>
     <input type="number" name="num"  class="form-control" required placeholder="ຈຳນວນ..."><br>
     <label>ຮູບພາບ: </label>
     <input type="file" name="file1"  class="form-control" required ><br>
     <button type="submit" class="btn btn-primary">submit</button>
     <a href="show_product.php" role="button" class="btn btn-danger">cancel</a>
  
      </form>
      </div>
            </div>                     
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

        <script> function del(mypage){
            var agree = confirm('ເຈົ້າຕ້ອງການຍົກເລີຍການສັ່ງຊື້ແທ້ຫລືບໍ່');
            if (agree){
                window.location=mypage;
            }
        }
         function del1(mypage1){
            var agree = confirm('ເຈົ້າຕ້ອງການປັບສະຖານະການຈ່າຍເງີນແທ້ຫລືບໍ່');
            if (agree){
                window.location=mypage1;
            }
        }
            </script> 