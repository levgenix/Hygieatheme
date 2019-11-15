<?php

/**
 * @package hygiea
 *   =========================
 *       Admin Page
 *   =========================
 */

function hygiea_add_admin_page() {
	add_menu_page( 'Hygiea Theme Options', 'Hygiea', 'manage_options', 'hygiea_theme', 'hygiea_theme_create_page', 'dashicons-hammer', 110 );

	add_submenu_page( 'hygiea_theme', 'Hygiea Theme Settings', 'General', 'manage_options', 'hygiea_theme', 'hygiea_theme_create_page' );
	add_submenu_page( 'hygiea_theme', 'Hygiea CSS Options', 'Custom CSS', 'manage_options', 'hygiea_theme_css', 'hygiea_theme_settings_page' );

	add_action( 'admin_init', 'hygiea_custom_settings' );
}

add_action( 'admin_menu', 'hygiea_add_admin_page' );

function hygiea_theme_create_page() {
	require_once get_template_directory() . '/inc/templates/hygiea-admin.php';
}

function hygiea_theme_settings_page() {
	echo "<h1>Hygiea Custom CSS</h1>";
}

function hygiea_custom_settings() {
	register_setting( 'hygiea-settings-group', 'first_name' );
	add_settings_section( 'hygiea-sidebar-options', 'Sidebar Options', 'hygiea_sidebar_options', 'hygiea_theme' );
	add_settings_field( 'sidebar-name', 'First Name', 'hygiea_sidebar_name', 'hygiea_theme', 'hygiea-sidebar-options' );
}

function hygiea_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function hygiea_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="' . $firstName .'" placeholder="Enter First Name"/>';
}