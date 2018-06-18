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

    function create_exchange_account($user_id, $exchange_name) {
        return $this->sqlBrain->do_query("insert into Account (user_id, commodity_name, exchange_name) select $user_id, Commodity.name as commodity_name, Traded_On.exchange_name from 
                                            Commodity join Traded_On On Traded_On.commodity_name = Commodity.name where Traded_On.exchange_name='$exchange_name'");
    }

    function fund_account ($user_id, $commodity_name, $exchange_name, $amount) {
        return $this->sqlBrain->do_query("update Account
                                              set value = value + $amount 
                                              where user_id=$user_id and commodity_name='$commodity_name' and exchange_name='$exchange_name'");
    }


}