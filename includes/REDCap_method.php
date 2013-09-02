<?php


        $method_data = REDCap::getData('json', $_GET['record']);
        $json_decoded = json_decode($method_data, TRUE);
        $data = $json_decoded[0];
?>
