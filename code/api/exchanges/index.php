<?php

spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$name = $_GET['name'];

$sqlbrain = new SQLBrain();

if ($name) {
    $sql = $sqlbrain->do_query("select * from Exchange where name = '$name'");
} else {
    $sql = $sqlbrain->do_query("select * from Exchange");
}

echo json_encode($sql);


?>