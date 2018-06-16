<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';});


$search = $_GET['search'];
$min_price = $_GET['min_price'];
$max_price = $_GET['max_price'];
$exchange_name = $_GET['exchange_name'];

$sqlBrain = new SQLBrain();

$sqlBrain->start();

$ret = array();

if ($search != null) {
    $ret = $sqlBrain->do_query("select * from Commodity where name like '%search'");
} else if ($exchange_name != null) {
    $ret = $sqlBrain->do_query("select  from Traded_On, Commodity where exchange_name='$exchange_name'");
else if ($max_price!=null&&$min_price!=null) {
    $ret = $sqlBrain->do_query("select * from Commodity ")
}



echo json_encode($result);

?>
