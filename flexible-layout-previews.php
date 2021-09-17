<?php

/**
 *
 * @link              https://elegantseagulls.com
 * @since             1.0.0
 * @package           Flexible_Layout_Previews
 *
 * @wordpress-plugin
 * Plugin Name:       Flexible Layout Previews
 * Plugin URI:        https://elegantseagulls.com
 * Description:       Allows you to save images for previews to display to content editors when they are selecting new Flexible Layouts.
 * Version:           1.0.0
 * Author:            Elegant Seagulls
 * Author URI:        https://elegantseagulls.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       flexible-layout-previews
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version (uses SemVer).
 */
define( 'FLEXIBLE_LAYOUT_PREVIEWS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-flexible-layout-previews-activator.php
 */
function activate_flexible_layout_previews() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flexible-layout-previews-activator.php';
	Flexible_Layout_Previews_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-flexible-layout-previews-deactivator.php
 */
function deactivate_flexible_layout_previews() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flexible-layout-previews-deactivator.php';
	Flexible_Layout_Previews_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flexible_layout_previews' );
register_deactivation_hook( __FILE__, 'deactivate_flexible_layout_previews' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-flexible-layout-previews.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_flexible_layout_previews() {

	$plugin = new Flexible_Layout_Previews();
	$plugin->run();

}
run_flexible_layout_previews();
