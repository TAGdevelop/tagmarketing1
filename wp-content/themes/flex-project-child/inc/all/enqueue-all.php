<?php 
/*

@package flexproject

   ===============
   ENQUEUE FUNCTIONS FOR ALL
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// load Store locator stuff IF plugin class exists 
if(class_exists('WP_Store_locator')){
include get_stylesheet_directory() . '/inc/all/hook-wpsl_stores.php';
}
// end store locator