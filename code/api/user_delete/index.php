<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$confirm=$_GET['confirm'];
$user_id=$_GET['user_id'];

$sqlBrain = new SQLBrain();


    $sqlBrain->do_query("delete from Account where user_id = '$user_id'");
    $sqlBrain->do_query("delete from User where user_id = '$user_id'");


echo json_encode(1);
?>