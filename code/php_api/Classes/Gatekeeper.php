<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-15
 * Time: 8:36 PM
 */

class Gatekeeper
{

    private $sqlBrain;

    function __construct()
    {
        $this->sqlBrain = new SQLBrain();
    }


    function check_credentials($username, $password) {


    }

    function create_account ($name, $email, $password) {
        $this->sqlBrain->do_query("insert into User(name, email, password) values ('$name', '$email', SHA1('$password'))");
    }







}