<?php 
/*

@package flexproject

   ===============
   THEME GLOBAL OPTIONS FOR ACF
   ===============
  
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// ACF Global Options

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'tagGLOBAL',
		'menu_title'	=> 'tagGLOBAL',
		'menu_slug' 	=> 'tag-global',
		'position'      => '59.3',
		'icon_url'      => 'dashicons-admin-site-alt3',
		'updated_message' => __("tagGlobal Options Updated", 'acf'),
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'tagJOIN Link',
		'menu_title'	=> 'tagJOIN Link',
		'slug' => 'tagjoin-link',
		'parent_slug'	=> 'tag-global',
	));
	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Links',
		'menu_title'	=> 'Social Links',
		'slug' => 'social-links',
		'parent_slug'	=> 'tag-global',
	));
		acf_add_options_sub_page(array(
		'page_title' 	=> 'Hours of Operation',
		'menu_title'	=> 'Hours of Operation',
		'slug' => 'hours-of-operations',
		'parent_slug'	=> 'tag-global',
	));
		acf_add_options_sub_page(array(
		'page_title' 	=> 'Google Tag Manager',
		'menu_title'	=> 'Google Tag Manager',
		'parent_slug'	=> 'tag-global',
	));
		acf_add_options_sub_page(array(
		'page_title' 	=> 'Head/Footer Code',
		'menu_title'	=> 'Head/Footer Code',
		'slug' => 'head-footer-code',
		'parent_slug'	=> 'tag-global',
	));
			acf_add_options_sub_page(array(
		'page_title' 	=> 'Forms Lock',
		'menu_title'	=> 'Forms Lock',
		'slug' => 'forms-lock',
		'parent_slug'	=> 'tag-global',
	));

		acf_add_options_sub_page(array(
		'page_title' 	=> 'Display Options',
		'menu_title'	=> 'Display Options',
		'slug' => 'display-options',
		'parent_slug'	=> 'tag-global',
	));

	
}