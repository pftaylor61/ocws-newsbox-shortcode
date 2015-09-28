<?php
// OCWS Newsbox Shortcode Configuration File

/**
* This is the plugin's configuration file
**/

// These are the main definitions

/* These constants can be amended for personal choice */
/* ================================================== */

define("FPNAME_SG","Newsbox"); 
define("FPNAME_PL","Newsboxes"); 
define("FPSLUG","fpnews"); 
define("FPVERSION","0.1"); // Set the version number
define("FP_LOGO16","fplogo16.png"); // Set this to the 16x16 logo that you want. Copy this logo into the plugin's image subfolder
define("FP_LOGO80","fplogo80.png"); // Set this to the 80x80 logo that you want. Copy this logo into the plugin's image subfolder

/* Other constants - DO NOT CHANGE!!! */
/* ================================== */

define("OCWSFP_BASE_DIR",dirname(__FILE__));
define("OCWSFP_BASE_URL",plugins_url( '', __FILE__ ));

?>