<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';});


$search = $_GET['search'];
$max_price = $_GET['max_price'];
$min_price = $_GET['min_price'];
$exchange_name = $_GET['exchange_name'];

$sqlBrain = new SQLBrain();

$sqlBrain->start();

$result = $sqlBrain->get_commodities($search, $min_price, $max_price, $exchange_name);

echo json_encode($result);

?>
