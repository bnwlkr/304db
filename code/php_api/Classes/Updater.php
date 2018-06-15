<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-15
 * Time: 12:22 PM
 */

class Updater
{

    /*
     * Quadriga:
     * https://api.quadrigacx.com/v2/ticker?book=eth/btc_cad
     * returns an json array, bid, ask, volume, etc.
     *
     * Things we are trackin
     *
     *
     */


    private $sqlBrain;

    function start () {
        $this->sqlBrain = new SQLBrain();
    }


    function update_quadriga() {

    }



}