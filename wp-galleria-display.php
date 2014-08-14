<?php
/*
Plugin Name: Galleria Display
Plugin URI: http://www.galleriadisplay.com
Description: Embed Galleria Display galleries in WordPress with shortcode or from a menu
Version: 1.0.3
Author: Aino
Author URI: http://www.aino.com
License: GPLv2
*/
if ( !class_exists('GalleriaDisplay') ) {

  class GalleriaDisplay {
      
    function __construct() {
      function galleriadisplay_init() {
        
        global $wp_version;
        
        // Load frontend stylesheet
        add_action( 'wp_enqueue_scripts', 'galleriadisplay_register_styles' );

        // Only add hooks when the current user has permissions AND is in Rich Text editor mode AND uses WordPress >= 3.9 (Because of TinyMCE API changes)
        if ( ( current_user_can('edit_posts') || current_user_can('edit_pages') ) && get_user_option('rich_editing') && version_compare( $wp_version, '3.9', '>=' ) ) {
          add_action( 'admin_enqueue_scripts', 'galleriadisplay_register_admin_styles' );
          add_filter( 'mce_external_plugins', 'galleriadisplay_register_tinymce_javascript' );
          add_filter( 'mce_buttons', 'galleriadisplay_register_buttons' );
        }
      }

      function galleriadisplay_register_admin_styles() {
        wp_register_style( 'galleriadisplay_admin_css', plugins_url( '/css/galleriadisplay.admin.css', __file__ ), false );
        wp_enqueue_style( 'galleriadisplay_admin_css' );
      }

      function galleriadisplay_register_styles() {
        wp_register_style( 'galleriadisplay_css', plugins_url( '/css/galleriadisplay.css', __file__ ), false );
        wp_enqueue_style( 'galleriadisplay_css' );
      }

      function galleriadisplay_register_buttons( $buttons ) {
        array_push( $buttons, 'galleriadisplay' );
        return $buttons;
      }

      function galleriadisplay_register_tinymce_javascript( $plugin_array ) {
        $plugin_array['galleriadisplay'] = plugins_url( '/js/galleriadisplay.tinymce.js', __file__ );
        return $plugin_array;
      }

      add_shortcode( 'galleriadisplay', array( &$this, 'galleriadisplay_shortcode' ), 10, 2 );
      add_action('init', 'galleriadisplay_init');
    }

    public function galleriadisplay_shortcode( $attr ) {
      // Get id from shortcode
      extract( shortcode_atts( array(
        'id' => '0'
      ), $attr ) );

      if ( strlen( $id ) == 40 && ctype_xdigit( $id ) ) {
        $res = '<script src="//neon.galleriadisplay.com/' . $id . '/init.js"></script>';
      } else {
        $res = '<div class="galleriadisplay-error"><h3>Oops.</h3><p>There seems to be something wrong with the id for this gallery.</p></div>';
      }

      return $res;
    }
  }
}

$galleria_display = new GalleriaDisplay();