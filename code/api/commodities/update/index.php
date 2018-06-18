<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$commodity_name = $_GET['commodity_name'];
$exchange_name = $_GET['exchange_name'];
$ask = $_GET['ask'];
$bid = $_GET['bid'];
$volume = $_GET['volume'];


$updater = new Updater();

echo json_encode($updater->do_update($commodity_name, $exchange_name, $bid, $ask, $volume));
