<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


spl_autoload_register(function ($class_name) {
    include '../Classes/'. $class_name . '.php';});


$min_price = $_GET['min_price'];
$max_price = $_GET['max_price'];
$exchange_name = $_GET['exchange_name'];
$commodity_name = $_GET['commodity_name'];

$sqlBrain = new SQLBrain();

$query10 = "select Metric.* from Metric join (select Commodity.name, Traded_On.exchange_name from Commodity join 
                  Traded_On on Commodity.name = Traded_On.commodity_name where Traded_On.exchange_name='$exchange_name') as 
                  comms on Metric.commodity_name = comms.name and comms.exchange_name = Metric.exchange_name";
$query01 = "select Metric.* from Metric join (select Commodity.name, Traded_On.exchange_name from Commodity join 
                  Traded_On on Commodity.name = Traded_On.commodity_name) as 
                  comms on Metric.commodity_name = comms.name and comms.exchange_name = Metric.exchange_name where Metric.commodity_name = '$commodity_name'";
$query11 = "select Metric.* from Metric join (select Commodity.name, Traded_On.exchange_name from Commodity join 
                  Traded_On on Commodity.name = Traded_On.commodity_name where Traded_On.exchange_name='$exchange_name') as 
                  comms on Metric.commodity_name = comms.name and comms.exchange_name = Metric.exchange_name 
                  where Metric.commodity_name='$commodity_name'";


if ($exchange_name != null && $commodity_name == null) {  // list all the commodities on a particular exchange
    $ret = $sqlBrain->do_query($query10);
} else if ($exchange_name == null && $commodity_name != null) {
    $ret = $sqlBrain->do_query($query01);
} else if ($exchange_name != null && $commodity_name != null) {
    $ret = $sqlBrain->do_query($query11);
} else if ($min_price != null && $max_price != null) {
        $ret = $sqlBrain->do_query("select Metric.* from Metric join Commodity on Metric.commodity_name = Commodity.name 
                                              where Metric.ask BETWEEN $min_price and $max_price");
}

echo json_encode($ret);

?>