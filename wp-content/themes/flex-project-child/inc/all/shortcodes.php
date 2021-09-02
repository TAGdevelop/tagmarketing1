<?php



// ALL Shortcodes that use Advanced Custom Fields
// Is ACF active Check
if(class_exists('ACF')){



/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_slider_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'tagsliderv23' );
   return ob_get_clean(); 
} 
add_shortcode( 'tag_slider', 'tag_slider_shortcode' );
/** ENQUEUE for this shortcode only **/
function add_tag_slider_scripts() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'tag_slider') ) {
    //wp_enqueue_style( 'bootstrap3css',get_stylesheet_directory_uri() . '/assets/deprecated/bootstrap.min.css');
wp_enqueue_style( 'instagramcss',get_stylesheet_directory_uri() . '/assets/vendor/instagram-filters/instagram.min.css', '0.1.4', 'all');
wp_enqueue_style( 'owlcss',get_stylesheet_directory_uri() . '/assets/deprecated/owl.carousel.min.css');
wp_enqueue_style( 'owlthemecss',get_stylesheet_directory_uri() . '/assets/deprecated/owl.theme.default.min.css');
wp_enqueue_style( 'oldmaincss',get_stylesheet_directory_uri() . '/assets/deprecated/old-main.css');
   
wp_enqueue_script( 'old-main-js',get_stylesheet_directory_uri() . '/assets/deprecated/old.main.js', array('jquery'));
wp_enqueue_script( 'owl-js',get_stylesheet_directory_uri() . '/assets/deprecated/owl.carousel.min.js', array('jquery'));
wp_enqueue_script( 'bootstrap3js', '/assets/deprecated/bootstrap.min.js', array('jquery'));
 
    }
}
add_action( 'wp_enqueue_scripts', 'add_tag_slider_scripts');

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_hours_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'hours' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_hours', 'tag_hours_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_hours_alt1_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'hours-alt1' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_hours_alt1', 'tag_hours_alt1_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_hours_alt2_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'hours-alt2' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_hours_alt2', 'tag_hours_alt2_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_social_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'social' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_social', 'tag_social_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_schema_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'schema' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_schema', 'tag_schema_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_phonelink_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'phonelink' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_phonelink', 'tag_phonelink_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_phone_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'phone' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_phone', 'tag_phone_shortcode' );

/* LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_joinlink_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'joinlink' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_joinlink', 'tag_joinlink_shortcode' );


/** LOAD CUSTOM TEMPLATE PARTIALS WITH SHORTCODE **/
function tag_vcard_shortcode() {
   ob_start();
   get_template_part( 'shortcode/sc', 'vcard' );
   return ob_get_clean();   
} 
add_shortcode( 'tag_vcard', 'tag_vcard_shortcode' );

} //END ACF Active check



/** LOAD CUSTOM abc TEMPLATE PARTIALS WITH SHORTCODE **/
function abc_calendar_process($atts, $content = null){
	$atts = shortcode_atts( array(
        'club_id' => '',
        'app_id' => '',
        'app_key' => '',
        'category_display' => '',
    ), $atts, 'tag_cal');
	ob_start();
	set_query_var( 'club_id', $atts['club_id'] );
	set_query_var( 'app_id', $atts['app_id'] );
	set_query_var( 'app_key', $atts['app_key'] );
	set_query_var( 'category_display', $atts['category_display'] );
	print '<div id="abc_calendar">';
	 get_template_part( 'shortcode/sc', 'abc_calendar' );
	print '</div>';
	return ob_get_clean();
}   
add_shortcode( 'abc_calendar', 'abc_calendar_process' );
/** ENQUEUE for this abc shortcode only **/
function add_abc_cal_scripts() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'abc_calendar') ) {
        wp_enqueue_style( 'tag_abc_cal', get_stylesheet_directory_uri() . '/assets/css/tag_abc_cal.css' );
        
        wp_enqueue_script('tag_abc_cal-js',get_stylesheet_directory_uri().'/assets/js/tag_abc_cal.js', array('jquery')); 
         wp_enqueue_script('popper-js',get_stylesheet_directory_uri().'/assets/vendor/popper/popper.min.js', array('jquery')); 
         wp_enqueue_script('tooltip-js',get_stylesheet_directory_uri().'/assets/vendor/tooltip/tooltip.min.js', array('jquery')); 
 
    }
}
add_action( 'wp_enqueue_scripts', 'add_abc_cal_scripts');