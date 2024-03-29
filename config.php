<?php
$con = mysqli_connect("localhost","root","","posfinal");//ເຊ່ືອມໂຕເອງ
mysqli_select_db($con,'posfinal') or die('no database');//ເລື້ອເໍຊີບແລະຖານ ຖ້າພາດສະແດງບໍ່ມີ
mysqli_set_charset($con,'utf8');// ຮອງຮັຍທຸກພາສາ
?>