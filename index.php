<?php
/**
 * PLUGIN NAME: REDCap_TBS
 * DESCRIPTION: Uses the Tiny But Strong (TBS) PHP template engine to   
 *		display formatted reports for individual REDCap records. 
 * 		The templates use HTML to layout the report format/style. 
 * 		REDCap variables are replaced with their values for the 
 * 		specified record. Projects can have multiple templates. 
 * VERSION: 0.1
 * AUTHOR: Rollie Parrish <rollie.parrish@ampa.org>
 * PLUGIN HOME: https://github.com/rparrish/redcap_tbs
 */

//// load the required classes and configuration options 
require_once ('includes/common.php');

//// load the config file for this project
$config = parse_ini_file("pid/" . $project_id . "/config.ini");

if (!isset($_GET['record'])) {

// todo: include mechanism to chose record (same as the dynamic search pulldown)

echo "Which record?";
exit();

}


//// Using REDCap API
require_once ("includes/REDCap_API.php");

//// Using REDCap::getData method */
//require_once ("includes/REDCap_method.php");


// Print it all out
require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';


include_once('includes/tbs_class.php');
//include_once('includes/tbs_plugin_opentbs.php');
// future use - for templates in Open Document format (ie. .docx, .ppt, etc.)


$TBS = new clsTinyButStrong;
//$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
// future use - for templates in Open Document format


$TBS->LoadTemplate(dirname(__FILE__) . '/pid/'.$project_id.'/'.$_GET['template']);
$TBS->Show();
?>

