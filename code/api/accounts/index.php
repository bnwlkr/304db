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
$count = $_GET['count'];
$create = $_GET['create'];
$fund = $_GET['fund'];
$amount = $_GET['amount'];
$avg = $_GET['avg'];
$min = $_GET['min'];
$max = $_GET['max'];


if ($fund) {
    $gateKeeper = new Gatekeeper();
    exit(json_encode($gateKeeper->fund_account($user_id, $commodity_name, $exchange_name, $amount)));
}

if ($create) {
    $gateKeeper = new Gatekeeper();
    exit(json_encode($gateKeeper->create_exchange_account($user_id, $exchange_name)));
}

$sqlBrain = new SQLBrain();

if ($total) {
    $ret = $sqlBrain->do_query("select  Account.commodity_name, sum(Account.value) from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id group by Account.commodity_name");
} else if ($count){
    $ret = $sqlBrain->do_query("select   count(Account.commodity_name) from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id");
} else if ($exchange_name && $commodity_name) {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id and exchange_name='$exchange_name' and commodity_name='$commodity_name'");
} else if ($exchange_name) {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id and exchange_name='$exchange_name'");
} else if ($commodity_name) {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account left join User On Account.user_id=User.id 
                                                where Account.commodity_name='$commodity_name'");
} else {
    $ret = $sqlBrain->do_query("select Account.exchange_name, Account.commodity_name, Account.value from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id");
}

echo json_encode($ret);





?>