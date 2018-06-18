<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-15
 * Time: 12:22 PM
 */

class Updater
{

    private $sqlBrain;

    public function __construct()
    {
        $this->sqlBrain = new SQLBrain();
    }

    function do_update($commodity_name, $exchange_name, $bid, $ask, $volume) {
            
    }



}