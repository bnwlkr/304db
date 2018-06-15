<?php

$name = $_GET['name'];
$website = $_GET['website'];



// CALL SQL
$sql = SQLBRAIN();
$sql.getexchanges($name, $website);
echo json_encode($sql);


?>