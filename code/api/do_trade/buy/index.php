<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$move = $_GET['move'];
$user_id = $_GET['user_id'];
$commodity_name = $_GET['commodity_name'];
$exchange_name = $_GET['exchange_name'];
$quantity = $_GET['quantity'];

$trader = new Trader();
$gateKeeper = new Gatekeeper();

if (!$gateKeeper->has_account($user_id, $exchange_name, $commodity_name)) {
    exit(json_encode(100));
}

echo json_encode($trader->buy($user_id, $commodity_name, $exchange_name, $quantity));

?>