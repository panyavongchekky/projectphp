<?php
header('Content-Type: application/json');

include 'config.php';

$sqlQuery = "SELECT * FROM product ORDER BY pro_id";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>