<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://elegantseagulls.com
 * @since      1.0.0
 *
 * @package    Flexible_Layout_Previews
 * @subpackage Flexible_Layout_Previews/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Flexible_Layout_Previews
 * @subpackage Flexible_Layout_Previews/includes
 * @author     Elegant Seagulls <dan@elegantseagulls.com>
 */
class Flexible_Layout_Previews_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'flexible-layout-previews',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
