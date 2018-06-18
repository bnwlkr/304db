<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$name=$_GET['name'];
$email=$_GET['email'];
$password=$_POST['password'];

$gateKeeper = new Gatekeeper();

echo json_encode($gateKeeper->create_account($name, $email, $password));

?>