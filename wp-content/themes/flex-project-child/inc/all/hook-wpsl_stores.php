<?php 


//ENQUEUE GET STYLE 

function theme_flexproject_store_locator_enqueue_styles() {
    wp_enqueue_style( 'store-style', get_stylesheet_directory_uri() . '/assets/css/store-locator.css' );
 

}
add_action( 'wp_enqueue_scripts', 'theme_flexproject_store_locator_enqueue_styles');

add_filter( 'wpsl_templates', 'custom_templates' );
function custom_templates( $templates ) {
    $templates[] = array (
        'id'   => 'ggmultisite',
        'name' => 'GG Multi Site',
       'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/store-ggmultisite.php',
    );
    return $templates;
}



/* Add custom meta field */
add_filter( 'wpsl_meta_box_fields', 'dns_meta_box_fields',10,3 );
function dns_meta_box_fields( $meta_fields ) {
    $meta_fields['Additional Information']['class_url'] = array(
            'label' => __( 'Class Schedule', 'wpsl' )
        );

    return $meta_fields;
}

/* Add render field */
add_filter( 'wpsl_frontend_meta_fields', 'dns_frontend_meta_fields',20,3 );
function dns_frontend_meta_fields( $store_fields ) {
    $store_fields['wpsl_class_url'] = array( 
        'name' => 'class_url',
        'type' => 'url'
    );
    return $store_fields;
}
/* Custom Size */
//add_filter( 'wpsl_thumb_size', 'dns_custom_thumb_size' );
function dns_custom_thumb_size() {
    $size = array(260,300 );
    return $size;
}



/* Render */
//add_filter( 'wpsl_listing_template', 'dns_listing_template' );
function dns_listing_template() {
    global $wpsl_settings, $wpsl;
    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-store-location lct-item">' . "\r\n";
        
        $listing_template .= '<div class="row dflex">
                <div class="col-xs-12 col-xs-full col-sm-3 col-lg-3">
                    <%= thumb %>
                </div>
                <div class="col-xs-12 col-xs-full col-sm-9 col-lg-9">
                    <h4 class="lct-title"><%= store %></h4>
                    <div class="lct-info">
                        <div class="row dflex">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="wpsl-store-hours">
                                    <%= hours %>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-5">
                                <div class="lct-phadd">
                                    <div class="lct-phone">
                                        <strong>Phone</strong> <%= formatPhoneNumber(phone) %>
                                    </div>
                                    <div class="lct-address">
     <strong>Address</strong>'./* /get_toption('site_title').*/'<br> <%= store %> <br>
                                            <%= address %>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="gbtn">
                                    <a target="_blank" href="<%= class_url %>" class="lbtn">Class schedule</a>
                                    <a target="_blank" href="<%= url %>" class="lbtn">VISIT SITE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        $listing_template .= "\t\t" . '</div>' . "\r\n";
        $listing_template .= "\t" . '</li>';

    return $listing_template;
}
