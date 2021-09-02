<?php
/*

@package flexproject

   ===============
   THEME NORMAL FUNCTIONS FRONTEND ONLY
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



function customBodyClass( $classes ) {
  global $current_blog;
  $classes[] = 'tagsite-'.$current_blog->blog_id;
  return $classes;
}
add_filter( 'body_class', 'customBodyClass' );

