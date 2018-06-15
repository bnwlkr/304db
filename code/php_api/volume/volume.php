<?php

$metric_name = $_GET['metric_name'];
$daily = $_GET['daily'];
$hourly = $_GET['hourly'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getvolume($metric_name, $daily, $hourly);
echo json_encode($sql);


?>