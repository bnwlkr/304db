<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-18
 * Time: 1:39 PM
 */

class QueryBuilder
{

    function construct ($base, $params) {
        $result = $base . "?";
        foreach ($params as $key => $value) {
            $result .= $key . "=" . $value ."&";
        }

        return $result;
    }




}