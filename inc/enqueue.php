<?php

/**
 * @package hygiea
 *   =========================
 *       Admin Enqueue functions
 *   =========================
 */

function hygiea_load_admin_scripts( $hook ) {
	//echo "============================= ".$hook;
	if ( in_array( $hook, array( 'toplevel_page_hygiea_theme', 'hygiea_page_hygiea_theme_options', 'hygiea_page_hygiea_theme_contact', 'hygiea_page_hygiea_theme_css' )) ) {
		wp_register_style( 'hygiea-admin', get_template_directory_uri() . '/assets/css/hygiea.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'hygiea-admin' );

		wp_enqueue_media();

		wp_register_script( 'hygiea-admin-script', get_template_directory_uri() . '/assets/js/hygiea.admin.js', array('jquery'), '1.0.2', true );
		wp_enqueue_script( 'hygiea-admin-script' );
	}
	
	if ( 'hygiea_page_hygiea_theme_css' == $hook) {
		wp_enqueue_style( 'hygiea-ace', get_template_directory_uri() . '/assets/css/hygiea.ace.css' );
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/assets/libs/ace/ace.js', array('jquery'), '1.4.7', true );
		wp_enqueue_script( 'hygiea-custom-css-script', get_template_directory_uri() . '/assets/js/hygiea.custom_css.js', array('ace'), '1.0.0', true );
	}
	
}
add_action( 'admin_enqueue_scripts', 'hygiea_load_admin_scripts' );