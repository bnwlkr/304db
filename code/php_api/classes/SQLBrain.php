<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class SQLBrain  {

    private  $connection;
        
    function start () {
        $this->connection = new mysqli('localhost', 'btfd_u', 'comex', 'btfd_db');
        if ($this->connection->connect_error) {
            die('Connect Error (' . $this->connection->connect_errno . ') '
                . $this->connection->connect_error);
        }
    }
        
    /* finds commodities that match search parameters.
     * assumes $search is accompanied by only one other parameter and $exchange_name is accompanied
     * by no other parameters.
     *
     * @param $search - the search query
     * @param $price_bounds - an associative array containg ['min'] and ['max'] price to search for
     * @param $exchange_name - specifies that the search is for commodities on a particular exchange
     */
    function get_commodities($search, $min_price, $max_price, $exchange_name) {
        if ($exchange_name != null) {
            return $this->do_query("select commodity_name from Traded_On where exchange_name='$exchange_name'");
        } else if ($min_price != null) {
            // TODO price bounds selection
        } else {
            // TODO just search all commodities
        }
    }
    
    /*
     * executes the given query and returns an array of resulting tuples
     *
     * @param query - the query for the DB
     */
    
    function do_query ($query) {
        $result = $this->connection->query($query);
        var_dump($result->fetch_assoc());
        //TODO return an associatave array result
    }
    
    
    
    
    
}



?>
