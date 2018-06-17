<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$name = $_GET['name'];

$sqlbrain = new SQLBrain();

if ($name != null) {
    $sql = $sqlbrain->do_query("select * from Exchange where name = '$name'");
} else {
    $sql = $sqlbrain->do_query("select * from Exchange");
}

echo json_encode($sql);


?>