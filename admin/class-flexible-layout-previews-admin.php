<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://elegantseagulls.com
 * @since      1.0.0
 *
 * @package    Flexible_Layout_Previews
 * @subpackage Flexible_Layout_Previews/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Flexible_Layout_Previews
 * @subpackage Flexible_Layout_Previews/admin
 * @author     Elegant Seagulls <dan@elegantseagulls.com>
 */
class Flexible_Layout_Previews_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Return the required markup to be used in filtering the ACF Layout Title.
	 *
	 * @since 1.1.0
	 * @param string $layout_name The layout identifier name.
	 * @param string $preview_url The url to the preview image.
	 * @param string $layout_label The layout label name.
	 *
	 * @return string The required markup.
	 */
	private function get_preview_title_markup( $layout_name, $preview_url, $layout_label ) {
		$html  = '<span class="es-acf-fc-preview no-preview"';
		$html .= ' data-layout="' . $layout_name . '"';
		$html .= ' data-preview="' . $preview_url . '"';
		$html .= '>';
		$html .= $layout_label;
		$html .= '</span>';

		return $html;
	}

	/**
	 * Checks if the current flexible layout has a preview image available.
	 * If there is a image available, modifies the title to include html
	 * markup for the preview URL.
	 *
	 * @since 1.0.0
	 * @param string $title The current title of the ACF field.
	 * @param object $field The current ACF field object.
	 * @param object $layout The current ACF flexible layout object.
	 *
	 * @return string The filtered field title to display (contains new
	 * markup for preview).
	 */
	public function flexible_layout_preview_title( $title, $field, $layout ) {
		$page_builder_name = $field['_name'];
		$layout_name       = $layout['name'];
		$layout_slug       = $page_builder_name . '_' . $layout_name;
		$layout_label      = $layout['label'];

		$preview_relative        = get_template_directory() . '/layouts/previews/' . $layout_slug . '.jpg';
		$preview_global_relative = get_template_directory() . '/layouts/previews/_' . $layout_name . '.jpg';

		// Check if a specific preview is set for the page builder and component.
		if ( file_exists( $preview_relative ) ) {
			$preview_url = get_template_directory_uri() . '/layouts/previews/' . $layout_slug . '.jpg';
			$title       = $this->get_preview_title_markup( $layout_name, $preview_url, $layout_label );
		} elseif ( file_exists( $preview_global_relative ) ) { // Check if there is a global component preview set.
			$preview_url = get_template_directory_uri() . '/layouts/previews/_' . $layout_name . '.jpg';
			$title       = $this->get_preview_title_markup( $layout_name, $preview_url, $layout_label );
		}

		return $title;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/flexible-layout-previews-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/flexible-layout-previews-admin.js', array( 'jquery' ), $this->version, false );

	}

}
