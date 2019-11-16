<?php

/**
 * @package hygiea
 *   =========================
 *       Admin Page
 *   =========================
 */

function hygiea_add_admin_page() {
	add_menu_page( 'Hygiea Theme Options', 'Hygiea', 'manage_options', 'hygiea_theme', 'hygiea_theme_create_page', 'dashicons-hammer', 110 );

	add_submenu_page( 'hygiea_theme', 'Hygiea Sidebar Settings', 'Sidebar', 'manage_options', 'hygiea_theme', 'hygiea_theme_create_page' );
	add_submenu_page( 'hygiea_theme', 'Hygiea Theme Options', 'Theme Options', 'manage_options', 'hygiea_theme_options', 'hygiea_theme_support_page' );
	add_submenu_page( 'hygiea_theme', 'Hygiea Contact Form', 'Contact Form', 'manage_options', 'hygiea_theme_contact', 'hygiea_contact_form_page' );
	add_submenu_page( 'hygiea_theme', 'Hygiea CSS Options', 'Custom CSS', 'manage_options', 'hygiea_theme_css', 'hygiea_theme_custom_css_page' );

	add_action( 'admin_init', 'hygiea_custom_settings' );
}

add_action( 'admin_menu', 'hygiea_add_admin_page' );

// Template submenu functions
function hygiea_theme_create_page() {
	require_once get_template_directory() . '/inc/templates/hygiea-admin.php';
}
function hygiea_theme_support_page() {
	require_once get_template_directory() . '/inc/templates/hygiea-theme-support.php';
}
function hygiea_contact_form_page() {
	require_once get_template_directory() . '/inc/templates/hygiea-contact-form.php';
}
function hygiea_theme_custom_css_page() {
	require_once get_template_directory() . '/inc/templates/hygiea-custom-css.php';
}

function hygiea_custom_settings() {
	// Sidebar Options
	register_setting( 'hygiea-settings-group', 'profile_picture' );
	register_setting( 'hygiea-settings-group', 'first_name' );
	register_setting( 'hygiea-settings-group', 'last_name' );
	register_setting( 'hygiea-settings-group', 'user_description' );
	register_setting( 'hygiea-settings-group', 'twitter_handler', 'hygiea_sanitize_twitter_handler' );
	register_setting( 'hygiea-settings-group', 'facebook_handler' );
	register_setting( 'hygiea-settings-group', 'gplus_handler' );
	
	add_settings_section( 'hygiea-sidebar-options', 'Sidebar Options', 'hygiea_sidebar_options', 'hygiea_theme' );
	
	add_settings_field( 'sidebar-profile-picture', 'Profile picture', 'hygiea_sidebar_profile', 'hygiea_theme', 'hygiea-sidebar-options' );
	add_settings_field( 'sidebar-name', 'Full Name', 'hygiea_sidebar_name', 'hygiea_theme', 'hygiea-sidebar-options' );
	add_settings_field( 'sidebar-user-description', 'Description', 'hygiea_sidebar_user_description', 'hygiea_theme', 'hygiea-sidebar-options' );
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'hygiea_sidebar_twitter', 'hygiea_theme', 'hygiea-sidebar-options' );
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'hygiea_sidebar_facebook', 'hygiea_theme', 'hygiea-sidebar-options' );
	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'hygiea_sidebar_gplus', 'hygiea_theme', 'hygiea-sidebar-options' );

	// Support Options
	register_setting( 'hygiea-theme-support', 'post_formats' );
	register_setting( 'hygiea-theme-support', 'custom_header' );
	register_setting( 'hygiea-theme-support', 'custom_background' );

	add_settings_section( 'hygiea-theme-options', 'Theme Options', 'hygiea_theme_options', 'hygiea_theme_options' );

	add_settings_field( 'post-formats', 'Post Formats', 'hygiea_post_formats', 'hygiea_theme_options', 'hygiea-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'hygiea_custom_header', 'hygiea_theme_options', 'hygiea-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'hygiea_custom_background', 'hygiea_theme_options', 'hygiea-theme-options' );

	// Contact Form Options
	register_setting( 'hygiea-contact-options', 'activate_contact' );

	add_settings_section( 'hygiea-contact-section', 'Contact Form', 'hygiea_theme_contact', 'hygiea_theme_contact' );

	add_settings_field( 'activate-form', 'Activate Contact Form', 'hygiea_activate_contact', 'hygiea_theme_contact', 'hygiea-contact-section' );

	// Custom CSS Options
	register_setting( 'hygiea-custom-css-options', 'hygiea_css', 'hygia_sanitize_custom_css' );
	
	add_settings_section( 'hygiea-custom-css-section', 'Custom CSS', 'hygiea_custom_css_section_callback', 'hygiea_theme_css' );

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'hygiea_custom_css_callback', 'hygiea_theme_css', 'hygiea-custom-css-section' );
}

function hygiea_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function hygiea_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if ( empty($picture) ) {
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"/><input type="hidden" id="profile-picture" name="profile_picture" value=""/>';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"/><input type="hidden" id="profile-picture" name="profile_picture" value="' . $picture .'"/> <input type="button" class="button button-secondary" value="Remove" id="remove-picture"/>';
	}
	
}

function hygiea_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="' . $firstName .'" placeholder="Enter First Name"/> <input type="text" name="last_name" value="' . $lastName .'" placeholder="Enter Last Name"/>';
}

function hygiea_sidebar_user_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="' . $description .'" placeholder="Input User Description"/><p class="description">Write something smart</p>';
}

function hygiea_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="' . $twitter .'" placeholder="Enter Twitter handler"/><p class="description">Input your Twitter username without @ character</p>';
}
function hygiea_sanitize_twitter_handler( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function hygiea_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="' . $facebook .'" placeholder="Enter Facebook handler"/>';
}

function hygiea_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="' . $gplus .'" placeholder="Enter Google+ handler"/>';
}

function hygiea_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function hygiea_theme_contact() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}

function hygiea_custom_css_section_callback() {
	echo 'Customize Hygiea Theme with your own CSS';
}

function hygiea_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach( $formats as $format ) {
		$checked = isset( $options[$format] ) ? ' checked' : null;
		$output .= '<label><input type="checkbox"' . $checked . ' id="' . $format . '" name="post_formats[' . $format . ']" value="1" />' . $format . '</label><br />';
	}
	echo $output;
}

function hygiea_custom_header() {
	$option = get_option( 'custom_header' );
	$checked = ( $option == 1 ) ? ' checked' : null;
	echo '<label><input type="checkbox"' . $checked . ' id="custom_header" name="custom_header" value="1" /> Activate the Custom Header</label>';
}

function hygiea_custom_background() {
	$option = get_option( 'custom_background' );
	$checked = ( $option == 1 ) ? ' checked' : null;
	echo '<label><input type="checkbox"' . $checked . ' id="custom_background" name="custom_background" value="1" /> Activate the Custom Background</label>';
}

function hygiea_activate_contact() {
	$option = get_option( 'activate_contact' );
	$checked = ( $option == 1 ) ? ' checked' : null;
	echo '<label><input type="checkbox"' . $checked . ' id="activate_contact" name="activate_contact" value="1" /></label>';
}

function hygiea_custom_css_callback() {
	$css = get_option( 'hygiea_css' );
	$css = empty( $css ) ? '/** Hyhiea Theme Custom CSS */' : $css;
	echo '<div id="customCss">' . $css . '</div><textarea id="hygiea_css" name="hygiea_css">' . $css . '</textarea>';
}

function hygia_sanitize_custom_css( $input ) {
	$output = esc_textarea( $input );
	return $output;
}