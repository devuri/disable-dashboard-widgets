<?php
/**
 *	Plugin Name: Easy Dashboard Widgets Removal
 *	Plugin URI:  http://switchwebdesign.io/wordpress-plugins/
 *	Description: Easily Remove All Widgets from Dashboard for all users except the Administrator .
 *	Author:      SwitchWebdesign.io
 *	Author URI:  http://switchwebdesign.io
 *	Version:     1.2.0
 *	License:     GPLv2 or later
 *	License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *	Text Domain: swd-dashboard-widgets-removal
 *	Domain Path: languages
 *	Usage:
 *	Tags:
 *
 *	Copyright 2020 Uriel Wilson	(email : uriel@switchwebdesign.io)
 *	License: GNU General Public License
 *	GPLv2 Full license details in license.txt
 *
 *	Easy Dashboard Widgets Removal  is free software; you can redistribute it and/or
 *	modify it under the terms of the GNU General Public License
 *	as published by the Free Software Foundation; either version 2
 *	of the License, or (at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *  Credit https://wordpress.stackexchange.com/questions/73561/how-to-remove-all-widgets-from-dashboard
 *
 *	You should have received a copy of the GNU General Public License
 *	along with Easy Dashboard Widgets Removal. If not, see http://www.gnu.org/licenses/
 *  ----------------------------------------------------------------------------
 *  @package   SwDashboardWidgetsRemoval
 *  @author    Switch Web Dev
 *  @link      https://switchwebdesign.io
 *  @since     1.2.0
 *  @license   GPL-2.0+
 *	@copyright Copyright (c) 2020 Uriel Wilson.
 *  ----------------------------------------------------------------------------
 */

  # deny direct access
    if ( ! defined( 'WPINC' ) ) {
      die;
    }

  # plugin directory
    define('SWDEDWR_DIR', dirname(__FILE__));

  # plugin url
    define('SWDEDWR_URL', plugins_url( '/',__FILE__ ));
#  ----------------------------------------------------------------------------

/**
 *  Main Class to handle Widget Removal
 *
 * @since 1.0
 */
  class SwRemoveDashWidgets {

    public function __construct() {
      add_action( 'wp_dashboard_setup', array( $this, 'swdwp_remove_dashboard_widgets'),9999 );
    }
    /**
      * Remove the Widgets ( do a check if the user can manage_options )
      * we should add an option for this to allow admins to choose who can view lowest level etc
      * @since 1.0
      */
    public function swdwp_remove_dashboard_widgets() {

      if ( ! current_user_can( 'manage_options' ) ) {
        global $wp_meta_boxes;
        $wp_meta_boxes['dashboard']['normal']['core'] = array();
        $wp_meta_boxes['dashboard']['side']['core'] = array();
      }
    }
#  ----------------------------------------------------------------------------
    // initialize
    new SwRemoveDashWidgets();
