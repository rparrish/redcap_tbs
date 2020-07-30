<?php
/**
 * PLUGIN NAME: REDCap_TBS
 * DESCRIPTION: Uses the Tiny But Strong (TBS) PHP template engine to   
 *		display formatted reports for individual REDCap records. 
 * VERSION: 0.3
 * AUTHOR: Rollie Parrish <rollie.parrish@ampa.org>
 * PLUGIN HOME: https://github.com/rparrish/redcap_tbs
 */

//// load the required classes and configuration options 
require_once ('includes/common.php');

//// show the search pulldown if a record wasn't specified
// removing this search form section - no longer available with REDCap 10.x+
//if (!isset($_GET['record'])) {

//require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';
//echo '<h3 style="color:#800000;">Please select a record</h3>';
//renderSearchUtility();

//exit();

}

//// confirm authentication with REDCap API
// The only way to get this page to load is via the 
// Advanced Bookmark in REDCap

if(isset($_POST['authkey'])) {

//// Using REDCap::getData method */
require_once ("includes/REDCap_method.php");


// load OPENTBS if template is not HTML file
$extension = end(explode(".", $_GET['template']));

		
switch ($extension) {
	case "html":
		// Log the Event
 		redcap_tbs_log(); 
		
		// check for 'header=false' flag
		if ($_GET['header'] != 'false') {
		require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';
		}

		include_once('includes/tbs_class.php');
		$TBS = new clsTinyButStrong;
		$TBS->LoadTemplate(dirname(__FILE__) . 
			'/templates/'.$_GET['template']);
		$TBS->Show();
		break;
	default: 
		// Log the Event
 		redcap_tbs_log(); 

		include_once('includes/tbs_class.php');
		include_once('includes/tbs_plugin_opentbs.php');
		
		$TBS = new clsTinyButStrong;
		$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
		$TBS->LoadTemplate(dirname(__FILE__) . 
			'/templates/'.$_GET['template']);

		/* Debugging
		  print "<PRE>";
		  print_r($data);
		  print "</PRE>";
		  $TBS->PlugIn(OPENTBS_DEBUG_XML_SHOW);
		// end debugging */
	
		$TBS->Show(OPENTBS_DOWNLOAD, "output.docx");
		break;
 
}

} else print "Access Denied"; 

// check to see that template file exists


//if (file_exists($_GET['template'])) {	

?>
