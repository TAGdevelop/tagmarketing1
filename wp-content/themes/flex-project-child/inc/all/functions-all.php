<?php 
/*

@package flexproject

   ===============
   FUNCTIONS FOR ALL USERS
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// Run shortcode in title of menus
add_filter( 'the_title', function( $title, $item_id ) {
    if ( 'nav_menu_item' === get_post_type( $item_id ) ) {
        return do_shortcode( '<div class="menu_shortcode w-100" >'.$title.'</div>' );
   }
    return $title;
}, 10, 2 );

remove_filter ( 'the_content', 'wpautop' );
remove_filter ( 'the_excerpt', 'wpautop' );

