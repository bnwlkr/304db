<?php
    $conn = oci_connect('ora_m3c1b', 'a34334169', 'ug');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    } else {
        echo "connected";
    }
    
?>
