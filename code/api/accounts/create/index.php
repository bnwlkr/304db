<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$user_id = $_GET['user_id'];
$exchange_name = $_GET['exchange_name'];
$commodity_name = $_GET['commodity_name'];


$gateKeeper = new Gatekeeper();
echo json_encode($gateKeeper->create_exchange_account($user_id, $exchange_name));


?>