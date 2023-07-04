<?php
/*
 * Plugin Name: JSM Inherit Parent Featured Image
 * Text Domain: inherit-featured-image
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/inherit-featured-image/
 * Assets URI: https://jsmoriss.github.io/inherit-featured-image/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Description: Inherit the featured image from the Post, Page, or Custom Post Type parent, grand-parent, etc.
 * Requires PHP: 7.2.34
 * Requires At Least: 5.5
 * Tested Up To: 6.2.2
 * Version: 2.0.0
 *
 * Version Numbering: {major}.{minor}.{bugfix}[-{stage}.{level}]
 *
 *      {major}         Major structural code changes and/or incompatible API changes (ie. breaking changes).
 *      {minor}         New functionality was added or improved in a backwards-compatible manner.
 *      {bugfix}        Backwards-compatible bug fixes or small improvements.
 *      {stage}.{level} Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).
 *
 * Copyright 2013-2023 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

        die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'InheritFeaturedImage' ) ) {

        class InheritFeaturedImage {

		private static $instance = null;	// InheritFeaturedImage class object.

		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'init_textdomain' ) );

			add_filter( 'update_post_metadata', array( __CLASS__, 'update_post_metadata' ), 10, 5 );

			add_filter( 'get_post_metadata', array( __CLASS__, 'get_post_metadata' ), 10, 4 );
		}

		public static function &get_instance() {

			if ( null === self::$instance ) {

				self::$instance = new self;
			}

			return self::$instance;
		}

		public function init_textdomain() {

			load_plugin_textdomain( 'inherit-featured-image', false, 'inherit-featured-image/languages/' );
		}

		public static function update_post_metadata( $check = null, $obj_id, $meta_key, $meta_value, $prev_value ) {

			if ( '_thumbnail_id' !== $meta_key ) {

				return $check;
			}

			if ( '' === $prev_value ) {	// No existing previous value.

				foreach ( get_post_ancestors( $obj_id ) as $parent_id ) {

					$metadata = self::get_meta_cache( $parent_id, 'post' );

					if ( ! empty( $metadata[ $meta_key ][ 0 ] ) ) {	// Parent has a meta key value.

						$parent_value = maybe_unserialize( $metadata[ $meta_key ][ 0 ] );

						if ( $meta_value == $parent_value ) {	// Allow integer to numeric string comparison.

							return false;	// Do not save the meta key value.
						}
					}
				}
			}

			return $check;
		}

		public static function get_post_metadata( $meta_data, $obj_id, $meta_key, $single ) {

			if ( '_thumbnail_id' !== $meta_key ) {

				return $meta_data;
			}

			$metadata = self::get_meta_cache( $obj_id, 'post' );

			/*
			 * If the meta key already has a value, then no need to check the parents.
			 */
			if ( ! empty( $metadata[ $meta_key ] ) ) {

				return $meta_data;
			}

			/*
			 * Start with the parent and work our way up - return the first value found.
			 */
			foreach ( get_post_ancestors( $obj_id ) as $parent_id ) {

				$metadata = self::get_meta_cache( $parent_id, 'post' );

				if ( ! empty( $metadata[ $meta_key ][ 0 ] ) ) {	// Parent has a meta key value.

					if ( $single ) {

						return maybe_unserialize( $metadata[ $meta_key ][ 0 ] );
					}

					return array_map( 'maybe_unserialize', $metadata[ $meta_key ] );
				}
			}

			return $meta_data;
		}

		private static function get_meta_cache( $obj_id, $meta_type ) {

			/*
			 * Retrieves the cache contents from the cache by key and group.
			 *
			 * WordPress stores data using a post, term, or user ID, along with a group string.
			 *
			 * Example: wp_cache_get( 1, 'user_meta' );
			 *
			 * Returns (bool|mixed) false on failure to retrieve contents or the cache contents on success.
			 *
			 * $found (bool) Whether the key was found in the cache (passed by reference) - disambiguates a return of false.
			 */
			$metadata = wp_cache_get( $obj_id, $meta_type . '_meta', $force = false, $found );

			if ( $found ) {

				return $metadata;
			}

			/*
			 * Updates the metadata cache for the specified objects.
			 *
			 * $meta_type (string) Type of object metadata is for. Accepts 'post', 'comment', 'term', 'user',
			 * or any other object type with an associated meta table.
			 *
			 * Returns (array|false) metadata cache for the specified objects, or false on failure.
			 */
			$metadata = update_meta_cache( $meta_type, array( $obj_id ) );

			return $metadata[ $obj_id ];
		}
	}

	InheritFeaturedImage::get_instance();
}
