<?php
    
spl_autoload_register(function ($class_name) {
                          include $class_name . '.php';});
class SQLBrain  {

    private  $connection;
        
    function start () {
        $connection = oci_connect("ora_m3c1b", "a34334169", "//dbhost.ugrad.cs.ubc.ca:1522/ug");
    }
        
    /* finds commodities that match search parameters.
     * assumes $search is accompanied by only one other parameter and $exchange_name is accompanied
     * by no other parameters.
     *
     * @param $search - the search query
     * @param $price_bounds - an associative array containg ['min'] and ['max'] price to search for
     * @param $exchange_name - specifies that the search is for commodities on a particular exchange
     */
    function get_commodities($search=null, $price_bounds=null, $exchange_name=null) {
        $ret = array();
        if ($exchange_name != null) {
            $query = "select commodity_name from Traded_On where exchange_name='$exchange_name'";
            $run = oci_parse($this->connection, $query);
            oci_execute($run);
            oci_fetch_all($run, $res);
            var_dump($res);
        } else if ($price_bounds != null) {
        }
        
    }
    
    
    
    
    
}



?>
