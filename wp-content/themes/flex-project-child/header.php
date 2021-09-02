<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' ); ?>
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div style="display:none;"></div>

<?php
// alert display - if no_nav post type don't display
if ( is_singular('no_nav') ) {
    // do nothing
} else {
   // load alert above header alert_position
//check if ACF plugin class exists is installed
if(class_exists('ACF')){   
 if (get_field('alert_display', 'options') =='1'): { 
     if (get_field('alert_position', 'options') =='0'): { 
  get_template_part( 'template-parts/section', 'tag-alert' ); 
     }
     endif;
 }
 endif;
} 
}
//show elementor content
hello_elementor_body_open();

// if no header is defined in display conditions do this
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	get_template_part( 'template-parts/header' );
}

// alert display - if no_nav post type don't display
if ( is_singular('no_nav') ) {
    // do nothing
} else {
   // load alert above below alert_position
//check if ACF plugin class exists is installed
if(class_exists('ACF')){   
 if (get_field('alert_display', 'options') =='1'): { 
     if (get_field('alert_position', 'options') =='1'): { 
  get_template_part( 'template-parts/section', 'tag-alert' ); 
     }
     endif;
 }
 endif;
} 
}

?>

<?php
  
