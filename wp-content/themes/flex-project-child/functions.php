<?php 
/*

@package flexproject

   ===============
   THEME ROOT FUNCTIONS
   ===============
   GitHub what if I change on the LOCAL server changed remotely test
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// Functions split Frontend and Dashboard
// is_admin - Determines whether the current request is 
// for an administrative interface page
function split_functions() {
    if ( is_admin()){

//   ===============
//   THEME ADMIN DASHBOARD FUNCTIONS
//   ===============


include_once get_stylesheet_directory() . '/inc/backend/functions-admin.php';
include_once get_stylesheet_directory() . '/inc/backend/enqueue-admin.php';
include_once get_stylesheet_directory() . '/inc/backend/features/forms-lock.php';
include_once get_stylesheet_directory() . '/inc/backend/features/dupe-it.php';
include_once get_stylesheet_directory() . '/inc/backend/features/active-plugins-list.php';
include_once get_stylesheet_directory() . '/inc/backend/features/acf-theme-options.php';


    } else {
        
//   ===============
// THEME FRONTEND FUNCTIONS
// ===============
        
include_once get_stylesheet_directory() . '/inc/frontend/functions-frontend-runfirst.php';
include_once get_stylesheet_directory() . '/inc/frontend/features/load-in-head.php';
include_once get_stylesheet_directory() . '/inc/frontend/functions-frontend.php';
include_once get_stylesheet_directory() . '/inc/frontend/enqueue-frontend.php';

    }
}
add_action('init', 'split_functions');

// ===============
// FUNCTIONS FOR ALL
// ===============
include_once get_stylesheet_directory() . '/inc/all/functions-all.php';
include_once get_stylesheet_directory() . '/inc/all/shortcodes.php';
include_once get_stylesheet_directory() . '/inc/all/custom-post-types.php';
include_once get_stylesheet_directory() . '/inc/all/enqueue-all.php';


//include get_stylesheet_directory() . '/inc/all/functions-theme-enqueue.php';



