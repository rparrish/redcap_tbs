<?php

$method_data = REDCap::getData($_GET['pid'], 'json', $_GET['record'], NULL, NULL, NULL, FALSE, FALSE, FALSE, FALSE, TRUE);

$json_decoded = json_decode($method_data, TRUE);
$data = $json_decoded[0];

// when an event id is set, merge the fields of the event data with the main data from above
if(isset($_GET['event'])){
        // get data for event
        $method_data_event = REDCap::getData($_GET['pid'], 'json', $_GET['record'], NULL, $_GET['event'], NULL, FALSE, FALSE, FALSE, FALSE, TRUE);

        $json_decoded_event = json_decode($method_data_event, TRUE);
        $data_event = $json_decoded_event[0];

        // merge each field onto the main data, preserve main data field if present
        foreach($data_event AS $var=>$value){
                if(empty($data[$var])){
                        $data[$var] = $data_event[$var];
                }
        }
}

// uncomment those lines to view debug fields
// echo(json_encode($data));
// exit;

?>
