<?php

$id = $_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getusers($id, $name, $email);
echo json_encode($sql);


?>