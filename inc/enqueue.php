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
		wp_register_style( 'hygiea-admin', get_template_directory_uri() . '/assets/css/hygiea.admin.css', false, '1.0.0', 'all' );
		wp_enqueue_style( 'hygiea-admin' );

		wp_enqueue_media();

		wp_register_script( 'hygiea-admin', get_template_directory_uri() . '/assets/js/hygiea.admin.js', array('jquery'), '1.0.2', true );
		wp_enqueue_script( 'hygiea-admin' );
	}
	
	if ( 'hygiea_page_hygiea_theme_css' == $hook) {
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/assets/css/hygiea.ace.css' );
		wp_enqueue_script( 'ace', '//cdnjs.cloudflare.com/ajax/libs/ace/1.4.6/ace.js', array('jquery'), null, true );
		wp_enqueue_script( 'hygiea-custom', get_template_directory_uri() . '/assets/js/hygiea.custom_css.js', array('ace'), '1.0.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'hygiea_load_admin_scripts' );


/**
 *   =========================
 *       Front-End Enqueue functions
 *   =========================
 */

function hygiea_load_scripts() {
	//wp_deregister_script('jquery-core');
	//wp_deregister_script('jquery');
	//wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true );
	//wp_register_script( 'jquery', false, array('jquery-core'), null, true );

	//wp_enqueue_style( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false, null, 'all' );
	//wp_enqueue_script( 'bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), null, true );
	
	wp_enqueue_style( 'normalize', '//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', false, null, 'all' ); // TODO: make min
	
	wp_enqueue_style( 'hygiea-style', get_template_directory_uri() . '/assets/css/hygiea.css', false, '1.0.0', 'all' ); // TODO: min

	wp_enqueue_script( 'hygiea-script', get_template_directory_uri() . '/assets/js/_custom.js', array('jquery'), null, true ); // TODO: min
}
add_action( 'wp_enqueue_scripts', 'hygiea_load_scripts' );
