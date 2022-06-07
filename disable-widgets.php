<?php
 /**
 * Disable Dashboard Widgets
 *
 * @package   DisableDashboardWidgets
 * @author    Uriel Wilson
 * @copyright 2020 Uriel Wilson
 * @license   GPL-2.0
 * @link      https://urielwilson.com
 *
 * @wordpress-plugin
 * Plugin Name:       Disable Dashboard Widgets
 * Plugin URI:        https://switchwebdev.com/wordpress-plugins/
 * Description:       This plugin will remove all widgets from Dashboard for all users except the Administrator.
 * Version:           0.1.14
 * Requires at least: 3.4
 * Requires PHP:      5.6
 * Author:            Uriel Wilson
 * Author URI:        https://urielwilson.com
 * Text Domain:       disable-dashboard-widgets
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

  	// deny direct access.
    if ( ! defined( 'WPINC' ) ) {
      	die;
    }

	/**
	 *  Load class.
	 */
	require_once plugin_dir_path( __FILE__ ) . '/src/class-dashboard-widgets.php';

	/**
	 * Dashboard_Widgets  Handle Widget Removal
	 */
	SwitchWeb\Dashboard_Widgets::init()->disable();
