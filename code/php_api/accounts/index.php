<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$user_id = $_GET['user_id'];
$exchange_name = $_GET['exchange_name'];
$commodity_name = $_GET['commodity_name'];
$total = $_GET['total'];

$sqlBrain = new SQLBrain();

if ($total == true){
    $ret = $sqlBrain->do_query("select sum(Account.value), Account.commodity_name from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id group by Account.commodity_name" );
} else if ($exchange_name!=null) {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id and exchange_name='$exchange_name'");
} else if ($commodity_name!=null) {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account left join User On Account.user_id=User.id 
                                                where Account.commodity_name='$commodity_name'");

} else {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id");
}



echo json_encode($ret);





?>