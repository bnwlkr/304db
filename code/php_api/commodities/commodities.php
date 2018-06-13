<?php

$name = $_GET['name'];
$minprice = $_GET['min_price'];
$maxprice = $_GET['max_price'];
$metricname = $_GET['metric_name'];


// CALL SQL
$sql = SQLBRAIN();
$sql.getcommodities($name, $minprice, $maxprice, $metricname);
echo json_encode($sql);


?>