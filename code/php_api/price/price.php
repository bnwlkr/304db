<?php

$metric_name = $_GET['metric_name'];
$buy = $_GET['buy'];
$sell = $_GET['sell'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getprice($metric_name, $buy, $sell);
echo json_encode($sql);


?>