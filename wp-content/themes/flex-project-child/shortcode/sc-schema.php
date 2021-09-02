    
<div class="schema_wrap" itemscope itemtype="http://schema.org/LocalBusiness">
            <img itemprop="image" style="display:none" src="<?php the_field('schema_logo', 'options'); ?> " />
            <div class="company_wrap">
              <span class="h3" style="margin-top: 0;">Address</span>
              <div  class="companyname " itemprop="name">
                 <?php the_field('company_name', 'options'); ?>
              </div>
              <div style="display:none" class="contactdescription" itemprop="description">
                 <?php the_field('company_description', 'options'); ?>
              </div>
              <div class="contactaddress" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                <span class="streetaddress" itemprop="streetAddress">
               <?php the_field('street', 'options'); ?> 
                </span><br>
                <span class="addresslocality" itemprop="addressLocality">
                <?php the_field('city', 'options'); ?>,
                </span>
                <span class="addressregion" itemprop="addressRegion">
                <?php the_field('state', 'options'); ?> 
                </span>
                <span class="postalcode"itemprop="postalCode">
                <?php the_field('zip', 'options'); ?> 
                </span>
              </div>
              <span class="h3" >Phone</span>
              <div class="contactphone" itemprop="telephone">
                <a href="tel:+<?php the_field('phone', 'options'); ?> ">
               <?php the_field('phone', 'options'); ?> </a>
              </div>
              <div class="contactphone" itemprop="telephone">
                <a href="tel:+<?php the_field('phone_2', 'options'); ?> ">
                <?php the_field('phone_2', 'options'); ?> </a>
              </div>
             <div class="time_schema_wrap" style="display:noneX;">
               
 <?php if ( have_rows( 'main_hours', 'option' ) ) : ?>
       <?php while ( have_rows( 'main_hours', 'option' ) ) : the_row(); ?>

      <?php if (get_sub_field('mo_choice') == '0' ) : ?>
      <?php if( have_rows('mo_hours_repeater') ):
        while ( have_rows('mo_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="Mo <?php the_sub_field( 'mo_open' ); ?>-<?php the_sub_field( 'mo_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('mo_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="Mo 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('mo_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="Mo Closed"></time>
      <?php endif; ?>

            <?php if (get_sub_field('tu_choice') == '0' ) : ?>
      <?php if( have_rows('tu_hours_repeater') ):
        while ( have_rows('tu_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="Tu <?php the_sub_field( 'tu_open' ); ?>-<?php the_sub_field( 'tu_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('tu_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="Tu 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('tu_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="Tu Closed"></time>
      <?php endif; ?>

              <?php if (get_sub_field('we_choice') == '0' ) : ?>
      <?php if( have_rows('we_hours_repeater') ):
        while ( have_rows('we_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="We <?php the_sub_field( 'we_open' ); ?>-<?php the_sub_field( 'we_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('we_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="We 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('we_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="We Closed"></time>
      <?php endif; ?>

              <?php if (get_sub_field('th_choice') == '0' ) : ?>
      <?php if( have_rows('th_hours_repeater') ):
        while ( have_rows('th_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="Th <?php the_sub_field( 'th_open' ); ?>-<?php the_sub_field( 'th_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('th_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="Th 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('th_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="Th Closed"></time>
      <?php endif; ?>

              <?php if (get_sub_field('fr_choice') == '0' ) : ?>
      <?php if( have_rows('fr_hours_repeater') ):
        while ( have_rows('fr_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="Fr <?php the_sub_field( 'fr_open' ); ?>-<?php the_sub_field( 'fr_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('fr_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="Fr 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('fr_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="Fr Closed"></time>
      <?php endif; ?>

              <?php if (get_sub_field('sa_choice') == '0' ) : ?>
      <?php if( have_rows('sa_hours_repeater') ):
        while ( have_rows('sa_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="Sa <?php the_sub_field( 'sa_open' ); ?>-<?php the_sub_field( 'sa_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('sa_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="Sa 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('sa_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="Sa Closed"></time>
      <?php endif; ?>

              <?php if (get_sub_field('su_choice') == '0' ) : ?>
      <?php if( have_rows('su_hours_repeater') ):
        while ( have_rows('su_hours_repeater') ) : the_row(); ?>
      <div class="time_wrapper">
        <time itemprop="openingHours" datetime="Su <?php the_sub_field( 'su_open' ); ?>-<?php the_sub_field( 'su_close'); ?>"></time>
        </div>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php endif; ?>
      <?php if (get_sub_field('su_choice') == '1' ) : ?>
      <time itemprop="openingHours" datetime="Su 00:00-23:59"></time>
      <?php endif; ?>
      <?php if (get_sub_field('su_choice') == '2' ) : ?>
      <time itemprop="openingHours" datetime="Su Closed"></time>
      <?php endif; ?>


<?php endwhile; ?>
<?php endif; ?>

              </div>
             
              
              <div class="pricerange" style="display:none" itemprop="priceRange">
                <?php the_field('price_range', 'options'); ?> 
              </div>
              
            </div>
          
            <div class="geo" itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">
              <meta itemprop="latitude" content="<?php the_field('latitude', 'options'); ?> " />
              <meta itemprop="longitude" content="<?php the_field('longitude', 'options'); ?> " />
            </div>
           
          </div>