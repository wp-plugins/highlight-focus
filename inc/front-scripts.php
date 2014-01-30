<?php 

class Highlight_Focus_Front_Scripts {
    /**
     * Construct the plugin object
     */
    public function __construct() {
        // Enqueue scripts
        add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ) );
    } // END public function __construct
    
    public function enqueue_scripts() {
        wp_enqueue_script( 'highlight-focus', HighlightFocus_PLUGIN_URL . 'js/highlight-focus.js', array( 'jquery' ) );
        wp_enqueue_style( 'highlight-focus', HighlightFocus_PLUGIN_URL . 'css/highlight-focus.css' );
        wp_enqueue_style( 'highlight-focus-custom', HighlightFocus_UPLOAD_URL . 'highlight-focus-custom.css' );
        
        $params = array(
            'slideDuration' => get_option( 'highlight_focus_slide_duration' ),
            'hideDelay' => get_option( 'highlight_focus_hide_delay' ),
            'noOutline' => get_option( 'highlight_focus_no_outline' ),
        );
        wp_localize_script( 'highlight-focus', 'hf_params', $params );
    } // END public function wp_enqueue_scripts
} // END class Highlight_Focus_Front_Scripts
