<?php

// This does not function correctly yet. Need to be able to extract
// record labels using the REDCap::getData method. 

$method_data = REDCap::getData('json', $_GET['record']);
$json_decoded = json_decode($method_data, TRUE);
$data = $json_decoded[0];
?>
