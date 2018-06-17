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


    function __construct()
    {
        $this->sqlBrain = new SQLBrain();
    }


    function execute_trade ($from_commodity_name, $to_commodity_name, $to_quantity, $user_id, $exchange) {
        // first calculate the rate to_commodity/from_commodity


    }





}