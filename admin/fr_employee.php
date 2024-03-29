
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

                               
      <div class="alert alert-primary h3" role="alert">
      ສະໝັກສະມາຊີກ
      </div>
      <br>
      <form method="post" action="insert_register.php">
      ຊື່ <input type="text" name="firstname"  class="form-control" require>
      ນາມສະກຸນ <input type="text" name="lastname"  class="form-control" require>
      ເບີໂທລະສັບ <input type="number" name="phone"  class="form-control" require>
      username <input type="text" name="username"  class="form-control" require>
      password <input type="text" name="password"  class="form-control" require><br>
      <input type="submit" name="submit" value="ບັນທືກ" class="btn btn-primary ">
      <input type="submit" name="cancel" value="ຍົກເລີກ" class="btn btn-primary"><br>
  
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