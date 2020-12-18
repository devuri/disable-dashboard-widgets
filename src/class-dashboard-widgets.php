<?php

namespace SwitchWeb;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'SwitchWeb\Dashboard_Widgets' ) ) {

	/**
	 *  Handle Widget Removal
	 *
	 * TODO Add GUI to set who can see widgets ( subscriber, editor, contributer etc )
	 *
	 * @since 1.0
	 */
	final class Dashboard_Widgets {
		/**
		 * Dashboard_Widgets::initialize
		 *
		 * @return object
		 */
		public static function init() {
			return new Dashboard_Widgets();
		}

		/**
		 * Setup
		 */
		private function __construct() {
			// init
		}

		/**
		 * Disable Widgets
		 *
		 * @return void
		 */
		public function disable() {
			add_action( 'wp_dashboard_setup', array( $this, 'remove_all_metaboxes' ), 99 );
		}

		/**
		 * Widgets
		 *
		 * @return void
		 */
		public function remove_all_metaboxes() {
			if ( ! current_user_can( 'manage_options' ) ) {
			  global $wp_meta_boxes;
			  $wp_meta_boxes['dashboard']['normal']['core'] = array();
			  $wp_meta_boxes['dashboard']['side']['core'] = array();
			}
		}

	}
}
