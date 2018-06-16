<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$user_id = $_GET['user_id'];
$exchange_name = $_GET['exchange_name'];

$sqlBrain = new SQLBrain();

if ($exchange_name!=null) {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id and exchange_name='$exchange_name'");
} else {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id");
}



echo json_encode($ret);





?>