<?php 
/*
Plugin Name: Eazy Flickity Slider
Plugin URI: http://robjscott.com/wordpress/
Description:  Adds slide custom post type for uploading slides. Slides can be added to slider using shortcodes. 
Version: 1.1.0
Author: Rob Scott, LLC
Author URI: http://robjscott.com
Text Domain: ez-flickity-slider
License: GPLv2 or any later version
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

//define plugin path
define( 'EZ_FLICKITY_ELEMENTS_PATH', plugin_dir_path(__FILE__) );
define( 'EZ_FLICKITY_ELEMENTS_FILE_PATH', __FILE__ );
define( 'EZ_FLICKITY_ELEMENTS_URL', str_replace('index.php','',plugins_url( 'index.php', __FILE__ )));

//add functions
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_functions.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_admin.php');
require_once(EZ_FLICKITY_ELEMENTS_PATH . 'resources/eazy_flickity_slider_homepage.php');