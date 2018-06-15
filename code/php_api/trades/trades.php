<?php

$id = $_GET['id'];
$timestamp = $_GET['timestamp'];
$price = $_GET['price'];
$bought = $_GET['bought'];


// CALL SQL
$sql = SQLBRAIN();
$sql.gettrades($id, $timestamp, $price, $bought);
echo json_encode($sql);


?>