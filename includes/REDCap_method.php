<?php

$method_data = REDCap::getData($_GET['pid'], 'json', $_GET['record']);
//$method_data =REDCap::getData('137', 'json', '2');

$json_decoded = json_decode($method_data, TRUE);
$data = $json_decoded[0];

?>
