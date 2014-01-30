<?php 
/* 
Plugin Name: Highlight Focus
Plugin URI: http://www.juzed.fr/
Description: Highlight Focus on tab key pressed 
Version: 1.1 
Author: Julien Zerbib,  Audrey Vittecoq-Laporte
Author URI: http://www.juzed.fr/
  
  
    Copyright 2013  Julien Zerbib  (email : contact@juzed.fr)

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

define( 'HighlightFocus_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'HighlightFocus_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );       

$upload_dir = wp_upload_dir();
define( 'HighlightFocus_UPLOAD_URL', $upload_dir['baseurl'] . '/highlight-focus/' );
define( 'HighlightFocus_UPLOAD_PATH', $upload_dir['basedir'] . '/highlight-focus/' );

class Highlight_Focus {
    /**
     * Construct the plugin object
     */
    public function __construct() {
        require_once( dirname(__FILE__) . '/inc/functions.php' );
        
        // Initialize Settings
        require_once( dirname(__FILE__) . '/settings.php' );
        $Highlight_Focus_Settings = new Highlight_Focus_Settings();
        
        // Front Scripts
        if( !is_admin() ) {
            require_once( dirname(__FILE__) . '/inc/front-scripts.php' );
            $Highlight_Focus_Front_Scripts = new Highlight_Focus_Front_Scripts();            
        }    
    } // END public function __construct
    
    /**
     * Activate the plugin
     */
    public static function activate() {
        // Do nothing
    } // END public static function activate

    /**
     * Deactivate the plugin
     */        
    public static function deactivate() {
        // Do nothing
    } // END public static function deactivate
} // END class Highlight_Focus

// Installation and uninstallation hooks
register_activation_hook( __FILE__, array( 'Highlight_Focus', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Highlight_Focus', 'deactivate' ) );

// instantiate the plugin class
$highlight_focus_plugin = new Highlight_Focus();
