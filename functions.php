<?php
/**
 * ITStudio Hygiea Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hygieatheme
 */

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';

add_action( 'wp_enqueue_scripts', 'hygiea_scripts' );
function hygiea_scripts() {
	wp_enqueue_style( 'normalize-style', get_template_directory_uri() . '/assets/libs/normalize.css', array(), '8.0.1' ); // TODO make min
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	// TODO
	//wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/styles.min.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '', true );
}