<?php
/*
Plugin Name: Galleria Display
Plugin URI: http://www.galleriadisplay.com
Description: Embed Galleria Display galleries in WordPress
Version: 1.0
Author: Aino
Author URI: http://www.aino.com
License:
*/
if ( !class_exists('GalleriaDisplay') ) {
    
    class GalleriaDisplay {
        
        function __construct() {
            function galleriadisplay_buttons() {
              // Only add hooks when the current user has permissions AND is in Rich Text editor mode
              if ( ( current_user_can('edit_posts') || current_user_can('edit_pages') ) && get_user_option('rich_editing') ) {
                add_action( 'admin_enqueue_scripts', 'galleriadisplay_register_styles' );
                add_filter( 'mce_external_plugins', 'galleriadisplay_register_tinymce_javascript' );
                add_filter( 'mce_buttons', 'galleriadisplay_register_buttons' );
              }
            }
            function galleriadisplay_register_styles($buttons) {
                wp_register_style( 'galleriadisplay_admin_css', plugins_url('/css/galleriadisplay.admin.css', __file__), false, '1.0.0' );
                wp_enqueue_style( 'galleriadisplay_admin_css' );
            }
            function galleriadisplay_register_buttons($buttons) {
                array_push($buttons, 'galleriadisplay');
                return $buttons;
            }
            function galleriadisplay_register_tinymce_javascript($plugin_array) {
                $plugin_array['galleriadisplay'] = plugins_url('/js/galleriadisplay.tinymce.js', __file__);
                return $plugin_array;
            }

            add_shortcode( 'galleriadisplay', array( &$this, 'galleriadisplay_shortcode' ), 10, 2 );
            add_action('init', 'galleriadisplay_buttons');
        }

        public function galleriadisplay_shortcode( $attr ) {
            $atts = shortcode_atts( array( 'id' => 'ID' ), $attr );
            $res = '<script src="//neon.galleriadisplay.com/' . $atts['id'] . '/init.js"></script>';

            return $res;
        }
    }
}

$galleria_display = new GalleriaDisplay();