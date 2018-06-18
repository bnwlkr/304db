<?php

spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});

$user_id=$_GET['user_id'];

$sqlBrain = new SQLBrain();

echo json_encode($sqlBrain->do_query("delete from User where user_id = '$user_id'"));

?>