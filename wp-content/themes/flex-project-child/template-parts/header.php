<?php
/**
 * The template for displaying header.
 * ONLY to be called if no elementor header is defined for any given page-post type 
 * @package HelloElementorChild - flex
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
?>
<header class="site-header parts_header_php" role="banner"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<div class="site-branding">
    <?php 
    if(class_exists('ACF')){
        ?>
		<img itemprop="image" class="header-logo" style="max-width:300px;" src="<?php the_field('website_header_logo', 'options'); ?> " />
		 <?php } ?>
		</div>
	<div class="site-branding" style="float:left;margin:30px 0 0 20px;max-width:600px;">
	
			<p class="site-description" style="font-size:80%;font-style:italic;opacity:0.5;">
			    <small><i>ERROR CODE: 1708 "header undefined"</i></small><br>
			Please choose a header for this display condition in settings - eTemplates. 
			</p>
		
	</div>




</header>
