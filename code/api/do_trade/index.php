<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

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

var_dump($move);
if ($move == "buy") {
    echo "HERE";
    exit(json_encode($trader->buy($user_id, $commodity_name, $exchange_name, $quantity)));
} else if ($move == "sell") {
    exit(json_encode($trader->sell($user_id, $commodity_name, $exchange_name, $quantity)));
}

?>