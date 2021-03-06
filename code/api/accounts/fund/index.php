<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$user_id = $_GET['user_id'];
$exchange_name = $_GET['exchange_name'];
$commodity_name = $_GET['commodity_name'];
$amount = $_GET['amount'];

$gateKeeper = new Gatekeeper();
echo json_encode($gateKeeper->fund_account($user_id, $commodity_name, $exchange_name, $amount));

?>