<?php
/**
 * WP Mermaid - Smart loader for frontend posts.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'loop_end', 'wp_mermaid_js_smart_loader', 10 );

// We need to remove `wptexturize` to make the Mermaid syntax work as expected,
// becuase the HTML encoded characters break the syntax.
remove_filter( 'the_content', 'wptexturize' );

/**
 * Detect whether Mermaid syntax existed in post content.
 *
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_js_smart_loader() {
	global $load_mermaid_js;

	if ( is_mermaid_loaded_on_post() ) {
		$load_mermaid_js = true;
	}
}

/**
 * Check if mermaid.js should be loaded.
 * This method is used in `wp_mermaid_js_smart_loader` only.
 *
 * @return bool
 */
function is_mermaid_loaded_on_post() {
	$is_mermaid   = false;
	$post_content = get_the_content();

	if ( false !== stripos( $post_content, 'wp-block-wp-mermaid-block' ) ) {
		// Detect whether post content contains WP-Mermaid block.
		$is_mermaid = true;

	} else {

		if (
			// We also support Markdown code block, for example: ```mermaid and HTML `<div class="mermaid">`
			false !== stripos( $post_content, ' class="mermaid">' ) ||
			false !== stripos( $post_content, ' class="language-mermaid">' )
		) {
			$is_mermaid = true;
		}
	}

	return $is_mermaid;
}
