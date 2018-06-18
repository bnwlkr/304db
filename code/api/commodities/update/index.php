<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$commodity_name = $_GET['commodity_name'];
$exchange_name = $_GET['exchange_name'];
$ask = ['ask'];
$bid = $_GET['bid'];
$volume = ['volume'];


$updater = new Updater();

$updater->do_update($commodity_name, $exchange_name, $bid, $ask, $volume);
