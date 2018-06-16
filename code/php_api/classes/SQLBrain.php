<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class SQLBrain
{

    private $connection;


    function __construct()
    {
        $this->connection = new mysqli('localhost', 'btfd_u', 'comex', 'btfd_db');
        if ($this->connection->connect_error) {
            die('Connect Error (' . $this->connection->connect_errno . ') '
                . $this->connection->connect_error);
        }
    }

    /*
     * executes the given query and returns an array of resulting tuples
     *
     * @param query - the query for the DB
     */
    function do_query($query)
    {
        $result = $this->connection->query($query);
        $ret = array();
        if ($result==false) {return false;}
        if ($result==true && !is_object($result)) {return true;}
        while ($row = $result->fetch_assoc()) {
            array_push($ret, $row);
        }
        return $ret;
    }
}
