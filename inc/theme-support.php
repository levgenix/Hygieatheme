<?php

/**
 * @package hygiea
 *   =========================
 *       Theme Support Options
 *   =========================
 */

// Регистрирация поддержки разрешенных форматов записей (в опциях темы)
$options = get_option( 'post_formats' );
if ( !empty($options) ) {
    $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $enabledFormats = array();
    foreach ($formats as $format) {
        $enabledFormats[] = isset( $options[$format] ) ? $format : null;
    }
    add_theme_support( 'post-formats', $enabledFormats );
}

if ( get_option( 'custom_header' ) == 1 ) {
    add_theme_support( 'custom-header' );
}

if ( get_option( 'custom_background' ) == 1 ) {
    add_theme_support( 'custom-background' );
}

add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'custom-logo' );
