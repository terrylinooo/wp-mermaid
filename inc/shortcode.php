<?php
/**
 * WP Mermaid - Shortcode
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'init', 'wp_mermaid_shortcode_init' );

/**
 * Initial `mermaid` short code.
 *
 * @return void
 */
function wp_mermaid_shortcode_init() {
    add_shortcode( 'mermaid', 'wp_mermaid_shortcode' );
}

/**
 * Render the shortcode.
 *
 * @param array $attr
 * @param string $content
 *
 * @return string
 */
function wp_mermaid_shortcode( $attr, $content = null ) {
    global $is_mermaid_loaded;

    $is_mermaid_loaded = true;

    $attr = shortcode_atts(
        array(),
        $attr,
        'mermaid'
    );

    $content = htmlspecialchars( html_entity_decode( $content ) );
    $result  = sprintf( '<div class="mermaid-eq">%s</div>', $content );

    return $result;
}
