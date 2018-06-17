<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$commodity_name = $_GET['commodity_name'];


$arbitrager = new Arbitrageur();

if ($commodity_name) {
    echo json_encode($arbitrager->search($commodity_name));
} else {
    echo json_encode($arbitrager->search(null));
}



