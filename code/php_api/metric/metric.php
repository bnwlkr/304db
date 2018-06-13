<?php

$name = $_GET['name'];
$timestamp = $_GET['timestamp'];
$tradedon_commodity = $_GET['tradedon_commodity'];
$tradedon_exchange = $_GET['tradedon_exchange'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getmetric($name, $timestamp, $tradedon_commodity, $tradedon_exchange);
echo json_encode($sql);


?>