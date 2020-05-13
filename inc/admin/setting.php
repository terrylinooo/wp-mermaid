<?php
/**
 * WP Mermaid - Setting page.
 *
 * @author Terry Lin
 * @link https://terryl.in/
 * @since 1.0.0
 * @version 1.0.0
 */

add_action( 'admin_init', 'wp_mermaid_settings' );

 /**
  * Add settings.
  *
  * @return void
  */
function wp_mermaid_settings() {

	register_setting( 'pluginPage', 'wp_mermaid_js_source' );

	add_settings_section(
		'wp_mermaid_basic_section_id',
		__( 'Basic', 'wp-mermaid' ),
		'wp_mermaid_setting_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'wp_mermaid_js_source',
		__( 'File host', 'wp-mermaid' ),
		'wp_mermaid_js_source_callback',
		'pluginPage',
		'wp_mermaid_basic_section_id'
	 );
}

function wp_mermaid_setting_section_callback() {
	echo __( '', 'wp-mermaid' );
}

/**
 * Setting block - The source of Javascript files will be used from.
 *
 * @return void
 */
function wp_mermaid_js_source_callback() {
	$option_wp_mermaid_js_source = get_option( 'wp_mermaid_js_source', 'default' );
	?>
		<div>
			<div>
				<input type="radio" name="wp_mermaid_js_source" id="wp-mermaid-js-library-source-default" value="default" 
					<?php checked( $option_wp_mermaid_js_source, 'default' ); ?>>
				<label for="wp-mermaid-js-library-source-default">
					<?php echo __( 'default', 'wp-mermaid' ); ?>
				<label>
			</div>
			<div>
				<input type="radio" name="wp_mermaid_js_source" id="wp-mermaid-js-library-source-default" value="cloudflare" 
					<?php checked( $option_wp_mermaid_js_source, 'cloudflare' ); ?>>
				<label for="wp-mermaid-js-library-source-default">
					<?php echo __( 'cdn.cloudflare.com', 'wp-mermaid' ); ?>
				<label>
			
			</div>
			<div>
				<input type="radio" name="wp_mermaid_js_source" id="wp-mermaid-js-library-source-default" 
					<?php checked( $option_wp_mermaid_js_source, 'jsdelivr' ); ?> value="jsdelivr">
				<label for="wp-mermaid-js-library-source-default">
					<?php echo __( 'cdn.jsdelivr.net', 'wp-mermaid' ); ?>
				<label>
			</div>
			
		</div>
		<p><em><?php echo __( 'Use this library with a CDN service or self-hosted (default)?', 'wp-mermaid' ); ?></em></p>
	<?php
}

