<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});

$name = $_GET['name'];
$website = $_GET['website'];
$sql = array();


// CALL SQL
$sqlbrain = new SQLBrain();
$sqlbrain->start();
if ($name != null && $website == null) {
$sql = $sqlbrain->do_query("select name from Exchange where name = $name");
} else {
    if ($name == null && $website != null) {
        $sql = $sqlbrain->do_query("select website from Exchange where website = $website");
    } else {
        $sql = $sqlbrain->do_query("select name from Exchange");
    }
}

echo json_encode($sql);


?>