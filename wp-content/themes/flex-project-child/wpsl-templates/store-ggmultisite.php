<?php 



global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';

$output .= '<div id="wpsl-wrap" class="ggmultisite-store">' . "\r\n";  
$output .= "\t" . '<div class="row no-margin flex_revert">' . "\r\n";

    $output .= "\t" . '<div class="col-xs-12 col-md-4 col-lg-3 no-padding">' . "\r\n";
        $output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
        $output .= "\t\t" . '<div id="wpsl-stores" '. $autoload_class .'>' . "\r\n";
        $output .= "\t\t\t" . '<ul id="locs"></ul>' . "\r\n";
        $output .= "\t\t" . '</div>' . "\r\n";
        $output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
        $output .= "\t\t\t" . '<ul></ul>' . "\r\n";
        $output .= "\t\t" . '</div>' . "\r\n";
        $output .= "\t" . '</div>' . "\r\n";
    $output .= "\t" . '</div>' . "\r\n";

    $output .= "\t" . '<div class="col-xs-12 col-md-8 col-lg-9 no-padding">' . "\r\n";
        if ( $wpsl_settings['reset_map'] ) { 
            $output .= "\t" . '<div class="wpsl-gmap-wrap">' . "\r\n";
            $output .= "\t\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas"></div>' . "\r\n";
            $output .= "\t" . '</div>' . "\r\n";
        } else {
            $output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas taggit"></div>' . "\r\n";
        }
    $output .= "\t" . '</div>' . "\r\n";

$output .= "\t" . '</div>' . "\r\n";
$output .= '</div>' . "\r\n";

return $output;