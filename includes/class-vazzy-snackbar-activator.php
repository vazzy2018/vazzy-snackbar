<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Vazzy_Snackbar
 * @subpackage Vazzy_Snackbar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Vazzy_Snackbar
 * @subpackage Vazzy_Snackbar/includes
 * @author     Your Name <email@example.com>
 */
class Vazzy_Snackbar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
			include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}
		if ( current_user_can( 'activate_plugins' ) && ! class_exists( 'ACF' ) ) {
			// Deactivate the plugin.
			deactivate_plugins( plugin_basename( __FILE__ ) );
			// Throw an error in the WordPress admin console.
			$error_message = '<p style="font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Oxygen-Sans,Ubuntu,Cantarell,\'Helvetica Neue\',sans-serif;font-size: 13px;line-height: 1.5;color:#444;">' . esc_html__( 'This plugin requires ', 'simplewlv' ) . '<a target="_blank" href="' . esc_url( 'https://wordpress.org/plugins/advanced-custom-fields/' ) . '">Advanced Custom Fields</a>' . esc_html__( ' plugin to be active.', 'simplewlv' ) . '</p>';
			die( $error_message ); // WPCS: XSS ok.
		}
	}
}
