<?php


spl_autoload_register(function ($class_name) {
    include '../../Classes/'. $class_name . '.php';});


$user_id = $_GET['user_id'];
$choice = $_GET['choice'];

$sqlBrain = new SQLBrain();

if ("$choice" == "biggest") {
    echo json_encode($sqlBrain->do_query("select max(price * quantity) as spent from Trade where user_id=$user_id group by user_id order by max(price* quantity) asc"));
} else if ("$choice" == "number") {
    echo json_encode($sqlBrain->do_query("select count(*) as nO_trades from Trade where user_id=$user_id group by user_id"));
}
