<?php

/**
 * @package hygiea
 *   =========================
 *       Admin Enqueue functions
 *   =========================
 */

function hygiea_load_admin_scripts( $hook ) {
	// $hook = toplevel_page_hygiea_theme hygiea_page_hygiea_theme_css

	if ( !in_array( $hook, array( 'toplevel_page_hygiea_theme', 'hygiea_page_hygiea_theme_css' )) ) {
		return;
	}

	wp_register_style( 'hygiea-admin', get_template_directory_uri() . '/assets/css/hyiea.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hygiea-admin' );

	wp_enqueue_media();

	wp_register_script( 'hygiea-admin-script', get_template_directory_uri() . '/assets/js/hygiea.admin.js', array('jquery'), '1.0.2', true );
	wp_enqueue_script( 'hygiea-admin-script' );
}
add_action( 'admin_enqueue_scripts', 'hygiea_load_admin_scripts' );