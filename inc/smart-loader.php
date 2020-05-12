<?php
/**
 * WP Mermaid - Posting.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_filter( 'the_content', 'wp_mermaid_js_smart_loader' );

// We need to remove `wptexturize` to make the Mermaid syntax work as expected,
// becuase the HTML encoded characters break the syntax.
remove_filter( 'the_content', 'wptexturize' );

/**
 * Detect whether Mermaid syntax existed in post content.
 *
 * @param string $contnet
 * @since 1.0.0
 * @return string
 */
function wp_mermaid_js_smart_loader( $contnet ) {
    global $load_mermaid_js;

    // Support WordPress 5.0 only.
    if ( function_exists( 'has_blocks' ) ) {

        if ( stripos( $contnet, 'wp-block-wp-mermaid-block' ) !== false ) {
            $load_mermaid_js = true; 
        }
    }

    return $contnet;

    // WordPress version below 5.0, use shortcode instead.
}

