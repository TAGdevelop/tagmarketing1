<?php
/*

@package flexproject

   ===============
   WP FRONTEND ENQUEUE HERE
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



function theme_flexproject_main_enqueue_styles() {
    wp_enqueue_style( 'corestylecss', get_stylesheet_directory_uri() . '/style.css' );
 wp_enqueue_style( 'bootstrap4', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap4/css/bootstrap.css' );
 // used for alert banner slider
 //wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper.min.css' );
 // used if FA is not loaded by Elementor
//   wp_enqueue_style( 'fa5-css', get_stylesheet_directory_uri() . '/assets/vendor/fontawesome5/css/fontawesome.min.css' );
   wp_enqueue_style( 'fa5-b-css', get_stylesheet_directory_uri() . '/assets/vendor/fontawesome5/css/brands.min.css' );
   
wp_enqueue_style( 'maincss', get_stylesheet_directory_uri() . '/assets/css/main.css' );

 wp_enqueue_script( 'bootstrap4js', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap4/js/bootstrap.bundle.min.js', array( 'jquery' ) );
  wp_enqueue_script('main-js',get_stylesheet_directory_uri().'/assets/js/main.js', array('jquery')); 

}
add_action( 'wp_enqueue_scripts', 'theme_flexproject_main_enqueue_styles');


// IF STATEMENT - Register Script for tagSlider template part
/* 
// ADDING ENQUEUE IF SHORTCODE in shortcode.php 
add_filter( 'template_include', 'tag_load_script_for_template', 1000 );
function tag_load_script_for_template( $template ){
             if(is_page_template('tagslider.php')){

//wp_enqueue_style( 'bootstrap3css',get_stylesheet_directory_uri() . '/assets/deprecated/bootstrap.min.css');
wp_enqueue_style( 'instagramcss',get_stylesheet_directory_uri() . '/assets/vendor/instagram-filters/instagram.min.css', '0.1.4', 'all');
wp_enqueue_style( 'owlcss',get_stylesheet_directory_uri() . '/assets/deprecated/owl.carousel.min.css');
wp_enqueue_style( 'owlthemecss',get_stylesheet_directory_uri() . '/assets/deprecated/owl.theme.default.min.css');
wp_enqueue_style( 'oldmaincss',get_stylesheet_directory_uri() . '/assets/deprecated/old-main.css');
   
wp_enqueue_script( 'old-main-js',get_stylesheet_directory_uri() . '/assets/deprecated/old.main.js', array('jquery'));
wp_enqueue_script( 'owl-js',get_stylesheet_directory_uri() . '/assets/deprecated/owl.carousel.min.js', array('jquery'));
wp_enqueue_script( 'bootstrap3js', '/assets/deprecated/bootstrap.min.js', array('jquery'));

            }
        return $template; }
*/


//   ===============
//   ELEMENTOR EDITOR FROM THE FRONTEND
//   Probably not need if top menu is deactivated using Branda
//   ===============
   
/*
/// Target User Roles 
function frontend_wjm_admin_user_css() {
    $user = wp_get_current_user();
    if ( in_array( 'administrator', (array) $user->roles ) ) {
     //do something
    } elseif ( in_array( 'seo_editor', (array) $user->roles ) ) {
       //do something
    } elseif ( in_array( 'client_admin', (array) $user->roles ) ) {
      
        wp_enqueue_style( 'aioseo_mask_css', get_stylesheet_directory_uri().'/assets/css/backend/dashboard-client-admin.css' );
    } else {
       // do something
    
    }
}
add_action( 'wp_enqueue_scripts', 'frontend_wjm_admin_user_css' );
*/




