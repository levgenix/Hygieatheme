<?php
/**
 * ITStudio Hygiea Theme functions and definitions
 *
 * @package hygiea
 */

// TODO: is_admin()

require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/hygiea-css.php';


//add_image_size( 'object-preview', 371, 241, true );
//add_image_size( 'direction-preview', 170, 170, true );
//add_image_size( 'sidebar-preview', 350, 200, true );