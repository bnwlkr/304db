<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://btfd.group/commodities/");

curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

$content = curl_exec ($ch);

curl_close ($ch);

var_dump($content);







?> 
