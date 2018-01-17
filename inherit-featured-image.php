<?php
/**
 * Plugin Name: JSM's Inherit Parent Featured Image
 * Text Domain: inherit-featured-image
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/inherit-featured-image/
 * Assets URI: https://jsmoriss.github.io/inherit-featured-image/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: A WordPress plugin to inherit the featured image of the Post / Page parent, grand-parent, etc.
 * Requires PHP: 5.4
 * Requires At Least: 3.8
 * Tested Up To: 4.9.2
 * Version: 1.1.0
 * 
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes / re-writes or incompatible API changes.
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2013-2018 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
        die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'InheritFeaturedImage' ) ) {

        class InheritFeaturedImage {

		private static $instance;

		public function __construct() {
			add_action( 'plugins_loaded', array( __CLASS__, 'load_textdomain' ) );
			add_filter( 'get_post_metadata', array( __CLASS__, 'get_post_inherited' ), 10, 4 );
		}

		public static function &get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public static function load_textdomain() {
			load_plugin_textdomain( 'inherit-featured-image', false, 'inherit-featured-image/languages/' );
		}

		public static function get_post_inherited( $meta_data, $object_id, $meta_key, $single ) {
			return self::get_inherited( 'post', $meta_data, $object_id, $meta_key, $single );
		}

		private static function get_inherited( $meta_type, $meta_data, $object_id, $meta_key, $single ) {
			if ( isset( $meta_key ) && $meta_key === '_thumbnail_id' ) {
				$meta_cache = self::get_meta_cache( $object_id, $meta_type );
				// if there's no featured image, check the parents
				if ( ! isset( $meta_cache[$meta_key] ) ) {
					// check each parent, return immediately if a featured image is found
					foreach ( get_post_ancestors( $object_id ) as $parent_id ) {
						$meta_cache = self::get_meta_cache( $parent_id, $meta_type );
						if ( isset( $meta_cache[$meta_key] ) ) {
							if ( $single ) {
								return maybe_unserialize( $meta_cache[$meta_key][0] );
							} else {
								return array_map('maybe_unserialize', $meta_cache[$meta_key]);
							}
						}
					}
				}
			}
			return $meta_data;
		}

		private static function get_meta_cache( $object_id, $meta_type ) {
			$meta_cache = wp_cache_get( $object_id, $meta_type . '_meta' );
			if ( ! $meta_cache ) {
				$meta_cache = update_meta_cache( $meta_type, array( $object_id ) );
				$meta_cache = $meta_cache[$object_id];
			}
			return $meta_cache;
		}
	}

	InheritFeaturedImage::get_instance();
}

