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
        $user_balance = $this->get_balance($exchange_name, 'cad', $user_id);
        $ask = $this->get_ask($exchange_name, $commodity_name);
        $total = (double)$quantity * $ask;
        if ($user_balance<$total) { return false;}
        $take = $this->sqlBrain->do_query("update Account
                                              set value = value - $total 
                                              where user_id=$user_id and commodity_name='cad' and exchange_name='$exchange_name'");
        $give = $this->sqlBrain->do_query("update Account
                                              set value = value + $quantity
                                              where user_id=$user_id and commodity_name='$commodity_name' and exchange_name='$exchange_name'");
        if ($take && $give) {
            $this->create_record($user_id, $commodity_name, $exchange_name, $ask, $quantity, 'buy');
        }
        return $take && $give;
    }

    function sell  ($user_id, $commodity_name, $exchange_name, $quantity) {
        $commodity_balance = $this->get_balance($exchange_name, $commodity_name, $user_id);
        if ($commodity_balance<$quantity) {return false;}
        $bid = $this->get_bid($exchange_name, $commodity_name);
        $total = (double)$quantity * $bid;
        $take = $this->sqlBrain->do_query("update Account
                                              set value = value - $quantity 
                                              where user_id=$user_id and commodity_name='$commodity_name' and exchange_name='$exchange_name'");
        $give = $this->sqlBrain->do_query("update Account
                                              set value = value + $total 
                                              where user_id=$user_id and commodity_name='cad' and exchange_name='$exchange_name'");
        if ($take && $give) {
            $this->create_record($user_id, $commodity_name, $exchange_name, $bid, $quantity, 'sell');
        }
        return $take && $give;
    }

    function get_balance ($exchange_name, $commodity_name, $user_id) {
        $result = $this->sqlBrain->do_query("select Account.value from Account where commodity_name='$commodity_name' and user_id=$user_id and exchange_name='$exchange_name'");
        return (double)$result[0]['value'];
    }

    function get_ask ($exchange_name, $commodity_name) {
        $result = $this->sqlBrain->do_query("select Metric.ask from Metric join Traded_On on Metric.commodity_name = Traded_On.commodity_name and Metric.exchange_name = Traded_On.exchange_name where 
                                                    Traded_On.exchange_name='$exchange_name' and Traded_On.commodity_name ='$commodity_name'");
        return (double)$result[0]['ask'];
    }

    function get_bid ($exchange_name, $commodity_name) {
        $result = $this->sqlBrain->do_query("select Metric.bid from Metric join Traded_On on Metric.commodity_name = Traded_On.commodity_name and Metric.exchange_name = Traded_On.exchange_name where 
                                                    Traded_On.exchange_name='$exchange_name' and Traded_On.commodity_name ='$commodity_name'");
        return (double)$result[0]['bid'];
    }

    function has_account($user_id, $exchange_name) {
        $result = $this->sqlBrain->do_query("select * from Account where exchange_name='$exchange_name' and user_id=$user_id");
        return !empty($result);
    }

    function create_record ($user_id, $commodity_name, $exchange_name, $price, $quantity, $move) {
        $this->sqlBrain->do_query("insert into Trade (user_id, exchange_name, commodity_name, price, quantity, move) values 
                                            ($user_id, '$exchange_name', '$commodity_name', $price, $quantity, '$move')");
    }









}