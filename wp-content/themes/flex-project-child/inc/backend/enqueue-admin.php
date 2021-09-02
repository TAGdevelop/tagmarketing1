<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php

/*

@package flexproject

   ===============
   ADMIN CUSTOM CSS
   ===============
   
*/

/*
   ===============
   LOAD css for users
   ===============
*/

// All users
function load_custom_wp_admin_style(){
    wp_enqueue_style( 'dashboard_all_css', get_stylesheet_directory_uri().'/assets/css/backend/dashboard-all-users.css' );

   
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');









//// =========================== ////
// IMPORTANT - THE FOLOWING CSS FILES & DIRECTORIES 
// HAVE BEEN MOVED TO inc/backend/_unused_backend_css DIRECTORY
//// ========================== ////


/// Target User Roles for css 
/*
function wjm_admin_user_css() {
    $user = wp_get_current_user();
    if ( in_array( 'administrator', (array) $user->roles ) ) {
      wp_enqueue_style( 'admistrator.css', get_stylesheet_directory_uri().'/assets/css/backend/dashboard-administrator.css' );
    } elseif ( in_array( 'seo_editor', (array) $user->roles ) ) {
       //do something
    } elseif ( in_array( 'client_admin', (array) $user->roles ) ) {
      
        wp_enqueue_style( 'aioseo_mask_css', get_stylesheet_directory_uri().'/assets/css/backend/dashboard-client-admin.css' );
         wp_enqueue_style( 'aioseo_mask_css', get_stylesheet_directory_uri().'/assets/css/backend/aioseo-mask.css' );
    } else {
        wp_enqueue_style( 'aioseo_mask_css', get_stylesheet_directory_uri().'/assets/css/backend/aioseo-mask.css' );
    
    }
}
add_action( 'admin_enqueue_scripts', 'wjm_admin_user_css' );
*/

//   =========================   //
//  STYLE & HIDE FEATURES elementor editor
//   =========================   //

/*
// CAN REMOVE THIS  WHEN 
// SLIDER GETS PORTED TO BOOTSTRAP 4 AND NEW JS 
add_action('elementor/editor/after_enqueue_scripts', function() {
wp_enqueue_style( 'bootstrap3css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
wp_enqueue_style( 'instagramcss',get_stylesheet_directory_uri() . '/assets/vendor/instagram-filters/instagram.min.css', '0.1.4', 'all');
wp_enqueue_style( 'owlcss',get_stylesheet_directory_uri() . '/assets/deprecated/owl.carousel.min.css');
wp_enqueue_style( 'owlthemecss',get_stylesheet_directory_uri() . '/assets/deprecated/owl.theme.default.min.css');
wp_enqueue_style( 'oldmaincss',get_stylesheet_directory_uri() . '/assets/deprecated/old-main.css');
         
wp_enqueue_script( 'old-main-js',get_stylesheet_directory_uri() . '/assets/deprecated/old.main.js');
wp_enqueue_script( 'owl-js',get_stylesheet_directory_uri() . '/assets/deprecated/owl.carousel.min.js');
wp_enqueue_script( 'bootstrap3js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');   

});
*/

/*
 add_action('elementor/editor/before_enqueue_scripts', function() {
    $user = wp_get_current_user();
    if ( in_array( 'client_admin', (array) $user->roles ) ) {
        wp_enqueue_style( 'elementor-all',get_stylesheet_directory_uri().'/assets/css/backend/elementor-editor/elementor_all_users.css', false, null );
     wp_enqueue_style( 'elementor-client-admin',get_stylesheet_directory_uri().'/assets/css/backend/elementor-editor/elementor_client_admin.css', false, null );
     
   } elseif ( in_array( 'client_publisher', (array) $user->roles ) ) {
       
       wp_enqueue_style( 'elementor-all',get_stylesheet_directory_uri().'/assets/css/backend/elementor-editor/elementor_all_users.css', false, null );
     wp_enqueue_style( 'elementor-client-editor',get_stylesheet_directory_uri().'/assets/css/elementor_client_publisher.css', false, null );

       
   } elseif ( in_array( 'client_editor', (array) $user->roles ) ) {
       
       wp_enqueue_style( 'elementor-all',get_stylesheet_directory_uri().'/assets/css/backend/elementor-editor/elementor_all_users.css', false, null );
     wp_enqueue_style( 'elementor-client-editor',get_stylesheet_directory_uri().'/assets/css/elementor-editor/elementor_client_editor.css', false, null );
       
   
    } else {
        
   // so admins see the common white label css styles 
        wp_enqueue_style( 'elementor-all',get_stylesheet_directory_uri().'/assets/css/backend/elementor-editor/elementor_all_users.css', false, null );
       
    }
});

*/

 
//   ===============
//   STYLE & HIDE FEATURES elementor editor
//   ONLY when client-publisher is in page view
//   ===============

/*
 add_action('elementor/editor/before_enqueue_scripts', function() {
    $user = wp_get_current_user();
     $pid = $_GET['post'];
      $post_type = get_post_type($pid);
      if (in_array('client_publisher', $user->roles) && $post_type == 'page') {
         wp_enqueue_style( 'elementor-client-publisher-type-page',get_stylesheet_directory_uri().'/assets/css/backend/elementor-editor/elementor_client_publisher_type_page.css', false, null );
}

});

*/

