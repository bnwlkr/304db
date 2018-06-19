<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';});

$query_builder = new QueryBuilder();

$url = $query_builder->construct($_POST);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$result = json_decode(curl_exec ($ch));
curl_close ($ch);

echo "
<style>
table, th, td {
   border: 1px solid black;
}
</style>
";

$result_variable_names = array_keys(get_object_vars($result[0]));

echo '<table>';
echo '<tr>';
foreach ($result_variable_names as $column_name) {
    echo '<th>' . $column_name . '</th>';
}
echo '</tr>';

foreach ($result as $obj) {
    echo '<tr>';
    foreach ($obj as $key => $value) {
        echo '<th>' . $value . '</th>';
    }
    echo '</tr>';
}

echo '</table>';





?> 
