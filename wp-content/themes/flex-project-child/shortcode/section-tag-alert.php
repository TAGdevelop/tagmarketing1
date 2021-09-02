<?php 
	$args = array('post_type' => 'alerts',
				'post_status' => 'publish',
				'orderby' => 'menu_order title',
                   'order'   => 'ASC',
                //  'posts_per_page'=>3,
		    	
				);
    $ft_query = null;
    $ft_query = new WP_Query($args);
    if( $ft_query->have_posts() ):
        
?>
<?php  if (get_field('alert_display', 'options') =='1'): ?>
<style>
.alert_wrap .tag_alert a, .btn_link { color:<?php the_field('alert_link_color', 'options'); ?> ;} 
.alert_wrap .tag_alert a:hover { color:<?php the_field('alert_hover_color', 'options'); ?> ;} 
.btn_link {transition:all 0.3s ease-in-out;padding:5px 15px;border:1px solid <?php the_field('alert_link_color', 'options'); ?> ;}
.btn_link:hover {letter-spacing:0.1em; border:1px solid <?php the_field('alert_hover_color', 'options'); ?> ;}  
</style>
<?php endif; ?>
  <script>
     const swiper = new Swiper('.swiper-container', {
 autoplay: {
   delay: 1000,
 },
});
    </script>  
<!-- Start Alert section -->
<div class="alert_wrap elementor-section elementor-section-boxed" style="background:
    <?php the_field('alert_background_color', 'options'); ?>; color:<?php the_field('alert_text_color', 'options'); ?>" >
<div class="elementor-container ">
    <div class="elementor-row">
    <div class="tag_swiper elementor-element  elementor-column elementor-col-100 elementor-top-column">
        <div class="elementor-column-wrap  elementor-element-populated">
                    <div class="elementor-widget-wrap">
    <div class="tag_alert alert_swiper-container swiper-container-horizontal swiper-container">
        <div class="d-flex align-items-center swiper-wrapper">
            <?php while ($ft_query->have_posts()): $ft_query->the_post();	?>
            <div class="swiper-slide">
                <div class="display_block ">
              <!--  <h4><?php the_title(); ?></h4>  -->
            
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
            </div>
            <?php endwhile; 
            wp_reset_postdata();
            ?>
        </div>
         <!-- If we need pagination -->
         <?php if (get_field('alert_dots', 'options') =='1') : ?>
          <div class="pagination_spacer"></div>
  <div class="tag_alert_page swiper-pagination swiper-pagination-bullets"></div>
    <?php endif; ?>
    
    </div>



    <!-- If we need navigation buttons -->
 <?php if (get_field('alert_nav', 'options') =='1') : ?>

<div class="elementor-swiper-button elementor-swiper-button-prev" >
                            <i class="eicon-chevron-left" aria-hidden="true"></i>
                            <span class="elementor-screen-only">Next</span>
                        </div>
  
    <div class="elementor-swiper-button elementor-swiper-button-next" >
                            <i class="eicon-chevron-right" aria-hidden="true"></i>
                            <span class="elementor-screen-only">Next</span>
                        </div>
 <?php endif; ?>

    <!-- If we need scrollbar -->
    <!-- No we don't, Ha -->
    <!-- 
    <div class="swiper-scrollbar"></div>
    -->
 </div>
</div>   
</div>
</div>
</div>
</div>
<!-- END ALERT -->
<?php endif; 
