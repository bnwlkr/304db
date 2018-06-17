<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$email=$_GET['email'];
$password=$_POST['password'];

$gateKeeper = new Gatekeeper();

$resp = $gateKeeper->check_credentials($email, $password);

echo json_encode($resp);
