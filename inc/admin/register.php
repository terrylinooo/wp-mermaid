<?php
/**
 * WP Mermaid - Activating plugin.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

register_activation_hook( __FILE__, 'wp_mermaid_activation' );
register_uninstall_hook( __FILE__, 'wp_mermaid_uninstall' );

/**
 * Assign default setting values while activating this plugin.
 *
 * @return void
 */
function wp_mermaid_activation() {
	add_option( 'wp_mermaid_js_source', 'default' );
	add_option( 'wp_mermaid_uninstall_option', 'yes' );
}

/**
 * Remove setting values while uninstalling this plugin.
 *
 * @return void
 */
function wp_mermaid_uninstall() {
	$option_uninstall = get_option( 'wp_mermaid_uninstall_option' );

	if ( 'yes' === $option_uninstall ) {
		delete_option( 'wp_mermaid_js_source' );
		delete_option( 'wp_mermaid_uninstall_option' );
	}
}
