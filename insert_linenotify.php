<?php 
session_start();
if(isset($_POST['submit'])){

    $pname = $_POST['pname'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sToken = "3Gqo4i2aaFW9UcX5DKsRyhI9SY9TGOada5OyfzIgEw1";
    $sMessage = "ມີລາຍການສັ່ງຊື້ໃຫມ່ເຂົ້າມາ....\n";
    $sMessage .= "ຊື່: ".$pname."\n";
    $sMessage .= "ອີ່ເມວ: ".$email."\n";
    $sMessage .= "ບ່ອນສົ່ງ: ".$address."\n";


$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt( $chOne, CURLOPT_POST, 1);
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage);
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );
//Result error
/*
if(curl_error($chOne))
{
echo 'error:' . curl_error($chOne);
}
else {
$result_ = json_decode($result, true);
echo "status : ".$result_['status']; echo "message : ". $result_['message'];
}
 
*/

if($result){
  $_SESSION['success'] = "ສົ່ງຂໍ້້ມູນແຈ້ງເຕືອນຜ່ານ line ສຳເລັດແລ້ວ";
  header("location: fr_user_test.php");
}else{
  $_SESSION['error'] = "ສົ່ງຂໍ້້ມູນແຈ້ງເຕືອນຜ່ານ line ຜິດຜາດ";
  header("location: fr_user_test.php");
}

curl_close( $chOne ); 
}
   
?>
