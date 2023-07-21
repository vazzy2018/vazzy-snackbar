<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Vazzy_Snackbar
 *
 * @wordpress-plugin
 * Plugin Name:       Snackbar
 * Plugin URI:        https://t.me/devburke/
 * Description:       Snackbar plugin.
 * Version:           1.0.0
 * Author:            @devburke
 * Author URI:        https://t.me/devburke/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vazzy-snackbar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VAZZY_SNACKBAR_VERSION', '1.0.6' );

/**
 * Polyfills
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/polifils.php';

 
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vazzy-snackbar-activator.php
 */
function activate_vazzy_snackbar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vazzy-snackbar-activator.php';
	Vazzy_Snackbar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vazzy-snackbar-deactivator.php
 */
function deactivate_vazzy_snackbar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vazzy-snackbar-deactivator.php';
	Vazzy_Snackbar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vazzy_snackbar' );
register_deactivation_hook( __FILE__, 'deactivate_vazzy_snackbar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vazzy-snackbar.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vazzy_snackbar() {

	$plugin = new Vazzy_Snackbar();
	$plugin->run();

}
run_vazzy_snackbar();
