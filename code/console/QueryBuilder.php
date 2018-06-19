<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-18
 * Time: 1:39 PM
 */

class QueryBuilder
{
    function construct ($params) {
        $result = $params['base'] . "?";
        array_slice($params, 1);
        foreach ($params as $key => $value) {
            $result .= $key . "=" . $value ."&";
        }
        return $result;
    }




}