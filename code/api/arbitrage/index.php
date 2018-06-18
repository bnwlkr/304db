<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$commodity_name = $_GET['commodity_name'];
$universal = $_GET['unviversal'];

$arbitrager = new Arbitrageur();
$sqlBrain = new SQLBrain();


if ($universal) {
    exit (json_encode($sqlBrain->do_query("select commodity_name from Traded_On group by commodity_name having count(*) = (select count(*) from Exchange)")));
}

if ($commodity_name) {
    echo json_encode($arbitrager->search($commodity_name));
} else {
    echo json_encode($arbitrager->search(null));
}



