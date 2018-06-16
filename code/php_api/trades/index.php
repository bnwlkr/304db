<?php

$id = $_GET['id'];
$timestamp = $_GET['timestamp'];
$price = $_GET['price'];
$bought = $_GET['bought'];


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

?>