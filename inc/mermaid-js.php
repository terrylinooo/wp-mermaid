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
add_action( 'wp_print_footer_scripts', 'wp_mermaid_print_footer_scripts' );

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

        $script_url = MERMAID_PLUGIN_URL . 'assets/mermaid/mermaid.min.js';
      
        wp_enqueue_script( 'mermaid', $script_url, array(), MERMAID_JS_VERSION, true );
    }
}

/**
 * Print JavasSript plaintext in page footer.
 * This method will be called by `wp_print_footer_scripts` hook.
 *
 * @return void
 */
function wp_mermaid_print_footer_scripts() {
    global $load_mermaid_js;

    if ( $load_mermaid_js ) {

        $script = '
			<script id="wp-mermaid">

                ( function( $ ) {
                    $( function() {
                        if ( typeof mermaid !== "undefined" ) {
							let block_count = $( ".mermaid" ).length;
							let i = 0;

                            if ( block_count > 0 ) {
								$( ".mermaid" ).each( function() {
									let mermaid_content = $( this ).html();
									mermaid_content.replace( /<[^>]*>?/gm, "" );
									$( this ).html( mermaid_content );
									i++;
								});
							}

							if ( block_count === i ) {
								mermaid.init();
							}
                        }
                    } );
				} )( jQuery );

            </script>
        ';
        echo preg_replace( '/\s+/', ' ', $script );
    }
}