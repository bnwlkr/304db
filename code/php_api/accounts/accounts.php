<?php

$user_id = $_GET['user_id'];
$exchange_name = $_GET['exchange_name'];
$balance = $_GET['balance'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getaccounts($user_id, $exhange_name, $balance);
echo json_encode($sql);


?>