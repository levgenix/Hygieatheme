<?php
/**
 * ITStudio Hygiea Theme functions and definitions
 *
 * @package hygiea
 */

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/custom-post-type.php';

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'wp_head', 'wp_resource_hints', 2 );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

//add_image_size( 'object-preview', 371, 241, true );
//add_image_size( 'direction-preview', 170, 170, true );
//add_image_size( 'sidebar-preview', 350, 200, true );