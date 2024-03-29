<?php  
session_start();
 require "config.php";

 $cusname = $_POST['cus_name'];
 $cusaddress =  $_POST['cus_add'];
 $custel =  $_POST['cus_tel'];
 $dmonth = date('F');


 $sql = "INSERT INTO tb_order(cms_name,address,telephone,total_price,order_status,dateMonth)
 values(' $cusname ',' $cusaddress','$custel ','" .$_SESSION["sum_price"] ."','1',' $dmonth')";
 echo  $sql;
 mysqli_query($con, $sql);
 
 $orderID = mysqli_insert_id($con); 
      // print id
 $_SESSION["order_id"] =  $orderID;


// echo $orderID;
 for($i = 0; $i <= (int) $_SESSION["intLine"]; $i++) {
         if(( $_SESSION["strProductID"][$i]) !=""){
            $sql1 = "SELECT * FROM product WHERE pro_id ='" . $_SESSION["strProductID"][$i]."' ";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_array( $result1 );
            $price =   $row1['price'];
            $total = $_SESSION["strQty"][$i] *  $price ;


            $sql2 = "INSERT INTO order_detail(pro_id,orderPrice,orderQty,Total)
            values('".$_SESSION["strProductID"][$i]."',' $price',
            '" .$_SESSION["strQty"][$i]."','$total')";

            if(mysqli_query($con,$sql2)){
                    //ຕັດສະຕອກສີ້ນຄ້າ
                    $sql3 = " UPDATE product SET amount= amount - '". $_SESSION["strQty"][$i]."'
                      WHERE pro_id= '" .$_SESSION["strProductID"][$i]."'";
                     mysqli_query($con,$sql3);

                     echo "<script> alert('ບັກຂໍ້ມູນສຳເລັດແລ້ວ')</script>";
                    echo "<script> window.location='print_order.php';</script>"; 
            }
         }
 }

mysqli_close($con);
unset($_SESSION["intLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_price"]); 
 ?>

  