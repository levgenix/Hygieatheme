<?php
/**
 * @package hygiea
 *   =========================
 *       Theme Custom Post Types
 *   =========================
 */

/*
TODO: Как то подменять в админке
Additional CSS from customize
echo '<style>'. wp_get_custom_css() .'</style>';
Выводит сам wp
<style type="text/css" id="wp-custom-css">
*/


// Generate inline scripts and styles and attach them to the appropriate script handles.
function hygiea_style_header() {
	if ( $image = get_header_image() ) {
		wp_add_inline_style( 'hygiea-style', ".header-content { background-image: url({$image}); background-position: center center; background-size: cover; background-repeat: no-repeat; }");
	}

	// wp_add_inline_style( 'hygiea-style', wp_get_custom_css()); // Добавляет
}
add_action( 'wp_enqueue_scripts', 'hygiea_style_header' );