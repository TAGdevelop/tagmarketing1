<?php 
/*

@package flexproject

   ===============
   SHOW ACTIVE PLUGINS IN  ADMIN DASHBOARD
   ===============
  
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// START Dashboard Module Active plugins list
//Multisite Dashboard Widget

add_action('wp_network_dashboard_setup', 'wpse_54742_network_dashboard_setup');

function wpse_54742_network_dashboard_setup() {
    wp_add_dashboard_widget( 'wpse_54742_active_network_plugins', __( 'tagPlugin Overview' ), 'wpse_54742_active_network_plugins' );
}

function wpse_54742_active_network_plugins() {

//Network Activated Plugins
 
    $the_plugs = get_site_option('active_sitewide_plugins'); 
    echo '<h3 style="background: #555;padding: 6px 20px;color: #fff;"><b>NETWORK ACTIVATED</b></h3><ul>';
    foreach($the_plugs as $key => $value) {
        $string = explode('/',$key); // Folder name will be displayed
        echo '<li>'.$string[0] .'</li>';
    }
    echo '</ul>';
// Iterate Through All Sites
    global $wpdb;
 // Causes error
 // $blogs = $wpdb->get_results($wpdb->prepare("
     $blogs = $wpdb->get_results("
        SELECT blog_id
        FROM {$wpdb->blogs}
        WHERE site_id = '{$wpdb->siteid}'
        AND spam = '0'
        AND deleted = '0'
        AND archived = '0'
    ");

    echo '<h3 style="background: #555;padding: 6px 20px;color: #fff;"><b>INDEPENDENTLY ACTIVATED</b></h3>';

    foreach ($blogs as $blog) {
        $the_plugs = get_blog_option($blog->blog_id, 'active_plugins'); 
        echo '<hr /><h4 style="background: #ddd;padding: 6px 20px;"><strong>SITE</strong>: '. get_blog_option($blog->blog_id, 'blogname') .'</h4>';
        echo '<ul>';
        foreach($the_plugs as $key => $value) {
            $string = explode('/',$value); // Folder name will be displayed
            echo '<li>'.$string[0] .'</li>';
        }
        echo '</ul>';
    }
}
// END  Dashboard Active plugins list