<?php 
/*

@package flexproject

   ===============
   Lock Formidable Forms to user roles
   ===============
   
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//check if plugin class exists 
if(class_exists('ACF')){


/* Add new Permissions formidable*/
function overight_frm_form_nav_list( $nav_items, $nav_args ) {
    $user = wp_get_current_user();
  //  if (empty($user->roles)) { $nav_items; }

    $frm_lock = get_field('lock_form_id', 'option');
    $lock_form_roles = get_field('lock_form_roles', 'option');
    $role_exclude = explode(',', $lock_form_roles);
    $form_exclude = explode(',', $frm_lock);

    $all_roles = array_intersect($role_exclude ,(array) $user->roles);

    if ( !empty($all_roles) && in_array($nav_args['form_id'],$form_exclude)) {
        $news_navs = array();
//Prevents  Build and Settings in form - places user as NOT editor 
        foreach ($nav_items as  $nav_item) {
            if ($nav_item['permission'] != 'frm_edit_forms') {
                $news_navs[] =  $nav_item; 
            }
        }
        return $news_navs;
    }
    
    return $nav_items;
}
add_filter( 'frm_form_nav_list', 'overight_frm_form_nav_list',100,10 );


function custom_admin_header_script() {
    if (!empty($_GET['page']) && $_GET['page'] == 'formidable' ):
    $user = wp_get_current_user();
    if (empty($user->roles)) { return ;}

    $frm_lock = get_field('lock_form_id', 'option');
    $lock_form_roles = get_field('lock_form_roles', 'option');
    $role_exclude = explode(',', $lock_form_roles);
    $form_exclude = explode(',', $frm_lock);
    $jremove = array();
    $add_lock = array();
    $frm_actions = array('settings','edit');
    $all_roles = array_intersect($role_exclude ,(array) $user->roles);

    if (!empty($_GET['frm_action']) && !empty($_GET['id']) && in_array($_GET['frm_action'], $frm_actions) ) {
        if (!empty($all_roles) && in_array($_GET['id'], $form_exclude)) {
            wp_enqueue_style('admin_styles', get_stylesheet_directory_uri().'/assets/css/formidable_lock.css');
            echo " <style type=\"text/css\">#wpbody #wpbody-content *{display: none!important;}</style> 
            <script type=\"text/javascript\">jQuery(document).ready(function($) {
$('#wpbody #wpbody-content').html('<svg style=\"display:inline!important;margin:25px 10px 0 25px;\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 599.68 601.37\" width=\"35\" height=\"35\"><path style=\"display:block!important;\" fill=\"#f05a24\" d=\"M289.6 384h140v76h-140z\"></path><path style=\"display:block!important;\" fill=\"#4d4d4d\" d=\"M400.2 147h-200c-17 0-30.6 12.2-30.6 29.3V218h260v-71zM397.9 264H169.6v196h75V340H398a32.2 32.2 0 0 0 30.1-21.4 24.3 24.3 0 0 0 1.7-8.7V264zM299.8 601.4A300.3 300.3 0 0 1 0 300.7a299.8 299.8 0 1 1 511.9 212.6 297.4 297.4 0 0 1-212 88zm0-563A262 262 0 0 0 38.3 300.7a261.6 261.6 0 1 0 446.5-185.5 259.5 259.5 0 0 0-185-76.8z\"></path></svg><h1  style=\"display:inline!important;\"class=\'wp-heading-inline\'>tagFORMS™</h1><div style=\"margin:35px;border:1px solid #ccc;background:#fff;padding: 25px;display: block!important\"><div style=\"display: block!important;margin-bottom:10px;\">This lead capture form is currently locked to prevent any further editing.</div><div style=\"display: block!important;margin-bottom:20px;\">Please contact your tag digital marketing specialist at (407) 398-6629 if access is needed.</div><div style=\"display: block!important;margin-bottom:5px;\">cheers,</div><div style=\"display: block!important;margin-botton:10px;\">the tag development team</div></div>');
                 $('body').addClass('formidable_locked add_css');
            });</script>";
        }
    }else{
        if ( !empty($all_roles)){
            foreach ($form_exclude as $id) {
        // REMOVES - EDIT - DUPLICATE - TRASH FROM HOVER ON FORMS LIST
    $jremove[] = '#the-list #item-action-'.$id.' .row-actions span:not(.view)';
    $add_lock[] = '#the-list #item-action-'.$id.' td.post-title a.row-title';
       
            }
           
            echo "<script type=\"text/javascript\">jQuery(document).ready(function($) {
                $('".implode(',', $jremove)."').remove();
                $('".implode(',', $add_lock)."').addClass('add_locker');
             
               
                 
            });</script>
            
             
          <style>
           
          #toplevel_page_formidable .wp-submenu li:nth-child(n+4):nth-child(-n+6),#toplevel_page_formidable .wp-submenu li:nth-child(n+7) {display:none;}
