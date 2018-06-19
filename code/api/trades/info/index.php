<?php


spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});


$user_id = $_GET['user_id'];
$biggest = $_GET['biggest'];
$number = $_GET['number'];

$sqlBrain = new SQLBrain();

if ($biggest) {
    echo json_encode($sqlBrain->do_query("select timestamp, commodity_name, exchange_name, max(price * quantity) as spent from Trade where user_id=$user_id group by user_id order by max(price* quantity) asc"));
} else if ($number) {
    echo json_encode($sqlBrain->do_query("select count(*) as nO_trades from Trade where user_id=1 group by user_id"));
}