<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       Nicole
 * @since      1.0.0
 *
 * @package    Pressbooks_Isced_Fields
 * @subpackage Pressbooks_Isced_Fields/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Pressbooks_Isced_Fields
 * @subpackage Pressbooks_Isced_Fields/includes
 * @author     Nicole <nicoleacuna95@gmail.com>
 */
class Pressbooks_Isced_Fields_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'pressbooks-isced-fields',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
