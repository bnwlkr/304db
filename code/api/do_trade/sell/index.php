<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$move = $_GET['move'];
$user_id = $_GET['user_id'];
$commodity_name = $_GET['commodity_name'];
$exchange_name = $_GET['exchange_name'];
$quantity = $_GET['quantity'];

$trader = new Trader();

if (!$trader->has_account($user_id, $exchange_name)) {
    exit(json_encode(300));
}

echo json_encode($trader->sell($user_id, $commodity_name, $exchange_name, $quantity));

?>
