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


    function check_credentials($email, $password) {
        $result = $this->sqlBrain->do_query("select User.id, User.name, User.email from User 
                                                          where SHA1('$password') = User.password and User.email = '$email'");
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }

    function create_account ($name, $email, $password) {
        return $this->sqlBrain->do_query("insert into User(name, email, password) values ('$name', '$email', SHA1('$password'))");
    }


}