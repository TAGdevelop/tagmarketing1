<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
?>
<?php
while ( have_posts() ) : the_post();
	?>

<main <?php post_class( 'tag_contact_main' ); ?> role="main">

	<div class="tag_contact_content">
		<?php the_content(); ?>
	</div>
</main>
<?php endwhile; ?>

<!-- SCHEMA LOCAL BUSINESS -->
 <div class="time_schema_wrap" style="display:noneX;">
     <div class="schema_wrap" itemscope itemtype="http://schema.org/LocalBusiness">
    <?php if( have_rows('su_hours_repeater', 'option') ):
        while ( have_rows('su_hours_repeater', 'option') ) : the_row(); ?>
               <time class="time"  itemprop="openingHours" datetime="Su <?php the_sub_field( 'su_open', false ); ?>-<?php the_sub_field( 'su_close', false ); ?>"></time>
 <?php endwhile; ?>
      <?php endif; ?>
                
                <time itemprop="openingHours" datetime="Mo <?php the_toption('mon_hours_open'); ?>-<?php the_toption('mon_hours_close'); ?>"></time> 
                <time itemprop="openingHours" datetime="Tu <?php the_toption('tues_hours_open'); ?>-<?php the_toption('tues_hours_close'); ?>"></time> 
                <time itemprop="openingHours" datetime="We <?php the_toption('wed_hours_open'); ?>-<?php the_toption('wed_hours_close'); ?>"></time> 
                <time itemprop="openingHours" datetime="Th <?php the_toption('thurs_hours_open'); ?>-<?php the_toption('thurs_hours_close'); ?>"></time> 
                <time itemprop="openingHours" datetime="Fr <?php the_toption('fri_hours_open'); ?>-<?php the_toption('fri_hours_close'); ?>"></time> 
                <time itemprop="openingHours" datetime="Sa <?php the_toption('sat_hours_open'); ?>-<?php the_toption('sat_hours_close'); ?>"></time>
              </div>
          </div>
<!-- END SCHEMA LOCAL BUSINESS -->

<?php get_footer(); ?>