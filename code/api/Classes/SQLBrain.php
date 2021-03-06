<?php


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
        if ($result===false) {return false;}
        if ($result===true) {return true;}
        while ($row = $result->fetch_assoc()) {
            array_push($ret, $row);
        }
        return $ret;
    }
}
