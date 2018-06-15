<?php

$commodity_name = $_GET['commodity_name'];
$company_site = $_GET['company_site'];

// CALL SQL
$sql = SQLBRAIN();
$sql.getstock($commodity_name, $company_site);
echo json_encode($sql);


?>