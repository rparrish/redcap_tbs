<?php

// Call the REDCap Connect file in the main "redcap" directory
require_once "../../redcap_connect.php";

//require_once  '../../redcap_v6.2.2/Config/init_project.php';
require_once  APP_PATH_DOCROOT . '/Config/init_project.php';

//Required files
//require_once APP_PATH_DOCROOT . '/ProjectGeneral/form_renderer_functions.php';

// Log the event in REDCap

function redcap_tbs_log() {
	$data_changes = 'record = ' . $_GET['record'] . "\n" . 'template = ' . $_GET['template'];
	REDCap::logEvent("redcap_tbs", $data_changes, NULL );
}

?>
