
<?php

$connection = oci_connect("ora_m3c1b", "a34334169", "//dbhost.ugrad.cs.ubc.ca:1522/ug");

function do_query ($query) {
    $run = oci_parse($connection, $query);
    oci_execute($run);
    oci_fetch_all($run, $res);
    var_dump($res);
}

do_query("select * from Traded_On");



?>
