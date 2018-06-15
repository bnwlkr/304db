<?php
spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';});

$sqlBrain = new SQLBrain();

$search = $_GET['search'];
$max_price = $_GET['max_price'];
$min_price = $_GET['min_price'];
$exchange_name = $_GET['exchange_name'];

$result = $sqlBrain.get_commodities($search, $min_price, $max_price, $exchange_name);

echo json_encode($result);

?>
