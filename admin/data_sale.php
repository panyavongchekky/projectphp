<?php
header('Content-Type: application/json');

include 'config.php';

$sqlQuery = "SELECT SUM(total_price) AS sumTotal,dateMonth FROM tb_order GROUP BY dateMonth ORDER BY dateMonth";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>