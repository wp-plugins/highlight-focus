<?php

class Highlight_Focus_Settings {
    /**
     * Construct the plugin object
     */
    public function __construct() {
        // register actions
        add_action( 'plugins_loaded', array( &$this, 'init_textdomain' ) );
        add_action( 'admin_menu', array( &$this, 'add_menu' ) );
        add_action( 'admin_init', array( &$this, 'register_settings' ) );
        add_action( 'admin_init', array( &$this, 'write_css' ), 11 );
        add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
    } // END public function __construct

    /**
    * Init textdomain
    */
    public function init_textdomain() {
        
        load_plugin_textdomain( 'hf', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
        
    } // END public function init_textdomain

    /**
    * Create an Nivo Lightbox menu entry in "Tools" called "Nivo Lightbox"
    * 
    */
    public function add_menu() {
        add_options_page( 
            __( 'Highlight Focus', 'hf' ), 
            __( 'Highlight Focus', 'hf' ), 
            'manage_options', 
            'highlight_focus', 
            array( &$this, 'settings_page' ) 
        );
    } // END public function add_menu

    /**
    * Register Settings
    */
    public function register_settings() {
        
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_slide_duration' );
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_hide_delay' );
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_background_color' );
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_background_opacity' );
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_border_color' );
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_border_opacity' );
        register_setting( 'highlight_focus_settings-group', 'highlight_focus_no_outline' );
        
    } // END public function register_settings

    /**
    * Register Settings
    */
    public function write_css() {

        if( isset( $_GET[ 'page' ] ) && 'highlight_focus' == $_GET[ 'page' ] && isset( $_GET[ 'settings-updated' ] ) && 'true' == $_GET[ 'settings-updated' ] ) {
            $css_content = '#highlight-focus {';
            
            $bg_color = hex2rgba( get_option( 'highlight_focus_background_color', '#0074A2' ), get_option( 'highlight_focus_background_opacity', 0.4 ) );
            $border_color = hex2rgba( get_option( 'highlight_focus_border_color', '#0074A2' ), get_option( 'highlight_focus_border_opacity', 0.8 ) );        
            
            $css_content .= 'box-shadow: 0 0 2px 3px ' . $border_color . ', 0 0 2px ' . $border_color . ' inset;';
            $css_content .= 'background-color: ' . $bg_color . ';';
            
            $css_content .= '}';    
                 
            if( !is_dir( HighlightFocus_UPLOAD_PATH ) )
                mkdir( HighlightFocus_UPLOAD_PATH );
                
            $css_file = fopen( HighlightFocus_UPLOAD_PATH . 'highlight-focus-custom.css', 'w' );
            fwrite( $css_file, $css_content );
            fclose( $css_file );  
        }
          
    } // END public function write_css

    /**
    * Display a settings page
    */
    public function settings_page() {

        // Render the tools template
        include( dirname(__FILE__) . '/views/settings.php' );
        
    } // END public function settings_page
    
    public function admin_enqueue_scripts( $hook_suhfix ) {
        // first check that $hook_suhfix is appropriate for your admin page
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'admin-highlight-focus', plugins_url( 'js/admin-highlight-focus.js' , __FILE__ ), array( 'jquery', 'wp-color-picker' ), false, true );
    } // END public function admin_enqueue_scripts
} // END class Highlight_Focus_Settings
