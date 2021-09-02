<div class="social_listX">
     <?php if (get_field('facebook', 'options') !='') : ?>
      <div class="facebook">
        <a target="_blank" title="Facebook" href="<?php the_field('facebook', 'options'); ?>">
          <i class="fab fa-facebook-f"></i> </a>
      </div>
      <?php endif; ?>
      <?php if (get_field('twitter', 'options') !='') : ?>
      <div class="twitter">
          <a target="_blank" title="Twitter" href="<?php the_field('twitter', 'options'); ?>">
            <i class="fab fa-twitter"></i></a>
      </div>
      <?php endif; ?>
       <?php if (get_field('linkedin', 'options') !='') : ?>
       <div class="linkedin">
          <a target="_blank" title="Linkedin" href="<?php the_field('linkedin', 'options'); ?>">
             <i class="fab fa-linkedin-in"></i></a>
      </div>
      <?php endif; ?>
      <?php if (get_field('instagram', 'options') !='') : ?>
      <div target="_blank" class="instagram">
           <a title="Instagram" href="<?php the_field('instagram', 'options'); ?>">
            <i class="fab fa-instagram"></i></a>
        </div>
        <?php endif; ?>
         <?php if (get_field('snapchat', 'options') !='') : ?>
        <div class="snapchat">
              <a target="_blank" title="Snapchat" href="<?php the_field('snapchat', 'options'); ?>">
                  <i class="fab fa-snapchat-ghost"></i></a>
        </div>
        <?php endif; ?>
        <?php if (get_field('youtube', 'options') !='') : ?>
         <div class="youtube">
              <a target="_blank" title="Youtube" href="<?php the_field('youtube', 'options'); ?>">
                     <i class="fab fa-youtube"></i></a>
         </div>
         <?php endif; ?>
       <?php if (get_field('pinterest', 'options') !='') : ?>
       <div class="pinterest">
           <a target="_blank" title="Pinterest" href="<?php the_field('pinterest', 'options'); ?>">
               <i class="fab fa-pinterest"></i></a>
        </div>
      <?php endif; ?>
       <?php if (get_field('tiktok', 'options') !='') : ?>
       <div class="tiktok">
           <a target="_blank" title="TikTok" href="<?php the_field('tiktok', 'options'); ?>">
               <i class="fab fa-tiktok"></i></a>
        </div>
      <?php endif; ?>
       <?php if (get_field('tumblr', 'options') !='') : ?>
       <div class="tumblr">
           <a target="_blank" title="Tumblr" href="<?php the_field('tumblr', 'options'); ?>">
               <i class="fab fa-tumblr"></i></a>
        </div>
      <?php endif; ?>
      <?php if (get_field('flickr', 'options') !='') : ?>
       <div class="flickr">
           <a target="_blank" title="Flickr" href="<?php the_field('flickr', 'options'); ?>">
               <i class="fab fa-flickr"></i></a>
        </div>
      <?php endif; ?>
      <?php if (get_field('viber', 'options') !='') : ?>
       <div class="viber">
           <a target="_blank" title="Viber" href="<?php the_field('viber', 'options'); ?>">
               <i class="fab fa-viber"></i></a>
        </div>
      <?php endif; ?>
      <?php if (get_field('reddit', 'options') !='') : ?>
       <div class="reddit">
           <a target="_blank" title="Reddit" href="<?php the_field('reddit', 'options'); ?>">
               <i class="fab fa-reddit"></i></a>
        </div>
      <?php endif; ?>
      <?php if (get_field('social_extra_link', 'options') !='') : ?>
       <div class="social_extra_link">
           <a target="_blank" title="Codepen" href="<?php the_field('social_extra_link', 'options'); ?>">
              <i class="fab fa-codepen"></i></a>
        </div>
      <?php endif; ?>
       <?php if (get_field('social_extra_link_2', 'options') !='') : ?>
       <div class="social_extra_link_2">
           <a target="_blank" title="Codepen" href="<?php the_field('social_extra_link_2', 'options'); ?>">
              <i class="fab fa-codepen"></i></a>
        </div>
      <?php endif; ?>
      <?php if (get_field('social_extra_link_3', 'options') !='') : ?>
       <div class="social_extra_link_3">
           <a target="_blank" title="Codepen" href="<?php the_field('social_extra_link_3', 'options'); ?>">
              <i class="fab fa-codepen"></i></a>
        </div>
      <?php endif; ?>
   </div>