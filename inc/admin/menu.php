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
 * @return void
 */
function wp_mermaid_options_page() {
	?>
   <div class="wrap">
	   <h1>WP Mermaid 
			<small style="font-size: 12px;">
				<a href="https://github.com/terrylinooo/wp-mermaid" target="_blank" style="text-decoration: none"><?php echo MERMAID_PLUGIN_VERSION; ?></a>
				by <a href="https://github.com/terrylinooo" target="_blank" style="text-decoration: none">TerryL</a>

			</small>
		</h1>
	   <hr />
	   <form action="options.php" method="post">
		   <?php settings_fields( 'wp_mermaid_setting_group' ); ?>
		   <?php do_settings_sections( 'wp_mermaid_setting_group' );  ?>
		   <hr />
		   <?php submit_button(); ?>
	   </form>
   </div>
   <div class="wrap">
   		<hr />
		<h3><?php echo __( 'How to Use', 'wp-mermaid' ); ?></h3>
		<blockquote>
			<h4><?php echo __( 'Shortcode', 'wp-mermaid' ); ?></h4>
			<blockquote>
				<p>
					<?php echo __( 'In classic editor, you can use shortcode to render your Mermaid syntax.', 'wp-mermaid' ); ?><br />
					<?php echo __( 'If you are using WordPress version below 5.0, this is the only way you can use.', 'wp-mermaid' ); ?>
				</p>
				<code style="background-color: white; padding: 10px; margin: 10px 0; display: inline-block;">[mermaid] ... [/mermaid]</code>
			</blockquote>
			<h4><?php echo __( 'Gutenberg Block', 'wp-mermaid' ); ?></h4>
			<blockquote>
				<p><?php echo __( 'Choose Mermaid block:', 'wp-mermaid' ); ?></p>
				<img src="<?php echo MERMAID_PLUGIN_URL ?>/assets/example-gutenberg-block-1.png" style="width: 500px; max-width: 95%">
				<p><?php echo __( 'Fill in your Mermaid syntax in the editor.', 'wp-mermaid' ); ?></p>
				<img src="<?php echo MERMAID_PLUGIN_URL ?>/assets/example-gutenberg-block-2.png" style="width: 500px; max-width: 95%">>
			</blockquote>

		</blockquote>
	</div>
   <?php
}
