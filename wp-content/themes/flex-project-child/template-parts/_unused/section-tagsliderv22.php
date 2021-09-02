<?php 
/**
 *  tagSlider v2.2
 * 
 *   06/30/2020
 */

//check if ACF plugin class exists 
if(class_exists('ACF')){


?>
<!-- owl needs to trigger after elementor when in admin edit page
     -->

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/deprecated/old.main.js"></script> 


<?php 


$vid_control_group = get_field('video_controls');
  $hero_group = get_field('tag_hero_block');
  if ($hero_group['hero_type'] == 'slider'):
  if (is_numeric($hero_group['slider_category'])) {
    $tax_query = array(
          array(
            'taxonomy' => 'tag_sliders_cat',
            'field'    => 'term_id',
            'terms'    => array($hero_group['slider_category']),
            'operator' => 'IN',
          ),
        );
  }else{
    $tax_query = array();
  }
  $args = array('post_type' => 'tag_slider',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order'   => 'ASC',
        'tax_query' => $tax_query,
        'posts_per_page'=>'-1');
    $ft_query = null;
    $ft_query = new WP_Query($args);
    if( $ft_query->have_posts() ):
  ?>
  
 
  <?php if( $hero_group['hero_type'] != 'null'  ): ?>
<section id="form_sliderwpcats" class="group_slider tag_slider">
<div id="slider_block" class="slider_form_group  <?php if(get_field('form_choice') != '0' ): ?>  has_form <?php else: ?> no_form<?php endif; ?>">
  <div class="slider_wp">
    <div class="flex-slidercats2 owl-theme owl-carousel">
        <?php while ($ft_query->have_posts()): $ft_query->the_post(); 
        $murl = (get_field('image_mobile'))?get_field('image_mobile'):get_the_post_thumbnail_url(get_the_ID(),'full');
        ?>
     <div class="slider-titem <?php if(get_field('show_headlines') == 'Show Content'): ?> show_content<?php endif; ?><?php if( get_field('slider_css') ): ?> <?=get_field('slider_css');?><?php endif; ?>">
      <div class="slideimgmasterwrap">
        <?php if(get_field('link_type') != '0' ): ?> 
          <a href="<?php if(get_field('link_type') == '1' ): ?><?=get_field('internal_link');?><?php endif; ?><?php if(get_field('link_type') == '2' ): ?><?=get_field('custom_link');?><?php endif; ?>" <?php if(get_field('link_type') == '2' ): ?><?php if(get_field('link_target') == '1' ): ?>target="_blank"<?php endif; ?><?php endif; ?>>
            <?php endif; ?>
<div <?php if (get_field('instagram_filters') != ''): ?>class="instagram-class <?=get_field('instagram_filters');?>"<?php endif; ?>>
       <!-- Effects wrap open-->
  <?php if(get_field('effects_for_image') == '1' ): ?> 
            <div <?php if( in_array( 'blur', get_field('image_effect') ) ) : ?>style="-webkit-filter: blur(3px);  filter: blur(3px) "<?php endif; ?>>
          <div <?php if( in_array( 'blur_more', get_field('image_effect') ) ) : ?>style="-webkit-filter: blur(6px);  filter: blur(6px) "<?php endif; ?>>
        <div <?php if( in_array( 'bnw', get_field('image_effect') ) ) : ?>style="-webkit-filter: grayscale(1);  filter: grayscale(1); "<?php endif; ?>>
            <div <?php if( in_array( 'sepia', get_field('image_effect') ) ) : ?>style="-webkit-filter: sepia(1);filter: sepia(1);"<?php endif; ?>>
        <div <?php if( in_array( 'darken', get_field('image_effect') ) ) : ?>style="opacity:0.5; "<?php endif; ?>>
        <div <?php if( in_array( 'contrast', get_field('image_effect') ) ) : ?>style="-webkit-filter: contrast(2);filter: contrast(2) ; "<?php endif; ?>>
           <div <?php if( in_array( 'contrast_more', get_field('image_effect') ) ) : ?>style="-webkit-filter: contrast(5);filter: contrast(5) ; "<?php endif; ?>>
        <div <?php if( in_array( 'brightness', get_field('image_effect') ) ) : ?>style="-webkit-filter: brightness(2);filter: brightness(2);"<?php endif; ?>>
          <div <?php if( in_array( 'saturate', get_field('image_effect') ) ) : ?>style="-webkit-filter: saturate(2);filter: saturate(2);"<?php endif; ?>>
        <div <?php if( in_array( 'saturate_more', get_field('image_effect') ) ) : ?>style="-webkit-filter: saturate(4);filter: saturate(4);"<?php endif; ?>>
            <?php endif; ?>
            <!-- END Effects wrap open -->
          <div class="slideimgwrap">
                <?php $deskimage = get_field('image_desktop'); 
                  if( !empty($deskimage) ): ?>
                    <img class="slidesource" src="<?php echo $deskimage['url']; ?>" srcset="<?php echo $deskimage['url']; ?>  1920w, <?php $mobileimage = get_field('image_mobile'); if( !empty($mobileimage) ): ?><?php echo $mobileimage['url']; ?> 767w <?php endif; ?>"<?php if( !empty($deskimage['alt']) ): ?> alt="<?php echo $deskimage['alt']; ?>" <?php else: ?> alt="<?php the_title(); ?>" <?php endif; ?>></img>
                        <?php endif; ?>
                 </div>
            <!-- Effects wrap close -->
              <?php if(get_field('effects_for_image') == '1' ): ?> 
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <?php endif; ?>
              <!-- END Effects wrap close -->
          </div> <!-- end instagram -->
             <?php if(get_field('color_overlay_choice') == 'Yes'): ?> 
             <div class="slider_overlay" <?php if (get_field('overlay_color')): ?>style="background: <?php the_field('overlay_color'); ?>;"<?php endif; ?>></div>
             <?php endif; ?>
 <?php if(get_field('link_type') != '0' ): ?> 
          </a>
          <?php endif; ?>
        </div>  <!-- END imgmasterwrap -->
         <div class="container_reset">
      <div class="container">
<?php if(get_field('link_type') != '0' ): ?> 
          <a href="<?php if(get_field('link_type') == '1' ): ?><?=get_field('internal_link');?><?php endif; ?><?php if(get_field('link_type') == '2' ): ?><?=get_field('custom_link');?><?php endif; ?>" <?php if(get_field('link_type') == '2' ): ?><?php if(get_field('link_target') == '1' ): ?>target="_blank"<?php endif; ?><?php endif; ?>>
            <?php endif; ?>
<?php if(get_field('show_headlines') == 'Show Content'): ?> 
          <div id="hero-page"  class="<?php if(get_field('form_choice') != '0' ): ?>col-sm-6 col-md-7 col-lg-8 col-xs-12 has_former <?php else: ?> col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-xs-12 no_former  <?php endif; ?>"  >
            <div class="wordswrap">
           <div class="slider_content">
                <div class="heroblock-text">
                  <div class="newclass">
                    <?php if (get_field('hero_title') != ''): ?>
                    <div class="hero-title titlemod"><?php the_field('hero_title'); ?></div>
                    <?php endif; ?>
                  </div>
                  <?php if (get_field('hero_subtitle') != ''): ?>
                  <div class="hero-subtitle submod"><?php the_field('hero_subtitle'); ?></div>
                  <?php endif; ?>
                   <?php if (get_field('hero_content') != ''): ?>
                      <div class="content_wrap <?php if( in_array( '1', get_field('text_background_box') ) ) : ?>content_box<?php endif; ?> " <?php if (get_field('box_color')): ?>style="background: <?php the_field('box_color'); ?>;"<?php endif; ?>>
                         <div class="hero-content mod "><?=get_field('hero_content');?></div>
                      </div>
                      <?php endif; ?>
                      <?php if (get_field('hero_content_below') != ''): ?>
                      <div class="hero-content mod "><?=get_field('hero_content_below');?></div>
                      <?php endif; ?>
                </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
<?php if(get_field('show_headlines') == 'Show Headlines'): ?>
          <div class="wordswrap"  >
            <div class="slider_intro col-md-8 col-sm-7 col-xs-12">
                <div class="tag_slider_container">
                  <div class="slider_headings">
                    <?php if(get_field('hero_headline')): ?>
                    <div class="pl-title_wrap" >
                      <div class="pl-title"><?=get_field('hero_headline'); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if(get_field('hero_subheadline')): ?>
                    <div class="pl-subtitle_wrap" >
                      <div class="pl-subtitle "><?=get_field('hero_subheadline'); ?></div>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
         <?php endif; ?>
       <?php if(get_field('link_type') != '0' ): ?> 
          </a>
          <?php endif; ?>
 <?php if(get_field('form_choice') != '0' ): ?>  
  <div class="form_sign_up_cat col-md-4 col-sm-5  col-xs-12 pull-right">
    <div class="form_sign_up ">
        <div class="newclasser">
          <div id="chicago_signform" class="tag_slider_form form_signup_inner">
            <div id="form-aside" class="tagsignup">
               <?php if(get_field('form_choice') == '2'): ?> 
                <?php $frmID = get_field('formidable_ids'); ?>
                <?php echo do_shortcode("[formidable id=$frmID]"); ?>
                <?php endif; ?>
                 <?php if(get_field('form_choice') == '1'): ?> 
                 <?php  echo do_shortcode( get_toption('frm_sign_up')); ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
 <?php endif; ?>
</div> 
</div> <!-- CONTAINER RESET -->
</div>  <!-- slider-titem  -->
      <?php endwhile; wp_reset_postdata(); ?> 
    </div>
  </div>
</div>
</section>
<?php endif; ?>
<!-- END SLIDER -->
<?php endif; ?> <!-- end if hero_type == '' has no value - when page is new --> 
<?php else: ?> 
  <?php if( $hero_group['hero_type'] != 'null' ): ?>
   <?php  if ($hero_group['hero_type'] != 'slider' ): ?>
    <?php  if ($hero_group['hero_type'] != 'none' ): ?>
   

<section id="form_sliderwpcats" class="group_slider tag_slider">
<div id="slider_block" class="slider_form_group<?php if(get_field('form_choice') != '0' ): ?>  has_form <?php else: ?> no_form<?php endif; ?><?php if ($hero_group['hero_type'] == 'image'):?> single_image<?php endif; ?><?php if ($hero_group['hero_type'] == 'video'):?> video<?php endif; ?> ">
  <div class="slider_wp">
    <div class="flex-slidercats2 owl-theme owl-carousel">
      <div class="slider-titem <?php if(get_field('show_headlines') == 'Show Content'): ?> show_content<?php endif; ?><?php if( get_field('static_css') ): ?> <?=get_field('static_css');?><?php endif; ?>">
<?php if ($hero_group['hero_type'] == 'image'):?> 
        <div class="slideimgmasterwrap">
        <?php if(get_field('link_type') != '0' ): ?> 
          <a href="<?php if(get_field('link_type') == '1' ): ?><?=get_field('internal_link');?><?php endif; ?><?php if(get_field('link_type') == '2' ): ?><?=get_field('custom_link');?><?php endif; ?>" <?php if(get_field('link_type') == '2' ): ?><?php if(get_field('link_target') == '1' ): ?>target="_blank"<?php endif; ?><?php endif; ?>>
            <?php endif; ?>
<div <?php if (get_field('instagram_filters') != ''): ?>class="instagram-class <?=get_field('instagram_filters');?>"<?php endif; ?>>
       <!-- Effects wrap open-->
  <?php if(get_field('effects_for_image') == '1' ): ?> 
            <div <?php if( in_array( 'blur', get_field('image_effect') ) ) : ?>style="-webkit-filter: blur(3px);  filter: blur(3px) "<?php endif; ?>>
          <div <?php if( in_array( 'blur_more', get_field('image_effect') ) ) : ?>style="-webkit-filter: blur(6px);  filter: blur(6px) "<?php endif; ?>>
        <div <?php if( in_array( 'bnw', get_field('image_effect') ) ) : ?>style="-webkit-filter: grayscale(1);  filter: grayscale(1); "<?php endif; ?>>
            <div <?php if( in_array( 'sepia', get_field('image_effect') ) ) : ?>style="-webkit-filter: sepia(1);filter: sepia(1);"<?php endif; ?>>
        <div <?php if( in_array( 'darken', get_field('image_effect') ) ) : ?>style="opacity:0.5; "<?php endif; ?>>
        <div <?php if( in_array( 'contrast', get_field('image_effect') ) ) : ?>style="-webkit-filter: contrast(2);filter: contrast(2) ; "<?php endif; ?>>
           <div <?php if( in_array( 'contrast_more', get_field('image_effect') ) ) : ?>style="-webkit-filter: contrast(5);filter: contrast(5) ; "<?php endif; ?>>
        <div <?php if( in_array( 'brightness', get_field('image_effect') ) ) : ?>style="-webkit-filter: brightness(2);filter: brightness(2);"<?php endif; ?>>
          <div <?php if( in_array( 'saturate', get_field('image_effect') ) ) : ?>style="-webkit-filter: saturate(2);filter: saturate(2);"<?php endif; ?>>
        <div <?php if( in_array( 'saturate_more', get_field('image_effect') ) ) : ?>style="-webkit-filter: saturate(4);filter: saturate(4);"<?php endif; ?>>
            <?php endif; ?>
             <!-- END Effects wrap open -->
          <div class="slideimgwrap">
          
         <?php 
  $hgp_desk_img = $hero_group['desktop_image'];
  $hgp_mob_img = (!empty($hero_group['mobile_image']))?$hero_group['mobile_image']:$hgp_desk_img;
  ?>
                <?php   if( !empty($hgp_desk_img) ): ?>
                    <img class="slidesource" src="<?php echo $hgp_desk_img['url']; ?>" srcset="<?php echo $hgp_desk_img['url']; ?>  1920w, <?php if( !empty($hgp_mob_img) ): ?><?php echo $hgp_mob_img['url']; ?> 767w <?php endif; ?>"<?php if( !empty($hgp_desk_img['alt']) ): ?> alt="<?php echo $hgp_desk_img['alt']; ?>" <?php else: ?> alt="<?php the_title(); ?>" <?php endif; ?>></img>
                        <?php endif; ?>

        
        
              </div>
            <!-- Effects wrap close -->
              <?php if(get_field('effects_for_image') == '1' ): ?> 
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <?php endif; ?>
              <!-- END Effects wrap close -->
          </div> <!-- end instagram -->
             <?php if(get_field('color_overlay_choice') == 'Yes'): ?> 
             <div class="slider_overlay" <?php if (get_field('overlay_color')): ?>style="background: <?php the_field('overlay_color'); ?>;"<?php endif; ?>></div>
             <?php endif; ?>
 <?php if(get_field('link_type') != '0' ): ?> 
          </a>
          <?php endif; ?>
        </div>  <!-- END imgmasterwrap -->
 <?php else: ?> <!-- Else if not image -->
<div id="video_block">
     <?php if(get_field('link_type') != '0' ): ?> 
          <a href="<?php if(get_field('link_type') == '1' ): ?><?=get_field('internal_link');?><?php endif; ?><?php if(get_field('link_type') == '2' ): ?><?=get_field('custom_link');?><?php endif; ?>" <?php if(get_field('link_type') == '2' ): ?><?php if(get_field('link_target') == '1' ): ?>target="_blank"<?php endif; ?><?php endif; ?>>
            <?php endif; ?>
      <div class="video_wp">
        <div class="videoWrapper" style="position: relative; z-index: 1;">
<div class="vidbg-container">
          <?php if (get_field('fallback_image') != ''): ?>
    <img class="hidden-xs fallback_desk" src="<?php the_field('fallback_image'); ?>" title="Your browser does not support the <video> tag">
        <?php endif; ?>
        <?php if (get_field('fallback_image_mobile') != ''): ?>
    <img class="visible-xs fallback_mobile" src="<?php the_field('fallback_image_mobile'); ?>" title="Your browser does not support the <video> tag">
        <?php endif; ?>
                <!-- playsinline is the attribute that allows the video to play on mobile devices (also, the video has to be muted). -->
      <video id="tagvideo" <?php if(get_field('vid_html_control') == 'true' ): ?> controls<?php endif; ?><?php if ($vid_control_group ['vid_autoplay'] == 'true'):  ?> mute="mute" muted autoplay="autoplay"<?php endif; ?><?php if ($vid_control_group ['vid_loop'] == 'true'):  ?> loop="loop"<?php endif; ?>  playsinline="playsinline" preload="auto" poster="<?php if (get_field('vid_poster') != ''): ?><?php echo the_field('vid_poster'); else: ?>https://tagdigitalmarketing.com/external_images/video-loading-1920x650.gif<?php endif ?>">
  <?php if (get_field('video_mp4') != ''): ?>
<source src="<?php the_field('video_mp4'); ?>" type="video/mp4"> 
    <?php endif; ?>
    <?php if (get_field('video_webm') != ''): ?>
    <source src="<?php the_field('video_webm'); ?>" type="video/webm">
        <?php endif; ?>
        <?php if (get_field('video_ogg') != ''): ?>
    <source src="<?php the_field('video_ogg'); ?>" type="video/ogg">
        <?php endif; ?>
         </video>
              <div class="vidbg-overlay"></div>
                   <?php if(get_field('color_overlay_choice') == 'Yes'): ?> 
             <div class="slider_overlay" <?php if (get_field('overlay_color')): ?>style="background: <?php the_field('overlay_color'); ?>;"<?php endif; ?>>
           </div>
             <?php endif; ?>
                    </div>
                </div>
             </div>
<?php if(get_field('link_type') != '0' ): ?> 
          </a>
          <?php endif; ?>
          
          <div class="vidbg-frontend-buttons bottom-left" >
            <?php if ($vid_control_group ['hide_play'] != 'true' ):  ?>
            <?php if ($vid_control_group ['vid_autoplay'] == 'true' ):  ?>
                 <a id="vidbutton" class="vidbg-frontend-button vidbg-toggle-pause">
                <i class="play_pause_btn fas fa-pause blob"></i>
              </a>
         <?php else: ?>
              <a id="vidbutton" class="vidbg-frontend-button vidbg-toggle-pause">
                <i data-click="0" class="play_pause_btn fas fa-play"></i>
               </a>
           <?php endif; ?>
           <script>
jQuery(document).ready(function($) {
var ppbutton = document.getElementById("vidbutton");
ppbutton.addEventListener("click", playPause);
myVideo = document.getElementById("tagvideo");
function playPause() { 
    if (myVideo.paused) {
        myVideo.play();
        ppbutton.innerHTML = "<i class='play_pause_btn fas fa-pause'></i>";
        }
    else  {
        myVideo.pause(); 
        ppbutton.innerHTML = "<i class='play_pause_btn fas fa-play'></i>";
        }
      } 
});
$(function(textfade){
    
    var video = $('#tagvideo')[0];
    
    video.addEventListener('playing', function(){
           $('.wordswrap').fadeOut(500);
    });
     video.addEventListener('pause', function(){
           $('.wordswrap').fadeIn(500);
           $('.play_pause_btn').removeClass('fa-pause');
           $('.play_pause_btn').addClass('fa-play');
           
    });
    
});
</script>
            <?php endif; ?>
            <?php if ($vid_control_group ['hide_mute'] != 'true' ):  ?>
           <?php if ($vid_control_group ['vid_autoplay'] == 'true' ):  ?>
                <a id="mute_button" class="vidbg-frontend-button vidbg-toggle-mute">
                    <i id="mute-video" class="fas fa-volume-mute"></i>
                </a>
                <?php else: ?>
                    <a id="mute_button"  class="vidbg-frontend-button vidbg-toggle-mute">
                    <i id="mute-video" class="fas fa-volume-up"></i>
                </a>
                <?php endif; ?>
<script>
jQuery(document).ready(function($) {
var mutebutton = document.getElementById("mute_button");
mutebutton.addEventListener("click", muteUnmute);
myVideo2 = document.getElementById("tagvideo");
function muteUnmute() { 
    if (myVideo2.muted === true) {
        myVideo2.muted = false;
        mutebutton.innerHTML = "<i class='play_pause_btn fas fa-volume-up'></i>";
        }
    else if (myVideo2.muted === false)   {
        myVideo2.muted = true; 
       mutebutton.innerHTML = "<i class='play_pause_btn fas fa-volume-mute'></i>";
        }
} 
});
</script>
                <?php endif; ?>
              </div>
     </div> <!-- video block -->
  <?php endif; ?> <!-- END video if not image -->

<div class="container_reset">
<div class="container">
     <?php if(get_field('link_type') != '0' ): ?> 
          <a href="<?php if(get_field('link_type') == '1' ): ?><?=get_field('internal_link');?><?php endif; ?><?php if(get_field('link_type') == '2' ): ?><?=get_field('custom_link');?><?php endif; ?>" <?php if(get_field('link_type') == '2' ): ?><?php if(get_field('link_target') == '1' ): ?>target="_blank"<?php endif; ?><?php endif; ?>>
            <?php endif; ?>
<?php if(get_field('show_headlines') == 'Show Content'): ?> 
          <div id="hero-page"  class="<?php if(get_field('form_choice') != '0' ): ?>col-sm-6 col-md-7 col-lg-8 col-xs-12 has_former <?php else: ?> col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-xs-12 no_former  <?php endif; ?>"  >
      <?php if ($vid_control_group ['vid_autoplay'] == 'true'):  ?>
              <!-- class will display when video is paused with autoplay selected
                prevents display when page loads   -->
            <div class="wordswrap" style="display: none;">
              <?php else: ?>
         <div class="wordswrap">
           <?php endif; ?>
              <div  class="slider_content  ">
                <div class="heroblock-text">
                  <div class="newclass">
                    <?php if (get_field('hero_title') != ''): ?>
                    <div class="hero-title titlemod"><?php the_field('hero_title'); ?></div>
                    <?php endif; ?>
                  </div>
                  <?php if (get_field('hero_subtitle') != ''): ?>
                  <div class="hero-subtitle submod"><?php the_field('hero_subtitle'); ?></div>
                  <?php endif; ?>
                   <?php if (get_field('hero_content') != ''): ?>
                      <div class="content_wrap <?php if( in_array( '1', get_field('text_background_box') ) ) : ?>content_box<?php endif; ?> " <?php if (get_field('box_color')): ?>style="background: <?php the_field('box_color'); ?>;"<?php endif; ?>>
                         <div class="hero-content mod "><?=get_field('hero_content');?></div>
                      </div>
                      <?php endif; ?>
                      <?php if (get_field('hero_content_below') != ''): ?>
                      <div class="hero-content mod "><?=get_field('hero_content_below');?></div>
                      <?php endif; ?>
                </div>
                </div>
               <?php if ($vid_control_group ['vid_autoplay'] == 'true'):  ?>
              <!-- closes class will display when video is paused 
                not needed just keeping divs neat   -->
                 </div>
              <?php else: ?>
                 </div>
           <?php endif; ?>
           </div>
          <?php endif; ?>
<?php if(get_field('show_headlines') == 'Show Headlines'): ?>
          <div class="wordswrap"  >
            <div class="slider_intro col-md-8 col-sm-7 col-xs-12">
                <div class="tag_slider_container">
                  <div class="slider_headings">
                    <?php if(get_field('hero_headline')): ?>
                    <div class="pl-title_wrap" >
                      <div class="pl-title"><?=get_field('hero_headline'); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if(get_field('hero_subheadline')): ?>
                    <div class="pl-subtitle_wrap" >
                      <div class="pl-subtitle "><?=get_field('hero_subheadline'); ?></div>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
         <?php endif; ?>

         <?php if(get_field('link_type') != '0' ): ?> 
          </a>
          <?php endif; ?>
<?php if(get_field('form_choice') != '0' ): ?>  
  <div class="form_sign_up_cat col-md-4 col-sm-5  col-xs-12 pull-right">
    <div class="form_sign_up ">
        <div class="newclasser">
          <div id="chicago_signform" class="tag_slider_form form_signup_inner">
            <div id="form-aside" class="tagsignup">
               <?php if(get_field('form_choice') == '2'): ?> 
                <?php $frmID = get_field('formidable_ids'); ?>
                <?php echo do_shortcode("[formidable id=$frmID]"); ?>
                <?php endif; ?>
                 <?php if(get_field('form_choice') == '1'): ?> 
                 <?php  echo do_shortcode( get_toption('frm_sign_up')); ?>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
 <?php endif; ?>
</div>
</div> <!-- END CONTAINER RESET -->
</div>  <!-- slider-titem  -->
</div>
</div>  <!-- slider_wp -->
</div>
</section>
<?php endif; ?>
<?php endif;  // END if hero_type != 'slider' ?> 
<?php endif; // END if hero_type == 'none' ?>
<?php endif; ?> <!-- end if hero_type == '' has no value - when page is new --> 
<?php } // end check if acf exists