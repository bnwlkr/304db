<?php

spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});


$Avg = $_GET['Avg'];
$ftq = $_GET['ftq'];



$sqlBrain = new SQLBrain();

if ("$Avg" == "minAvg") {
    $ret = $sqlBrain->do_query("select commodity_name, min(ask) from(select commodity_name, avg(ask) ask from Metric where commodity_name <> 'cad' group by commodity_name order by ask asc) as T");
    echo json_encode($ret);

} else if ("$Avg" == "maxAvg") {
    $ret = $sqlBrain->do_query("select commodity_name, max(ask) from(select commodity_name, avg(ask) ask from Metric where commodity_name <> 'cad' group by commodity_name order by ask desc) as T");

    echo json_encode($ret);
} else if ($ftq) {
echo "01000101 01100001 01110011 01110100 01100101 01110010 00100000 01000101 01100111 01100111 00100000 01100010 01100101 01100011 01100001 01110101 01110011 01100101 00100000 01110100 01101000 01101001 01110011 00100000 01110001 01110101 01100101 01110010 01111001 00100000 01101001 01110011 00100000 01110011 01110100 01110101 01110000 01101001 01100100 00101110";
}





?>