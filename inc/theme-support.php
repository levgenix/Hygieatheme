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