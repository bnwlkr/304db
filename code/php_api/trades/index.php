<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});


$exchange_name = $_GET['exchange_name'];
$day = $_GET['day'];

//Turn day into seconds.
$day = $day * 86400;

// CALL SQL
$sqlbrain = new SQLBrain();


if ($day != null) {
    $sql = $sqlbrain->do_query("select * from Trade where timestamp > timestamp - '$day'");
} else
    if ($exchange != null) {
        $sql = $sqlbrain->do_query("select * from Trade where exchange = '$exchange'");}
  else
        $sql = $sqlbrain->do_query("select * from Trade");

echo json_encode($sql);
?>