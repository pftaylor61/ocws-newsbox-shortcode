<?php

/*

Plugin Name: OCWS Newsbox Shortcode

Plugin URI: http://oldcastleweb.com/pws/plugins

Description: This plugin creates a shortcode, which can be displayed anywhere, in order to display a changeable news message. This new message can be controled from the settings panel. <br /><br />The plugin has been produced by <a href="http://www.oldcastleweb.com" target="_blank">Old Castle Web Solutions</a>

Version: 0.3

Author: Paul Taylor

Author URI: http://oldcastleweb.com/pws/about

License: GPL2

GitHub Plugin URI: https://github.com/pftaylor61/ocws-newsbox-shortcode

*/

/*  Copyright 2015  Paul Taylor  (email : info@oldcastleweb.com)



    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License, version 2, as 

    published by the Free Software Foundation.



    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.



    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/



require_once("ocws-newsbox-shortcode-config.php");
require_once("functions.php");

add_filter( 'github_updater_token_distribution',
    function () {
        return array( 'ocws-newsbox-shortcode' => '1da07be3feae0972c4fe468de63b00b233df5cce' );
    } );

// Hooking up our function to theme setup
add_action( 'init', 'fpnews_posttype_init' );
add_action( 'init', 'newsbox_type_taxonomy');

 // // Activates function if plugin is activated
register_activation_hook( __FILE__, 'create_newsbox_pages');










?>