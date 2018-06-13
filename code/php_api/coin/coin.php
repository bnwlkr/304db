<?php

$commodity_name = $_GET['commodity_name'];
$ICO_value = $_GET['ICO_value'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getcoin($commodity_name, $ICO_value);
echo json_encode($sql);


?>