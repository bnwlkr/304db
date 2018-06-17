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

    function buy ($user_id, $commodity_name, $exchange_name, $quantity) {
        $user_balance = $this->get_balance($exchange_name, $user_id);
        $ask = $this->get_ask($exchange_name, $commodity_name, $quantity);
        $total = (double)$quantity * $ask;
        if ($user_balance>=$total) {
            $new_balance = $user_balance - $total;
            $take = $this->sqlBrain->do_query("update Account
                                              set value = $new_balance
                                              where user_id=$user_id and commodity_name='cad' and exchange_name='$exchange_name'");
            $give = $this->sqlBrain->do_query("update Account
                                              set value = $new_balance
                                              where user_id=$user_id and commodity_name='$commodity_name' and exchange_name='$exchange_name'");
            return $take && $give;
        } else {
            return false;
        }
    }

    function get_balance ($exchange_name, $user_id) {
        $result = $this->sqlBrain->do_query("select Account.value from Account where commodity_name='cad' and user_id=1 and exchange_name='$exchange_name'");
        return (int)$result[0]['value'];
    }

    function get_ask ($exchange_name, $commodity_name, $quantity) {
        $result = $this->sqlBrain->do_query("select Metric.ask from Metric join Traded_On on Metric.commodity_name = Traded_On.commodity_name and Metric.exchange_name = Traded_On.exchange_name where 
                                                    Traded_On.exchange_name='$exchange_name' and Traded_On.commodity_name ='$commodity_name'");
        return (double)$result[0]['ask'];
    }

    function get_bid ($exchange_name, $commodity_name, $quantity) {
        $result = $this->sqlBrain->do_query("select Metric.bid from Metric join Traded_On on Metric.commodity_name = Traded_On.commodity_name and Metric.exchange_name = Traded_On.exchange_name where 
                                                    Traded_On.exchange_name='$exchange_name' and Traded_On.commodity_name ='$commodity_name'");
        return (double)$result[0]['bid'];
    }








}