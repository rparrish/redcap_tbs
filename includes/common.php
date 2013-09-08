<?php


require_once  '../../redcap_v5.6.0/Config/init_project.php';


//Required files
require_once APP_PATH_DOCROOT . '/ProjectGeneral/form_renderer_functions.php';


// Call the REDCap Connect file in the main "redcap" directory
require_once "../../redcap_connect.php";


//// confirm REDCap credentials via cURL
function CheckAccess() {
	$postfields = array(
        "authkey" => $_POST['authkey'],
        "format" => "json"
	);

	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, APP_PATH_WEBROOT_FULL.'/api/');
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_POSTFIELDS, $postfields);

	$result = curl_exec($c);
	curl_close($c);

	$jdata = json_decode($result, TRUE);
	
	// TRUE if REDCap api returns a project_id that
	// matches the one that being requested.
	
	return @$_GET['pid'] == $jdata['project_id']; 
}
?>


