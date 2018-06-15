<?php

$metric_name = $_GET['metric_name'];
$value = $_GET['value'];
$source = $_GET['source'];

// CALL SQL
$sql = SQLBRAIN();
$sql.gettrend($metric_name, $value, $source);
echo json_encode($sql);


?>