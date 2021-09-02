<?php 
/*

@package flexproject

   ===============
   ADMIN CUSTOM POST TYPES
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}


// POST TYPES

function cptui_register_my_cpts() {

  /**
   * Post Type: Staff Members.
   */

  $labels = [
    "name" => __( "Staff Members", "custom-post-type-ui" ),
    "singular_name" => __( "Staff Member", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Staff Members", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "staff", "with_front" => true ],
    "query_var" => true,
    "menu_position" => '',
    "menu_icon" => "dashicons-external",
    "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "page-attributes", "post-formats" ],
    "taxonomies" => [ "staff_categories" ],
  ];

  register_post_type( "team_member", $args );

  /**
   * Post Type: Featured Items.
   */

  $labels = [
    "name" => __( "Featured Items", "custom-post-type-ui" ),
    "singular_name" => __( "Featured Item", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Featured Items", "custom-post-type-ui" ),
    "rewrite" => [ "slug" => "featured", "with_front" => true ],
      "taxonomies" => [ "feat_cat" ],
    "menu_icon" => "dashicons-external",
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "query_var" => true,
    "menu_position" => '',
   "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
   ];

  register_post_type( "tag_feat", $args );

  /**
   * Post Type: Slider Items.
   */

  $labels = [
    "name" => __( "Slider Items", "custom-post-type-ui" ),
    "singular_name" => __( "Slider Item", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Slider Items", "custom-post-type-ui" ),
    "rewrite" => [ "slug" => "tag_slider", "with_front" => true ],
      "taxonomies" => [ "tag_sliders_cat" ],
    "menu_icon" => "dashicons-external",
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "query_var" => true,
    "menu_position" => '',
   "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
   ];

  register_post_type( "tag_slider", $args );

  /**
   * Post Type: Landing Pages.
   */

  $labels = [
    "name" => __( "Landing Pages", "custom-post-type-ui" ),
    "singular_name" => __( "Landing page", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Landing Pages", "custom-post-type-ui" ),
    "labels" => $labels,
   "rewrite" => [ "slug" => "lp", "with_front" => true ],
    "taxonomies" => [ "lp_category" ],
 "menu_icon" => "dashicons-external",
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "query_var" => true,
    "menu_position" => '',
   "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
    ];

  register_post_type( "tag_landing", $args );

  /**
   * Post Type: Legal Pages.
   */

  $labels = [
    "name" => __( "Legal Disclaimer", "custom-post-type-ui" ),
    "singular_name" => __( "Legal Page", "custom-post-type-ui" ),
    "add_new" => __( "Add new", "custom-post-type-ui" ),
    "new_item" => __( "New Legal", "custom-post-type-ui" ),
    "view_items" => __( "View Legal", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Legal Disclaimer", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => [ "slug" => "disclaimer", "with_front" => false ],
    "query_var" => true,
    "menu_position" => '',
    "menu_icon" => "dashicons-welcome-write-blog",
    "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
  ];

  register_post_type( "tag_legal", $args );
 /**
   * Post Type: No Nav.
   */

  $labels = [
    "name" => __( "No Navigation", "custom-post-type-ui" ),
    "singular_name" => __( "No Nav", "custom-post-type-ui" ),
    "add_new" => __( "Add new", "custom-post-type-ui" ),
    "new_item" => __( "New NoNav", "custom-post-type-ui" ),
    "view_items" => __( "View NoNav", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "No Navigation", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => [ "slug" => "no-nav", "with_front" => false ],
    "query_var" => true,
    "menu_position" => '',
    "menu_icon" => "dashicons-welcome-write-blog",
   "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
  ];

  register_post_type( "no_nav", $args );

  /**
   * Post Type: Alerts.
   */

  $labels = [
    "name" => __( "Alerts", "custom-post-type-ui" ),
    "singular_name" => __( "Alert", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Alerts", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => [ "slug" => "alert", "with_front" => true ],
    "query_var" => true,
    "menu_position" => '',
    "menu_icon" => "dashicons-external",
    "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "page-attributes" ],
  ];

  register_post_type( "alerts", $args );
  /**
   * Taxonomy: Alert Categories.
   */

  $labels = [
    "name" => __( "Alert Categories", "custom-post-type-ui" ),
    "singular_name" => __( "Alert Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Alert Categories", "custom-post-type-ui" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'alert-category', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "alert_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    ];
  register_taxonomy( "alert_category", [ "alerts" ], $args );


  /**
   * Post Type: Single Pages.
   */

  $labels = [
    "name" => __( "Single Pages", "custom-post-type-ui" ),
    "singular_name" => __( "Single Page", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Single Pages", "custom-post-type-ui" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "rewrite" => [ "slug" => "go", "with_front" => true ],
    "query_var" => true,
    "menu_position" => '',
    "menu_icon" => "dashicons-welcome-write-blog",
    "supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "page-attributes" ],
    "taxonomies" => [ "single_page_categories" ],
  ];

  register_post_type( "single_pages", $args );

}

add_action( 'init', 'cptui_register_my_cpts' );


// TAXONOMIES

function cptui_register_my_taxes() {

  /**
   * Taxonomy: Features Categories.
   */
  $labels = [
    "name" => __( "Featured Category", "custom-post-type-ui" ),
    "singular_name" => __( "Featured Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Featured Category", "custom-post-type-ui" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'f_er_cat', 'with_front' => true, ],
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_base" => "f-er-cat",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    ];
  register_taxonomy( "feat_cat", [ "tag_feat" ], $args );
 

  /**
   * Taxonomy: Sliders Category.
   */

  $labels = [
    "name" => __( "Sliders Category", "custom-post-type-ui" ),
    "singular_name" => __( "Sliders Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Sliders Category", "custom-post-type-ui" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'tag_sliders_cat', 'with_front' => true, ],
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_base" => "tag-sliders-cat",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    ];
  register_taxonomy( "tag_sliders_cat", [ "tag_slider" ], $args );

  /**
   * Taxonomy: Single Categories.
   */

  $labels = [
    "name" => __( "Single Categories", "custom-post-type-ui" ),
    "singular_name" => __( "Single Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Single Categories", "custom-post-type-ui" ),
   "rewrite" => [ 'slug' => 'sp-category', 'with_front' => true, ],
   "rest_base" => "sp_category",
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    ];
  register_taxonomy( "single_page_categories", [ "single_pages" ], $args );

  /**
   * Taxonomy: Landing Categories.
   */

  $labels = [
    "name" => __( "Landing Categories", "custom-post-type-ui" ),
    "singular_name" => __( "Landing Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Landing Categories", "custom-post-type-ui" ),
   "rewrite" => [ 'slug' => 'lp-category', 'with_front' => true, ],
   "rest_base" => "lp_category",
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
   ];
  register_taxonomy( "landing_page_categories", [ "tag_landing" ], $args );

  
  /**
   * Taxonomy: Staff Categories.
   */

  $labels = [
    "name" => __( "Staff Categories", "custom-post-type-ui" ),
    "singular_name" => __( "Staff Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Staff Categories", "custom-post-type-ui" ),
   "rewrite" => [ 'slug' => 'staff-category', 'with_front' => true, ],
   "rest_base" => "staff_category",
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
    ];
  register_taxonomy( "staff_categories", [ "team_member" ], $args );

  /**
   * Taxonomy: Legal Categories.
   */

  $labels = [
    "name" => __( "Legal Categories", "custom-post-type-ui" ),
    "singular_name" => __( "Legal Category", "custom-post-type-ui" ),
  ];

  $args = [
    "label" => __( "Legal Categories", "custom-post-type-ui" ),
  "rewrite" => [ 'slug' => 'legal-category', 'with_front' => true, ],
   "rest_base" => "legal_category",
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => false,
    "query_var" => true,
    "show_admin_column" => true,
    "show_in_rest" => true,
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => true,
   ];
  register_taxonomy( "legal_categories", [ "tag_legal" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

