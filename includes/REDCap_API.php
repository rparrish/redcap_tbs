<?php


require_once('RestCallRequest.php');

# arrays to contain elements you want to filter results by
# example: array('item1', 'item2', 'item3');
$records = array($_GET['record']);
$events = array();
$fields = array();
$forms = array();

# an array containing all the elements that must be submitted to the API
$api_parameters = array('content' => 'record', 'type' => 'flat', 'format' => 'json', 'records' => $records, 'events' => $events,
        'fields' => $fields, 'forms' => $forms, 'exportSurveyFields'=>'false',
        'exportDataAccessGroups'=>'false',
        'token' => $config['token'], 'rawOrLabel' => 'label');

# create a new API request object
$request = new RestCallRequest(APP_PATH_WEBROOT_FULL.'api/', 'POST', $api_parameters);

# initiate the API request
$request->execute();

$jsondata = $request->getResponseBody();
$json_decoded = json_decode($jsondata, TRUE);
$data = $json_decoded[0];

?>
