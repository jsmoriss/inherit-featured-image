<?php
/*
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
 * Requires At Least: 3.7
 * Tested Up To: 4.7.1
 * Version: 1.0.1-1
 * 
 * Version Components: {major}.{minor}.{bugfix}-{stage}{level}
 *
 *	{major}		Major code changes / re-writes or significant feature changes.
 *	{minor}		New features / options were added or improved.
 *	{bugfix}	Bugfixes or minor improvements.
 *	{stage}{level}	dev < a (alpha) < b (beta) < rc (release candidate) < # (production).
 *
 * See PHP's version_compare() documentation at http://php.net/manual/en/function.version-compare.php.
 * 
 * This script is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU General Public License for more details at
 * http://www.gnu.org/licenses/.
 * 
 * Copyright 2013-2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) )
        die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'InheritFeaturedImage' ) ) {

	add_filter( 'get_post_metadata', array( 'InheritFeaturedImage', 'get_post_inherited' ), 10, 4 );

        class InheritFeaturedImage {

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
							if ( $single )
								return maybe_unserialize( $meta_cache[$meta_key][0] );
							else return array_map('maybe_unserialize', $meta_cache[$meta_key]);
						}
					}
				}
			}
			return $meta_data;
		}

		private static function get_meta_cache( $object_id, $meta_type ) {
			$meta_cache = wp_cache_get( $object_id, $meta_type.'_meta' );
			if ( ! $meta_cache ) {
				$meta_cache = update_meta_cache( $meta_type, array( $object_id ) );
				$meta_cache = $meta_cache[$object_id];
			}
			return $meta_cache;
		}
	}
}

?>
