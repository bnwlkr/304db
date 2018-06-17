<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-17
 * Time: 6:49 AM
 */

class Arbitrageur
{

    private $sqlBrain;

    public function __construct()
    {
        $this->sqlBrain = new SQLBrain();
    }


    function search ($commodity_name) {
        $query = "select a.commodity_name, b.exchange_name as buy_excahange, a.exchange_name as sell_exchange, a.bid*(1.0-get_fees(a.exchange_name)) / b.ask*(get_fees(b.exchange_name)+1.0) as margin 
                                                          from ECOMM_METRICS a join ECOMM_METRICS b on b.commodity_name = a.commodity_name and 
                                                            not a.exchange_name = b.exchange_name where a.bid*(1.0-get_fees(a.exchange_name))>b.ask*(get_fees(b.exchange_name)+1.0)";
        if ($commodity_name) {
            $result = $this->sqlBrain->do_query($query . " and a.commodity_name='eth'");
        } else {
            $result = $this->sqlBrain->do_query($query);
        }

        return $result;
    }



}