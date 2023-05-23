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
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_shortcode_init() {
	add_shortcode( 'mermaid', 'wp_mermaid_shortcode' );
}

/**
 * Render the shortcode.
 *
 * @param array  $attr    Attributes.
 * @param string $content Content.
 * @return string
 */
function wp_mermaid_shortcode( $attr, $content = '' ) {
	global $load_mermaid_js;

	$load_mermaid_js = true;

	$attr = shortcode_atts(
		array(),
		$attr,
		'mermaid'
	);

	$content = html_entity_decode( $content );
	$content = str_replace( '<br />', "\n", $content );
	$content = str_replace( array( '<p>', '</p>' ), "\n", $content );
	$content = preg_replace( "/[\r\n]+/", "\n", $content );
	$result  = sprintf( "<div class=\"mermaid\">\n%s\n</div>", $content );

	return $result;
}
