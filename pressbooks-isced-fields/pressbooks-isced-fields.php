<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Pressbooks_Isced_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       All In One Metadata - Isced Fields
 * Description:       This is an addon plugin for the All In One Metadata plugin
 * Version:           1.0.0
 * Author:            Nicole Acuna - Christos Amyrotos
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pressbooks-isced-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pressbooks-isced-fields-activator.php
 */
function activate_pressbooks_isced_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-isced-fields-activator.php';
	Pressbooks_Isced_Fields_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pressbooks-isced-fields-deactivator.php
 */
function deactivate_pressbooks_isced_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-isced-fields-deactivator.php';
	Pressbooks_Isced_Fields_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pressbooks_isced_fields' );
register_deactivation_hook( __FILE__, 'deactivate_pressbooks_isced_fields' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pressbooks-isced-fields.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pressbooks_isced_fields() {

	$plugin = new Pressbooks_Isced_Fields();
	$plugin->run();

}
run_pressbooks_isced_fields();
