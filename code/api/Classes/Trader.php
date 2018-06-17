<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-16
 * Time: 3:00 PM
 */

class Trader
{

    private $sqlBrain;


    function __construct() {
        $this->sqlBrain = new SQLBrain();
    }

    function execute_trade ($user_id, $commodity_name, $exchange_name, $quantity) {
        $user_balance = $this->get_balance($exchange_name, $user_id);
    }

    function get_balance ($exchange_name, $user_id) {
        $result = $this->sqlBrain->do_query("select Account.value from Account where commodity_name='cad' and user_id=1 and exchange_name='QuadrigaCX'");
        return $result;
    }








}