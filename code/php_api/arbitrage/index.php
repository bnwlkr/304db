<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});


$sqlBrain = new SQLBrain();

    $ret = array($sqlBrain->do_query("select  Account.exchange_name from Account join User On Account.user_id = User.id 
                                          where User.id = $user_id" ));

    $sql = $sqlBrain->do_query("select commodity_name, exchange_name, bid, ask from Metric group by commodity_name join Exchange On ");






echo json_encode($ret);





?>