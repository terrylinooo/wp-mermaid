<?php
/**
 * WP Mermaid - Menu.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'admin_menu', 'wp_mermaid_option' );

/**
 * Register the plugin setting page.
 * 
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_option() {
	
	if ( function_exists( 'add_options_page' ) ) {
		add_options_page(
			__( 'WP Mermaid', 'wp-mermaid' ),
			__( 'WP Mermaid', 'wp-mermaid' ),
			'manage_options',
			'wp-mermaid.php',
			'wp_mermaid_options_page'
		);
	}
}

/**
 * Output the setting page.
 *
 * @since 1.0.0
 * @return void
 */
function wp_mermaid_options_page() {
	?>
   <div class="wrap">
	   <h1>WP Mermaid</h1>
	   <div style="border-top: 1px #cccccc solid; margin-top: 20px;"></div>
	   <form action="options.php" method="post">
		   <?php settings_fields( 'pluginPage' ); ?>
		   <?php do_settings_sections( 'pluginPage' );  ?>
		   <div style="border-top: 1px #cccccc solid; margin-top: 20px;"></div>
		   <?php submit_button(); ?>
	   </form>
   </div>
   <?php
}
