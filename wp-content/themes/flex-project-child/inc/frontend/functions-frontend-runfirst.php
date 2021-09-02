<?php 
/*

@package flexproject

   ===============
   FIRST RUN FUNCTIONS
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}




//Remove WordPress meta version 
function flexproject_remove_wp_version() {
return '';
}
add_filter('the_generator', 'flexproject_remove_wp_version');