.formidable_locked .frm_form_nav li:nth-child(4) {display:none;} 

.frm-admin-page-import.formidable_locked .frm-h2:first-of-type,.frm-admin-page-import.formidable_locked .howto:first-of-type {display:none;}
.add_locker:before {font-size: 16px;color: #0073aa;font-family: dashicons;content:'\\f160';margin:0 5px 0px -20px;}
</style>"; 

        }
        
    }
    endif;
}
add_action( 'admin_head', 'custom_admin_header_script' );



// add  CSS to forms that are locked for all users - so admins can see which forms have a locked status in formidable
function custom_admin_header_script_admin_see() {
    if (!empty($_GET['page']) && $_GET['page'] == 'formidable' ):
    $user = wp_get_current_user();
    if (empty($user->roles)) { return ;}
     $frm_lock = get_field('lock_form_id', 'option');
     $lock_form_roles = get_field('lock_form_roles', 'option');
    $form_exclude = explode(',', $frm_lock);
    $frm_actions = array('list');
  foreach ($form_exclude as $id) {
    $add_lock[] = '#the-list #item-action-'.$id.' td.post-title a.row-title';
            echo "
            <script type=\"text/javascript\">jQuery(document).ready(function($) {
                  $('".implode(',', $add_lock)."').addClass('add_locker');
              });
            </script>
          <style>
       .add_locker:before {font-size: 16px;color: #31bc7d;font-family: dashicons;content:'\\f528';margin:0 5px 0px -20px;}
        .frm-white-body table.widefat strong a.add_locker{ color: #0db669;}
          </style>
            <script type=\"text/javascript\">jQuery(document).ready(function($) {
                  $('body').addClass('formidable_locked script_admin_see');
               });
            </script>";
        }
  endif;
}
add_action( 'admin_head', 'custom_admin_header_script_admin_see' );


// add Locked CSS to any page here - used for admin menu hide
function custom_admin_header_script_alt() {
    if (!empty($_GET['page']) && $_GET['page'] == 'formidable-import' || 'formidable' ):
    $user = wp_get_current_user();
    if (empty($user->roles)) { return ;}

     $frm_lock = get_field('lock_form_id', 'option');
    $lock_form_roles = get_field('lock_form_roles', 'option');
    $role_exclude = explode(',', $lock_form_roles);
    $form_exclude = explode(',', $frm_lock);
    $frm_actions = array('list');
    $all_roles = array_intersect($role_exclude ,(array) $user->roles);

        if (!empty($all_roles) ) {
             echo "
    <style>
       #wpbody, body.formidable_page_formidable-pro-upgrade, body.post-type-frm_display.edit-php, body.frm-white-body {background:#f1f1f1;} 
         #toplevel_page_formidable .wp-submenu li:nth-child(n+4):nth-child(-n+6),#toplevel_page_formidable .wp-submenu li:nth-child(n+7), .formidable_locked .frm_form_nav li:nth-child(4), #form_entries_page .frm_form_nav li:nth-child(2),.frm-admin-page-entries .frm_form_nav li:nth-child(2)  {display:none;}
          .frm-admin-page-import.formidable_locked .frm-h2:first-of-type, .frm-admin-page-import.formidable_locked .howto:first-of-type, .frm-admin-page-entries .frm-right-panel .frm_with_icons:nth-child(1)  {display:none;}
          .add_locker:before {font-size: 16px;color: #0073aa;font-family: dashicons;content:'\\f160';margin:0 5px 0px -20px;}
         .frm-white-body table.widefat strong a.add_locker{ color: #0073aa;}
   </style>
        <script type=\"text/javascript\">jQuery(document).ready(function($) {
                  $('body').addClass('formidable_locked script_alt');
               });
        </script>";
        }
    endif;
}
add_action( 'admin_head', 'custom_admin_header_script_alt' );

} //end if plugin class exists 


