<?php

/**
 * @package hygiea
 *   =========================
 *       Admin Enqueue functions
 *   =========================
 */

function hygiea_load_admin_scripts( $hook ) {
	echo $hook;
	// toplevel_page_hygiea_theme hygiea_page_hygiea_theme_css

	if ( !in_array( $hook, array( 'toplevel_page_hygiea_theme', 'hygiea_page_hygiea_theme_css' )) ) {
		return;
	}

	wp_register_style( 'hygiea_admin', get_template_directory_uri() . '/assets/css/hyiea.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hygiea_admin' );
}
add_action( 'admin_enqueue_scripts', 'hygiea_load_admin_scripts' );