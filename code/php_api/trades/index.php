<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$user_id = $_GET['id'];
$timestamp = $_GET['timestamp'];
$value = $_GET['price'];
$bought = $_GET['bought'];
$exchange = $_GET['exchange'];
$commodity = $_GET['commodity'];


// CALL SQL
$sqlbrain = new SQLBrain();


if ($commodity != null) {
    $sql = $sqlbrain->do_query("select * from Trade where commodity = $commodity");
} else {
    if ($exchange != null) {
        $sql = $sqlbrain->do_query("select * from Trade where exchange = $exchange");}
        else {

        $sql = $sqlbrain->do_query("select * from Exchange");
    }
}

?>