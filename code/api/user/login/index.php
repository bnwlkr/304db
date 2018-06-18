<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$email=$_GET['email'];
$password=$_POST['password'];

$gateKeeper = new Gatekeeper();

$resp = $gateKeeper->check_credentials($email, $password);

echo json_encode($resp);
