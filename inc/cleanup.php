<?php

/**
 * @package hygiea
 *   =========================
 *       Remove generators
 *   =========================
 */

function hygiea_remove_wp_version_strings( $src ) {
    global $wp_version;
    parse_str( parse_url($src, PHP_URL_QUERY), $query );
    if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'hygiea_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'hygiea_remove_wp_version_strings' );

/* TODO: использовать ли remove_action( 'wp_head', 'wp_generator' ); ?
function hygiea_remove_wp_meta_version() {
    return null;
}
add_filter( 'the_generator', 'hygiea_remove_wp_meta_version' );
*/

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'wp_head', 'wp_resource_hints', 2 );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
