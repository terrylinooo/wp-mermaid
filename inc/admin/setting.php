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

	register_setting( 'wp_mermaid_setting_group', 'wp_mermaid_uninstall_option' );

	add_settings_section(
		'wp_mermaid_basic_section_id',
		__( 'Basic', 'wp-mermaid' ),
		'wp_mermaid_setting_section_callback',
		'wp_mermaid_setting_group'
	);

	add_settings_field(
		'wp_mermaid_uninstall_option',
		__( 'Uninstall Option', 'wp-mermaid' ),
		'wp_mermaid_uninstall_option_callback',
		'wp_mermaid_setting_group',
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
function wp_mermaid_uninstall_option_callback() {
	$option_uninstall_option = get_option( 'wp_mermaid_uninstall_option', 'yes' );
	?>
		<div>
			<div>
				<input type="radio" name="wp_mermaid_uninstall_option" id="wp-mermaid-uninstall-option-yes" value="yes" 
					<?php checked( $option_uninstall_option, 'yes' ); ?>>
				<label for="wp-mermaid-uninstall-option-yes">
					<?php echo __( 'Remove WP-Mermaid generated data.', 'wp-mermaid' ); ?><br />
				<label>
			</div>
			<div>
				<input type="radio" name="wp_mermaid_uninstall_option" id="wp-mermaid-uninstall-option-yes" value="no" 
					<?php checked( $option_uninstall_option, 'no' ); ?>>
				<label for="wp-mermaid-uninstall-option-yes">
					<?php echo __( 'Keep WP-Mermaid generated data.', 'wp-mermaid' ); ?>
				<label>
			</div>	
		</div>
		<p><em><?php echo __( 'This option only works when you uninstall this plugin.', 'wp-mermaid' ); ?></em></p>
	<?php
}
