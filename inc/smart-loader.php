<?php
/**
 * WP Mermaid - Posting.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'wp_insert_post', 'wp_mermaid_insert_post' );
add_action( 'wp_enqueue_scripts', 'wp_mermaid_js_smart_loader' );

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

    // Support WordPress 5.0 only.
    if ( ! $load_mermaid_js ) {

        if ( is_mermaid_loaded_on_post() ) {
            $load_mermaid_js = true; 
        }
    }
}

/**
 * Calls on wp_insert_post action, after wp_insert_post_data. This way we can
 * still set postmeta on our revisions after it's all been deleted.
 *
 * @param int $post_id The post ID that has just been added/updated
 * @return null
 */
function wp_mermaid_insert_post( $post_id ) {
    global $load_mermaid_js, $post_metadata_id;

    // Remove wp-mermaid metadata then check the post again.
    delete_metadata( 'post', $post_id, $post_metadata_id );

    $post_content = get_post_field( 'post_content' , $post_id );

    // Support WordPress 5.0 only.
    if ( function_exists( 'has_blocks' ) ) {
        if ( false !== stripos( $post_content, 'wp-block-wp-mermaid-block' ) ) {
            $load_mermaid_js = true; 
        }
    } else {
        if (
            false !== stripos( $post_content, ' class="mermaid">' ) ||
            // We also support Markdown code block, for example: ```mermaid
            false !== stripos( $post_content, ' class="language-mermaid">' )
        ) {
            $load_mermaid_js = true; 
        }
    }

    if ( $load_mermaid_js ) {

        // This post contains mermaid syntax.
        update_metadata( 'post', $post_id, $post_metadata_id, true );
    }
}

/**
 * Check if mermaid.js should be loaded.
 * This method is used in `wp_mermaid_js_smart_loader` only.
 *
 * @return bool
 */
function is_mermaid_loaded_on_post() {
    global $post, $post_metadata_id;

    $post_id = null;

	if ( ! empty( $post->ID ) )  {
		$post_id = $post->ID;
	}

    if ( empty( $post_id ) ) {
        return false;
    }

    $post_meta = get_metadata( 'post', $post_id, $post_metadata_id );

    if ( empty( $post_meta[0] ) ) {
        return false;
    }

    return (bool) $post_meta[0];
}