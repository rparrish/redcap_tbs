REDCap TBS
==========
This REDCap plugin generates formatted reports for individual REDCap records. Using the Tiny But Strong  
PHP template engine, template files are written in HTML/CSS for layout and formatting. REDCap variables 
are replaced with their values for the specified record. 

It relies on REDCap's bookmark feature to pass the project ID, record ID and the template file name to 
the plugin.  REDCap projects can have multiple templates.


## Requirements
* REDcap 
  * version 5.6+ (not tested on earlier versions)
  * Bookmarks enabled
  * API enabled
* [TinyButStrong](http://tinybutstrong.com)  3.8.2 - file included with plugin (licensed under LGPL)


## Installation
todo:


## Configuration
1 Plugin
2 Project Report
3 Bookmark

## Known Issues
* The TinyButStrong library is capable of much more than this


## Feedback
You are welcome to:  
* submit suggestions and bug-reports at: https://github.com/rparrish/redcap_tbs/issues
* compose a friendly email to: rollie.parrish@ampa.org


## Authors/Contributors
* __Author__: Rollie Parrish (AMPA) 
