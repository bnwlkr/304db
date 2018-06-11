<?php
    
    class SQLBrain  {
        
        private $connection;
        
        static function start () {
            $connection = oci_connect("ora_m3c1b", "a34334169", "//dbhost.ugrad.cs.ubc.ca:1522/ug");
        }
        
        /* finds commodities that match search parameters. */
        static function getCommodities($search_query, $price_bounds=null, $exchange_name=null) {
            return array();
        }
    
        
        
        
    }



?>
