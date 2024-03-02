<?php
/**
 * WP Mermaid - Enqueue Mermaid scripts.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'loop_end', 'wp_mermaid_enqueue_scripts', 20 );
add_action( 'admin_enqueue_scripts', 'wp_mermaid_admin_enqueue_scripts' );

/**
 * Register JS files for backend use.
 * This method will be called by `admin_enqueue_scripts` hook.
 *
 * @return void
 */
function wp_mermaid_admin_enqueue_scripts() {
	global $load_mermaid_js;

	// We want to load mermaid.js for previewing the graph in block editor.
	$load_mermaid_js = true;

	wp_mermaid_enqueue_scripts();
}

/**
 * Register JS files for frontend use.
 * This method will be called by `wp_enqueue_scripts` hook.
 *
 * @return void
 */
function wp_mermaid_enqueue_scripts() {
	global $load_mermaid_js;

	if ( $load_mermaid_js ) {

		$option = get_option( 'wp_mermaid_js_source' );

		switch ( $option ) {
			case 'cloudflare':
				$script_url = 'https://cdnjs.cloudflare.com/ajax/libs/mermaid/' . MERMAID_JS_VERSION . '/mermaid.min.js';
				break;

			case 'jsdelivr':
				$script_url = 'https://cdn.jsdelivr.net/npm/mermaid@' . MERMAID_JS_VERSION . '/dist/mermaid.min.js';
				break;

			case 'local':
			default:
				$script_url = MERMAID_PLUGIN_URL . 'assets/mermaid/mermaid.min.js';
				break;
		}

		wp_enqueue_script( 'mermaid', $script_url, array(), MERMAID_JS_VERSION, true );
	}
}
