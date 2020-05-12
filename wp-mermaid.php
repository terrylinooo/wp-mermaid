<?php
/**
 * WP Mermaid
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package wp-mermaid
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Plugin Name: WP Mermaid
 * Plugin URI:  https://github.com/terrylinooo/wp-dermaid
 * Description: Generation of diagrams and flowcharts from text in a similar manner as markdown by using mermaid.js
 * Version:     1.0.0
 * Author:      Terry Lin
 * Author URI:  https://terryl.in/
 * License:     GPL 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: wp-mermaid
 * Domain Path: /languages
 */

/**
 * Any issues, or would like to request a feature, please visit.
 * https://github.com/terrylinooo/wp-mermaid/issues
 *
 * Welcome to contribute your code here:
 * https://github.com/terrylinooo/wp-mermaid
 *
 * Thanks for using WP Mermaid!
 * Star it, fork it, share it if you like this plugin.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * CONSTANTS
 *
 * MERMAID_PLUGIN_NAME          : Plugin's name.
 * MERMAID_PLUGIN_DIR           : The absolute path of the wp-mermaid plugin directory.
 * MERMAID_PLUGIN_URL           : The URL of the wp-mermaid plugin directory.
 * MERMAID_PLUGIN_PATH          : The absolute path of the wp-mermaid plugin launcher.
 * MERMAID_PLUGIN_LANGUAGE_PACK : Translation Language pack.
 * MERMAID_PLUGIN_VERSION       : wp-mermaid plugin version number
 * MERMAID_PLUGIN_TEXT_DOMAIN   : wp-mermaidplugin text domain
 *
 * Expected values:
 *
 * MERMAID_PLUGIN_DIR           : {absolute_path}/wp-content/plugins/wp-mermaid/
 * MERMAID_PLUGIN_URL           : {protocal}://{domain_name}/wp-content/plugins/wp-mermaid/
 * MERMAID_PLUGIN_PATH          : {absolute_path}/wp-content/plugins/wp-mermaid/wp-mermaid.php
 * MERMAID_PLUGIN_LANGUAGE_PACK : wp-mermaid/languages
 */

define( 'MERMAID_PLUGIN_NAME', plugin_basename( __FILE__ ) );
define( 'MERMAID_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MERMAID_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MERMAID_PLUGIN_PATH', __FILE__ );
define( 'MERMAID_PLUGIN_LANGUAGE_PACK', dirname( plugin_basename( __FILE__ ) ) . '/languages' );
define( 'MERMAID_PLUGIN_VERSION', '1.0.0' );
define( 'MERMAID_PLUGIN_TEXT_DOMAIN', 'wp-mermaid' );
define( 'MERMAID_JS_VERSION', '8.5.0' );

// Support WordPress version 4.7 and below.
if ( ! function_exists( 'wp_doing_ajax' ) ) {
	function wp_doing_ajax() {
		return false;
	}
}

if ( ! wp_doing_ajax() ) {

	load_plugin_textdomain( 'wp-mermaid', false, basename( dirname( __FILE__ ) ) . '/languages' ); 

	if ( is_admin() ) {
		require_once plugin_dir_path( __FILE__ ) . 'inc/admin/register.php';
		require_once plugin_dir_path( __FILE__ ) . 'inc/admin/setting.php';
		require_once plugin_dir_path( __FILE__ ) . 'inc/admin/menu.php';
	}

	// This is a global variable we use to identify where we want to use mermaid.js
	$load_mermaid_js = false;

	require_once plugin_dir_path( __FILE__ ) . 'inc/block.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/shortcode.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/smart-loader.php';
	require_once plugin_dir_path( __FILE__ ) . 'inc/mermaid-js.php';
}
