<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$move = $_GET['move'];
$user_id = $_GET['user_id'];
$commodity_name = $_GET['commodity_name'];
$exchange_name = $_GET['exchange_name'];
$quantity = $_GET['quantity'];

$trader = new Trader();

if (!$trader->has_account($user_id, $exchange_name)) {
    exit(json_encode("no account"));
}

echo json_encode($trader->buy($user_id, $commodity_name, $exchange_name, $quantity));

?>