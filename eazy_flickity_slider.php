<?php 
/*
Plugin Name: Eazy Flickity Slider
Plugin URI: http://robjscott.com/wordpress/
Description:  Easily create slides to use with responsive sliders. Add them to page or post. Displays them using flickity.js by metafizzy.  
Version: 2.0
Author: Rob Scott, LLC
Author URI: http://robjscott.com
Text Domain: ez-flickity-slider
License: GPLv2 or any later version
License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

//define plugin path
define( 'EZ_FLICKITY_ELEMENTS_PATH', plugin_dir_path(__FILE__) );
define( 'EZ_FLICKITY_ELEMENTS_FILE_PATH', __FILE__ );
define( 'EZ_FLICKITY_ELEMENTS_URL', str_replace('index.php','',plugins_url( 'index.php', __FILE__ )));
define( 'EZ_FLICKITY_VERSION', '2.0' );

//add functions
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_functions.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_display.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_script_styles.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_admin.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_admin_tinymce.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_admin_settings.php');
