<div class="footer_vcard">
  <div class="d-none">
    <span class="vcard">
    <?php if (get_field('schema_logo', 'options') !='') : ?>
    <img alt="<?php the_field('company_name', 'options'); ?>  Logo" style="display:none" class="photo" src="<?php the_field('schema_logo', 'options'); ?> " />
    <?php endif; ?>
    <span class="fn org">
    <?php if (get_field('company_name', 'options') !='') : ?>
    <?php the_field('company_name', 'options'); ?> 
    <?php endif; ?>
    </span>
    <br>
    <span class="adr">
    <span class="street-address">
    <?php if (get_field('street', 'options') !='') : ?>
    <?php the_field('street', 'options'); ?> 
    <?php endif; ?></span>,<br>
    <span class="locality">
    <?php if (get_field('city', 'options') !='') : ?>
    <?php the_field('city', 'options'); ?> 
    <?php endif; ?></span>, <span class="region"> <?php if (get_field('state', 'options') !='') : ?>
    <?php the_field('state', 'options'); ?> 
    <?php endif; ?></span>
    <span class="postal-code"> <?php if (get_field('zip', 'options') !='') : ?>
    <?php the_field('zip', 'options'); ?> 
    <?php endif; ?></span>
    </span>
    <br>
    <?php if (get_field('phone', 'options') !='') : ?>   
    <span class="tel">
    <?php if (get_field('phone_description', 'options') !='') : ?>
    <?php the_field('phone_description', 'options'); ?> 
    <?php endif; ?>
    <a href="tel:<?php the_field('phone', 'options'); ?>">
    <?php the_field('phone', 'options'); ?> </a>
    <?php endif; ?>
    </span><br>
    <?php if (get_field('phone_2', 'options') !='') : ?>  
    <br>
    <span class="tel">
    <span class="type" style="display:none">
    <?php the_field('phone_description_2', 'options'); ?>
    </span><br>
    <a href="tel:<?php the_field('phone_2', 'options'); ?>">
    <?php the_field('phone_2', 'options'); ?> </a>
    </span>
    <?php endif; ?>
    <?php if (get_field('price_range', 'options') !='') : ?> <span style="display:none" class="priceRange"><?php the_field('price_range', 'options'); ?> 
    </span>
    <?php endif; ?>
    </span>
  </div>
</div>