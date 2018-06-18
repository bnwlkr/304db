<?php

spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});


$since = $_GET['since'];
$user_id = $_GET['user_id'];


$sqlbrain = new SQLBrain();

if ($since) {
    $sql = $sqlbrain->do_query("select * from Trade where UNIX_TIMESTAMP(timestamp) > $since and user_id=$user_id");
} else {
    $sql = $sqlbrain->do_query("select * from Trade where user_id = $user_id");
}
echo json_encode($sql);
?>