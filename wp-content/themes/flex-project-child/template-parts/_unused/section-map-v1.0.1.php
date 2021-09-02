<!-- MAP SECTION -->

 <?php if(get_field('maps_embed') ||  get_field('map_static_image') != ''): ?>
<div id="tagmap">
    <section id="mapswp" class="tag_section">
        <?php if(get_field('maps_title') != ''): ?>
        <h2 class="maps_title text-center">
            <?=get_field('maps_title'); ?>
        </h2>
        <?php endif; ?>
        <div class="maps_info">
           <?=get_field('maps_embed'); ?>
           <?php if(get_field('display_map_badge') == 'Yes'): ?>
            <div class="mapbox">
                <div class="comp_name">
                    <?php the_toption('general_address_company'); ?>
                </div>
                <div class="site_address">
                    <?php the_toption('general_address_street'); ?>
                    <br />
                    <?php the_toption('general_address_city'); ?>,
                        <?php the_toption('general_address_state'); ?>                              
                    <?php the_toption('general_address_zip'); ?>
                    <br />
                      <a href="tel:+<?php the_toption('general_address_country_code'); ?>-<?php the_toption('general_address_area_code1'); ?>-<?php the_toption('general_address_phone1'); ?>">
                    <?php if (get_toption('general_address_country_code_display') == 1 ):  ?>+<?php the_toption('general_address_country_code'); ?><?php endif; ?> (<?php the_toption('general_address_area_code1'); ?>) <?php the_toption('general_address_phone1'); ?></a>
                </div>
                <div class="google_rating">
                    <span class="rating_stars">
                        <?php if( get_field('rating_stars') == '1 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '1.5 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-half-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '2 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '2.5 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-half-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '3 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '3.5 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-half-o" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '4 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '4.5 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star-half-o" ></i>
                        <?php endif; ?>
                        <?php if( get_field('rating_stars') == '5 Star' ): ?>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php if(get_field('map_static_image') != ''): ?>
        <div class="bgmap" style="background-image: url(
            <?php the_field('map_static_image'); ?>)">
        </div>
        <?php endif; ?>
    </section>
</div>
 <?php endif; ?>
<!-- END MAP SECTION -->