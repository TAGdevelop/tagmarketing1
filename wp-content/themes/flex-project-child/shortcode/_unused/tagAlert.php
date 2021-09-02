<?php 
	$args = array('post_type' => 'alert',
				'post_status' => 'publish',
				'orderby' => 'menu_order',
                //  'posts_per_page'=>3,
				'order'   => 'ASC');
    $ft_query = null;
    $ft_query = new WP_Query($args);
    if( $ft_query->have_posts() ):
?>

<!-- Start Alert section -->
<div class="elementor-section elementor-section-boxed">
<div class="elementor-container ">
    <div class="elementor-row">
    <div class="tag_swiper elementor-element  elementor-column elementor-col-100 elementor-top-column">
        <div class="elementor-column-wrap  elementor-element-populated">
                    <div class="elementor-widget-wrap">
    <div id="tag_alert" class="alert_swiper-container swiper-container-horizontal swiper-container">
        <div class="swiper-wrapper">
            <?php while ($ft_query->have_posts()): $ft_query->the_post();	?>
            <div class="swiper-slide">
                <div class="display_block ">
                <h4><?php the_title(); ?></h4>
            
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
    <div class="tag_alert_page swiper-pagination swiper-pagination-bullets"></div>
    </div>



    <!-- If we need navigation buttons -->
<div class="elementor-swiper-button elementor-swiper-button-prev" >
                            <i class="eicon-chevron-left" aria-hidden="true"></i>
                            <span class="elementor-screen-only">Next</span>
                        </div>
  
    <div class="elementor-swiper-button elementor-swiper-button-next" >
                            <i class="eicon-chevron-right" aria-hidden="true"></i>
                            <span class="elementor-screen-only">Next</span>
                        </div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
 </div>
</div>   
</div>
</div>
</div>
</div>
<!-- END ALERT -->
<?php endif; 
