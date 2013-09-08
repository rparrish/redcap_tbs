REDCap TBS
==========
This REDCap plugin generates formatted reports for individual REDCap records using the Tiny But Strong PHP template engine. Template files are written in HTML/CSS for layout and formatting. 

__How it works:__ The template file includes placeholder tags for REDCap field names. The TBS template engine replaces these tags with the actual values from REDCap for the specific record.
 
REDCap projects can have multiple reporting templates.


### Requirements
* REDCap
  * version 5.6+ (not tested on earlier versions)
  * Bookmarks enabled
  * API enabled 
  * A valid TOKEN for each project
* [TinyButStrong](http://tinybutstrong.com)  3.8.2 - file included with plugin (licensed under LGPL)
* Familiarity with editing HTML/CSS files


### Installation
Download the .zip archive and extract the redcap_tbs folder into the REDCap plugins folder (redcap/plugins/redcap_tbs/)

### Configuration
Each project requires its own subfolder in `redcap_tbs/pid/##`, where `##` equals the REDCap project ID number. This folder must contain the HTML template files and a config.ini file with a valid REDCap token.

1. Make a copy the `/pid/example/` folder and rename it with the number of the project ID.
2. Update the new folder's `config.ini` file with a valid TOKEN for the project.

#### Template Files

Template files must contain valid HTML/CSS. Variables can be inserted with this tag format `[onshow.data.foo]` where 'foo' is a REDCap Project field name. 

`<P>Hello [onshow.data.name]</P> ` ==> `Hello Peter`  
`<P>Record ID: [onshow.data.record_id]</P> ` ==> `Record ID: 1`

#### Bookmark
Add a new Project Bookmark.  

* Link Type - Select Advanced Link. This verifies the identity of the user.
* User Access - Selecting 'All users' will give access to any user that has access to this project. The 'Selected Users' option can be used to restrict the link to specific users. 
* Link URL - `https://redcap.EXAMPLE.ORG/redcap/plugins/redcap_tbs/index.php?template=form.html`
	* change 'EXAMPLE.ORG' to the domain name of the REDCap installation.
	* OPTIONS:
		* change the value after 'template='  to the desired template filename.
		* Disable the REDCap Project header by adding `&header=false`
* Check the boxes for "Append record ID" and "Append project ID".
* Additional bookmarks can be used for different template filenames 



### Feedback
You are welcome to:
* submit suggestions and bug-reports at: https://github.com/rparrish/redcap_tbs/issues
* compose a friendly email to: rollie.parrish@ampa.org


#### Authors/Contributors
* __Author__: Rollie Parrish (AMPA)
