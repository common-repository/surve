<?php
/**
 * @link              https://www.surve.nl
 * @since             1.0.0
 * @package           Surve
 *
 * @wordpress-plugin
 * Plugin Name:       Surve
 * Plugin URI:        https://www.surve.nl
 * Description:       Met de Surve plugin plaatst u de code om Surve te gebruiken eenvoudig op uw website.
 * Version:           1.0.0
 * Author:            Matthijs - Surve.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       surve
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
define( 'SURVE_PLUGIN_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-surve.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_surve() {

	$plugin = new Surve();
	$plugin->run();

}
run_surve();
