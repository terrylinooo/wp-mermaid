<?php
/**
 * WP Mermaid - Gutenberg Block.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action('init', 'mermaid_block_init');

/**
 * Initial block.
 *
 * @return void
 */
function mermaid_block_init() {

    if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

    wp_register_script(
        'mermaid-gutenberg-block',
        plugins_url( 'assets/mermaid/block-editor.js', dirname( __FILE__ ) ),
        array( 'wp-blocks', 'wp-element' )
    );

    wp_register_style(
        'mermaid-gutenberg-block',
        plugins_url( 'assets/mermaid/block-editor.css', dirname( __FILE__ ) ),
        array( 'wp-edit-blocks' )
    );

    register_block_type( 'mermaid/display-block', array(
        'editor_script'   => 'mermaid-gutenberg-block',
        'editor_style'    => 'mermaid-gutenberg-block',
        'render_callback' => 'mermaid_display_block_render',
    ) );
}

/**
 * Render block.
 *
 * @param array $attr
 * @param string $content
 * @return string
 */
function mermaid_display_block_render( $attr, $content = null ) {
    global $load_mermaid_js;
    $load_mermaid_js = true;
    return $content;
}
