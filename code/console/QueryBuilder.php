<?php
/**
 * Created by PhpStorm.
 * User: bnwlkr
 * Date: 2018-06-18
 * Time: 1:39 PM
 */

    // builds query for API from form-data provided by console
class QueryBuilder
{
    function construct ($params) {
        $result = $params['base'] . "?";
        unset($params['base']);
        foreach ($params as $key => $value) {
            $result .= $key . "=" . $value ."&";
        }
        return $result;
    }

}
