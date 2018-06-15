<?php

$exchangename = $_GET['exchangename'];
$commodityname = $_GET['commodityname'];

// CALL SQL
$sql = SQLBRAIN();
$sql.gettradedon($exchangename, $commodityname);
echo json_encode($sql);


?>