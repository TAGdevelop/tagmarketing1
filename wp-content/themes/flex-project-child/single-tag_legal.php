<?php
/**
 * The template for displaying the default legal template. 
 * Without it --- elementor boxed the content
 * @package flexproject
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();

while ( have_posts() ) : the_post();
	?>

<main <?php post_class( 'tag_bs_legal' ); ?> role="main">
    <br><br><br>
    
<!-- START IF GOOGLE -->    
<?php if (get_field( 'google_font_1', 'option')): ?>
<?php 
    $google_1 = get_field( 'google_font_1', 'option' );
    var_dump($google_1);
?>
  <h3>Seperate </h3>
<?php
echo '<pre>'.print_r(get_field( 'google_font_1', 'option'), true).'</pre>';
?>
  <h3>Seperate HERE</h3>

<?php
    $google_1 = get_field( 'google_font_1', 'option');
    //Inner Arrays
    $vars = $google_1['variants'];
    //I don't use this because latin is the Google default
    $subs = $google_1['subsets'];
    // Get all array items - comma separated
    $vars_string = rtrim(implode(',', $vars), ',');
    $subs_string = rtrim(implode(',', $subs), ',');
?>
<p>https://fonts.googleapis.com/css?family=<?php echo $google_1['font'] ?>:<?php echo $vars_string ?>&display=swap&subset=<?php echo $subs_string ?>" rel="stylesheet" </p>
<style>
@import url('https://fonts.googleapis.com/css?family=<?php echo $google_1['font'] ?>:<?php echo $vars_string ?>&display=swap&subset=<?php echo $subs_string ?>');
</style>
<link href="https://fonts.googleapis.com/css?family=<?php echo $google_1['font'] ?>:<?php echo $vars_string ?>&display=swap&subset=<?php echo $subs_string ?>" rel="stylesheet">
  <?php endif; ?> <!-- END IF GOOGLE --> 
  
  
     <?php if ( have_rows( 'main_hours', 'option' ) ) : ?>
<?php while ( have_rows( 'main_hours', 'option' ) ) : the_row(); ?>
    
    
    <center>
  
<h1>the_field true retrieve formatted option data: <?php if (get_sub_field('mo_choice') == '0' ) : ?>
      <?php if( have_rows('mo_hours_repeater') ):
        while ( have_rows('mo_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'mo_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'mo_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?></h1>
<p style="font-size:16px;">(used for front-end hours display)</p>

<h1>the_field false - retrieve RAW option data: <?php if (get_sub_field('mo_choice') == '0' ) : ?>
      <?php if( have_rows('mo_hours_repeater') ):
        while ( have_rows('mo_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'mo_open', false ); ?></span>-<span class="time_close"><?php the_sub_field( 'mo_close', false ); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?></h1>
<p style="font-size:16px;">(used for schema 24 hour meta display)</p>
</center>


<?php endwhile; ?>
<?php endif; ?>

<style>
.days {width:140px;}
.tag_hours_table {max-width:500px;}
</style>



<div style="font-size:18px">
    <center><h1>More Code on Source file</h1></center>
  

 <div class="d-flex justify-content-center mb-3 main_hours">
<?php if ( have_rows( 'main_hours', 'option' ) ) : ?>
<?php while ( have_rows( 'main_hours', 'option' ) ) : the_row(); ?>
<table class="tag_hours_table table table-striped" style="font-size:25px;">
  <tr>
    <td class="days tag_table_cell">
      Monday
    </td>
    <td>
      <?php if (get_sub_field('mo_choice') == '0' ) : ?>
      <?php if( have_rows('mo_hours_repeater') ):
        while ( have_rows('mo_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'mo_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'mo_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('mo_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('mo_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td class="days tag_table_cell">
      Tuesday
    </td>
    <td>
      <?php if (get_sub_field('tu_choice') == '0' ) : ?>
      <?php if( have_rows('tu_hours_repeater') ):
        while ( have_rows('tu_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'tu_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'tu_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('tu_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('tu_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td class="days tag_table_cell">
      Wednesday
    </td>
      <td>
      <?php if (get_sub_field('we_choice') == '0' ) : ?>
      <?php if( have_rows('we_hours_repeater') ):
        while ( have_rows('we_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'we_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'we_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('we_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('we_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td class="days tag_table_cell">
      Thursday
    </td>
     <td>
      <?php if (get_sub_field('th_choice') == '0' ) : ?>
      <?php if( have_rows('th_hours_repeater') ):
        while ( have_rows('th_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'th_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'th_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('th_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('th_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td class="days tag_table_cell">
      Friday
    </td>
     <td>
      <?php if (get_sub_field('fr_choice') == '0' ) : ?>
      <?php if( have_rows('fr_hours_repeater') ):
        while ( have_rows('fr_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'fr_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'fr_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('fr_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('fr_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td class="days tag_table_cell">
      Saturday
    </td>
      <td>
      <?php if (get_sub_field('sa_choice') == '0' ) : ?>
      <?php if( have_rows('sa_hours_repeater') ):
        while ( have_rows('sa_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'sa_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'sa_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('sa_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('sa_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td class="days tag_table_cell">
      Sunday
    </td>
       <td>
      <?php if (get_sub_field('su_choice') == '0' ) : ?>
      <?php if( have_rows('su_hours_repeater') ):
        while ( have_rows('su_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
         <span class="time_open"><?php the_sub_field( 'su_open' ); ?></span>-<span class="time_close"><?php the_sub_field( 'su_close'); ?></span>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('su_choice') == '1' ) : ?>
      <div class="open_all">Open 24hrs</div>
      <?php endif; ?>
      <?php if (get_sub_field('su_choice') == '2' ) : ?>
      <div class="close_all">Closed</div>
      <?php endif; ?>
    </td>
  </tr>
</table>

<?php endwhile; ?>
<?php endif; ?>
  </div>


</div>






	<div class="tag_legal_page_content">
		<?php the_content(); ?>
	</div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>