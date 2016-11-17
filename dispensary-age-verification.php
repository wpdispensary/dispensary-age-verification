<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.wpdispensary.com
 * @since             1.0.0
 * @package           Dispensary_Age_Verification
 *
 * @wordpress-plugin
 * Plugin Name:       Dispensary Age Verification
 * Plugin URI:        https://www.wpdispensary.com
 * Description:       Check a visitors age before allowing them to view your dispensary website.
 * Version:           1.0.1
 * Author:            WP Dispensary
 * Author URI:        https://www.wpdispensary.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dispensary-age-verification
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-dispensary-age-verification-activator.php
 */
function activate_dispensary_age_verification() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dispensary-age-verification-activator.php';
	Dispensary_Age_Verification_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-dispensary-age-verification-deactivator.php
 */
function deactivate_dispensary_age_verification() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dispensary-age-verification-deactivator.php';
	Dispensary_Age_Verification_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dispensary_age_verification' );
register_deactivation_hook( __FILE__, 'deactivate_dispensary_age_verification' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dispensary-age-verification.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_dispensary_age_verification() {

	$plugin = new Dispensary_Age_Verification();
	$plugin->run();

}
run_dispensary_age_verification();