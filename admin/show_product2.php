<?php
// เริ่มคำสั่ง Export ไฟล์ PDF
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'PHETSARATH_OT' => [
            'P' => 'PHETSARATH_OT.ttf', 
        ]
    ], 
    'default_font' => 'sarabun'
]);
 // สิ้นสุดคำสั่ง Export ไฟล์ PDF ในส่วนบน เริ่มกำหนดตำแหน่งเริ่มต้นในการนำเนื้อหามาแสดงผลผ่าน
$mpdf->SetFont('PHETSARATH_OT','',14);
ob_start();  //ฟังก์ชัน ob_start()
?>

<?php 
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>show product2</title>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet" >
</head>
<body>
      
<div class="container">
          <h4 class="text-center">ລາຍລະອຽດສີ້ນຄ້າ</h4><br>

     <table class="table">
      <tr>
         <th>ລະຫັດສີ້ນຄ້າ</th>
         <th>ຊື້ສີ້ນຄ້າ</th>
         <th>ຈຳນວນ</th>
         <th class="text-end">ລາຄາ</th>
      <tr>
        <?php
        $total = 0;
        $sql = "SELECT * FROM product ORDER BY pro_id";
        $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_array($result)){
        $total =  $total+$row['price'];

        ?>
     </tr>
        <td><?=$row['pro_id']?> </td>
        <td><?=$row['pro_name']?></td>
        <td><?=$row['amount']?></td>
        <td class="text-end"><?=$row['price']?></td>
    </tr>
    <?php
       }
       mysqli_close($con);
        ?>
     </table>
     <h4 class="text-end">ລວມເປັນເງີນ <?=number_format($total,2)?></h4>
     <?php
 // คำสั่งการ Export ไฟล์เป็น PDF
$html = ob_get_contents();      // เรียกใช้ฟังก์ชัน รับข้อมูลที่จะมาแสดงผล
$mpdf->WriteHTML($html);        // รับข้อมูลเนื้อหาที่จะแสดงผลผ่านตัวแปร $html
$mpdf->Output('Report.pdf');  //สร้างไฟล์ PDF ชื่อว่า myReport.pdf
ob_end_flush();                 // ปิดการแสดงผลข้อมูลของไฟล์ HTML ณ จุดนี้
?>

<!--การสร้างลิงค์ เรียกไฟล์ myReport.pdf แสดงผลไฟล์ PDF  -->
<a href="Report.pdf"><button class="btn btn-primary">Export PDF</button> </a>
</div>

</body>
</html>