<?php
/**
 * The template for displaying the default template. 
 * Without it elementor boxed the content
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

<main <?php post_class( 'root_page_php' ); ?> role="main">

	<div class="tag_default_page_content">
		<?php the_content(); ?>
	</div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>