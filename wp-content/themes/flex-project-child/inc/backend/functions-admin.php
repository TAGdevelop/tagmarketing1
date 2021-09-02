<?php 
/*

@package flexproject

   ===============
   ADMIN FUNCTIONS
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Flush url rewrites when theme is switched
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

// theme support to display items in admin dashboard 

add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'post-thumbnails' );



// COMMENTS
// Remove comments in its entirety

 
// Removes items from admin menu
	add_action( 'admin_menu', 'pk_remove_admin_menus' );
	function pk_remove_admin_menus() {
	    remove_menu_page( 'edit-comments.php' );
	}
 
	// Removes from post and pages
	add_action('init', 'pk_remove_comment_support', 100);
 	function pk_remove_comment_support() {
	   remove_post_type_support( 'post', 'comments' );
	   remove_post_type_support( 'page', 'comments' );
	}
 
// Removes from admin bar
	add_action( 'wp_before_admin_bar_render', 'pk_remove_comments_admin_bar' );
	function pk_remove_comments_admin_bar() {
	    global $wp_admin_bar;
	    $wp_admin_bar->remove_menu('comments');
	}
 

// MULTISITE ALLOW unfiltered_html capability in WP role editor plugin
function tsg_unfilter_multisite( $caps, $cap, $user_id, $args ) {
               if ( $cap == 'unfiltered_html' ) {
                              unset( $caps );
                              $caps[] = $cap;
               }
               return $caps;
}
add_filter( 'map_meta_cap', 'tsg_unfilter_multisite', 10, 4 );
 
add_filter('acf/allow_unfiltered_html', '__return_true',20,10);
// Then assign “unfiltered_html” for role you want.



// Removes scheduled trash deletions
function wpb_remove_schedule_delete() {
  remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
add_action( 'init', 'wpb_remove_schedule_delete' );

// Sidebar Auto-Collapse Formidable Forms Prevention
add_filter( 'frm_admin_full_screen_class', 'frm_keep_full_screen' );
function frm_keep_full_screen(){
  return '';
}

// ADD Page Template Column in Admin View
add_filter( 'manage_pages_columns', 'page_column_views' );
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );
function page_column_views( $defaults )
{
   $defaults['page-layout'] = __('Template');
   return $defaults;
}
function page_custom_column_views( $column_name, $id )
{
   if ( $column_name === 'page-layout' ) {
       $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
       if ( $set_template == 'default' ) {
           echo 'Default';
       }
       $templates = get_page_templates();
       ksort( $templates );
       foreach ( array_keys( $templates ) as $template ) :
           if ( $set_template == $templates[$template] ) echo $template;
       endforeach;
   }
}


// ADD SHORTCODE to ACF Text Fields
add_filter('acf/format_value/type=textarea', 'do_shortcode');


// Images get post name if alt is empty
 function get_alt($pid = null)
{
    global $post;
    if ($pid == null) {
       $pid = $post->ID;
    }

    $thumbnail_id = get_post_thumbnail_id($pid);
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    if ($alt != '') {
        return esc_html( $alt );
    }
    return esc_html( get_the_title() );
}

function get_alt_acf($image)
{
    if (!is_array($image)) {
        return "";
    }
    if ($image['alt'] != '') {
        return esc_html($image['alt']);
    }
    return esc_html($image['title']);
}



// helper function to get formidable form IDs to ACF
function get_forms(){
    $results = array();
    foreach (FrmForm::get_published_forms() as $published_form) {
        $results[$published_form->id] = $published_form->name;
    }
    return $results;
}

// auto populate acf field with form IDs
function load_forms_function( $field ){
  $result = get_forms();
  if( is_array($result) ){
    $field['choices'] = array();
    foreach( $result as $key=>$match ){
      $field['choices'][ $key ] = $match;
    }
  }
    return $field;
}
add_filter('acf/load_field/name=formidable_ids', 'load_forms_function');


// Function changes the return-path on email headers
class email_return_path {
	function __construct() {
		add_action( 'phpmailer_init', array( $this, 'fix' ) );   
	}
	function fix( $phpmailer ) {
	    $phpmailer->Sender = $phpmailer->From;
	}
}
new email_return_path();


// disable guntenberg editor
add_filter('use_block_editor_for_post', '__return_false', 10);



// stop auto update 
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

// remove WP Footer add tag digitial
function remove_footer_admin () {
 
echo 'Designed by <a href="http://www.tagdigitalmarketing" target="_blank">tag digital marketing</a>. "The Power of One" </p>';
 
}
add_filter('admin_footer_text', 'remove_footer_admin');


// site favicon per subsite for admin display
//check if ACF plugin class exists is installed
if(class_exists('ACF')){
function admin_favicon() { 
     if (get_field('tag_fav', 'options') !='') : ?>
         
<link rel="shortcut icon" type="image/png" href="<?php the_field('tag_fav', 'options'); ?>" />  
<?php 
      endif;
         }  

add_action('admin_head', 'admin_favicon');
} // end if acf


// function to remove the dashboard widgets, but only for non-admin users
// if you want to remove the widgets for admin(s) too, remove the 'if' statement within the function
/*
function remove_dashboard_widgets() {
//	if ( ! current_user_can( 'manage_options' ) ) {	
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
	}
// }
 
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

*/

// Hide Elementor folder in Media Library - ugly css & txt files
// were visible to site users
// NOT CURRENTLY NEEDED b/c of wp media folder plugin
/*
function media_library_hide_elementor_fonts($where) {
   if(isset($_POST['action']) && ( $_POST['action'] == 'query-attachments')) {
      $where .= ' AND guid NOT LIKE "%wp-content/uploads/elementor%"';
   }

   return $where;
}

add_filter('posts_where', 'media_library_hide_elementor_fonts');
*/



