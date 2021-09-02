<?php
/*

@package flexproject

   ===============
   THEME FUNCTIONS to LOAD in the Header
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}



//check if ACF plugin class exists is installed and active
if(class_exists('ACF')){
// this bracket closes at the end    



 // Add Favicon    
    function acf_tag_fav() {
         if (get_field('tag_fav', 'options') !='') : ?>
         
<link rel="shortcut icon" type="image/png" href="<?php the_field('tag_fav', 'options'); ?>" />    

            <?php 
      endif;
         } 

    add_action( 'wp_head', 'acf_tag_fav');



// Add to Head Google Tag Manager Options
 function acf_tag_gtm() {

      if (get_field('google_tag_selector', 'options') == 0 && !empty(get_field('google_tag_manager', 'options'))): ?>
         <!-- SINGLE GTM CONTAINER -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php the_field('google_tag_manager', 'options'); ?>');
          </script>
          <!-- END SINGLE GTM CONTAINER Love -->
          <?php endif; ?>
          <?php if (get_field('google_tag_selector', 'options')== 1 && !empty(get_field('gtm_1', 'options')) && !empty(get_field('gtm_2', 'options'))): ?>
          <!-- DOUBLE GTM CONTAINER -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php the_field('gtm_1', 'options'); ?>');
          </script>
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php the_field('gtm_2', 'options'); ?>');
          </script>
          <!-- END DOUBLE GTM CONTAINER -->
          <?php endif; ?>
          <?php if (get_field('google_tag_selector', 'options') == 2 && !empty(get_field('tag_manager_head', 'options'))): ?>
          <!--  GTM CONTAINER OVERRIDE -->
          <?php the_field('tag_manager_head', 'options'); ?>
          <!--  END GTM CONTAINER OVERRIDE-->
          <?php endif; ?>
          
          <?php

}
    add_action( 'wp_head', 'acf_tag_gtm',1,1);

// Add to Head GEO Meta Options
 function acf_geo_meta() {
    ?>

<!-- START GEO META -->
          <?php if (get_field('country_code', 'options') ) : ?>
            <meta name="geo.region" content="<?php the_field('country_code', 'options'); ?>-<?php the_field('state', 'options'); ?>" />
             <?php endif; ?>
              <?php if (get_field('city', 'options') ) : ?>
          <meta name="geo.placename" content="<?php the_field('city', 'options'); ?>" />
           <?php endif; ?>
            <?php if (get_field('latitude', 'options') ) : ?>
          <meta name="geo.position" content="<?php the_field('latitude', 'options'); ?>;<?php the_field('longitude', 'options'); ?>" />
          <meta name="ICBM" content="<?php the_field('latitude', 'options'); ?>, <?php the_field('longitude', 'options'); ?>" />
           <?php endif; ?>
           <?php if (get_field('copyright_name', 'options') ) : ?>
          <meta name="copyright" content="<?php the_field('copyright_name', 'options'); ?>" />
           <?php endif; ?>
            <!-- END GEO META -->
            <?php
}
    add_action( 'wp_head', 'acf_geo_meta');


// add gtm to body
   
function acf_gtm_body() {
    ?>


          <?php if (get_field('google_tag_selector', 'options') == 0 && !empty(get_field('google_tag_manager', 'options'))): ?>
          <!-- SINGLE GTM CONTAINER (noscript) --> 
          <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php the_field('google_tag_manager', 'options'); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
          <!-- END SINGLE GTM CONTAINER (noscript) -->
          <?php endif; ?>
         <?php if (get_field('google_tag_selector', 'options')== 1 && !empty(get_field('gtm_1', 'options')) && !empty(get_field('gtm_2', 'options'))): ?>
          <!-- Double GTM Container (noscript) -->
          <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php the_field('gtm_1', 'options'); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
          <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php the_field('gtm_2', 'options'); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
          <!-- End Double GTM Container (noscript) -->
          <?php endif; ?>
         <?php if (get_field('google_tag_selector', 'options') == 2 && !empty(get_field('tag_manager_body', 'options'))): ?>
          <!--  GTM CONTAINER OVERRIDE -->
          <?php the_field('tag_manager_body', 'options'); ?>
          <!--  END GTM CONTAINER OVERRIDE-->

          <?php endif; ?>
         
     <?php
  }
    add_action( 'wp_body_open', 'acf_gtm_body');
    
    
// ADD TO CODE BOX FOOTER   
function acf_footer_code() {
    ?>


         <?php if (get_field('footer_code', 'options') !='') : ?>
          <!-- START FOOTER CODE -->
           <?php the_field('footer_code', 'options'); ?>
           <!-- END FOOTER CODE -->
           <?php endif; ?>
         
     <?php
  }
    add_action( 'wp_footer', 'acf_footer_code');
    
// ADD Global Theme Options CODE BOX HEAD  
function acf_head_code() {
    ?>


         <?php if (get_field('head_code', 'options') !='') : ?>
          <!-- START HEADER CODE -->
           <?php the_field('head_code', 'options'); ?> 
           <!-- END HEADER CODE -->
           <?php endif; ?>
         
     <?php
  }
    add_action( 'wp_head', 'acf_head_code');

// Add to Head Single Pages
    function acf_tag_head_code() {
         if (get_field('tag_head_tag') )  { 
              the_field('tag_head_tag');
         } 
  }
    add_action( 'wp_head', 'acf_tag_head_code');    
    
    
 } // <<<----- IMPORTANT end if ACF class exits

 function wp_body_code() {
do_action('wp_body_code');
}



