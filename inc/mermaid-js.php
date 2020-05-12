<?php
/**
 * WP Mermaid - Enqueue Mermaid scripts.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'wp_enqueue_scripts', 'wp_mermaid_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'wp_mermaid_admin_enqueue_scripts' );
add_action( 'wp_print_footer_scripts', 'wp_mermaid_print_footer_scripts' );

/**
 * Register JS files for backend use.
 * This method will be called by `admin_enqueue_scripts` hook.
 *
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_admin_enqueue_scripts() {
    global $is_mermaid_loaded;
    $is_mermaid_loaded = true;
    wp_mermaid_enqueue_scripts();
}

/**
 * Register JS files for frontend use.
 * This method will be called by `wp_enqueue_scripts` hook.
 * 
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_enqueue_scripts() {
    global $is_mermaid_loaded;

    if ( $is_mermaid_loaded ) {

        $option = get_option( 'wp_mermaid_js_source' );

        switch ( $option ) {
            case 'cloudflare':
                $script_url = 'https://cdnjs.cloudflare.com/ajax/libs/mermaid/' . MERMAID_JS_VERSION . '/mermaid.min.js';
                break;
    
            case 'jsdelivr':
                $script_url = 'https://cdn.jsdelivr.net/npm/mermaid@' . MERMAID_JS_VERSION . '/dist/mermaid.min.js';
                break;
    
            default:
                $script_url = MERMAID_PLUGIN_URL . 'assets/mermaid/mermaid.min.js';
                break;
        } 

        wp_enqueue_script( 'mermaid', $script_url, array(), MERMAID_JS_VERSION, true );
    }
}

/**
 * Print JavasSript plaintext in page footer.
 * This method will be called by `wp_print_footer_scripts` hook.
 * 
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_print_footer_scripts() {
    global $is_mermaid_loaded;

    if ( $is_mermaid_loaded ) {

        $script = '
            <script id="wp-mermaid">
                (function($) {
                    $(function() {
                        if (typeof mermaid !== "undefined") {
                            if ($(".mermaid").length > 0) {
                                $(".mermaid").parent("div").attr("style", "text-align: center; background: none;");
                                mermaid.init();
                            }
                        }
                    });
                })(jQuery);
            </script>
        ';
        echo preg_replace( '/\s+/', ' ', $script );
    }
}