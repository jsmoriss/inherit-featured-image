=== JSM Inherit Parent Featured Image ===
Plugin Name: JSM Inherit Parent Featured Image
Plugin Slug: inherit-featured-image
Text Domain: inherit-featured-image
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/inherit-featured-image/assets/
Tags: inherit, parent, featured, image
Contributors: jsmoriss
Requires PHP: 7.4.33
Requires At Least: 5.9
Tested Up To: 6.7.0
Stable Tag: 2.1.1

Inherit the featured image from the Post, Page, or Custom Post Type parent, grand-parent, great-grand-parent, etc.

== Description ==

If no featured image has been selected for a post, page, or custom post type, this plugin will assign the first featured image found from its parent, grand-parent, great-grand-parent, etc.

The plugin makes no permanent changes - simply deactivate the plugin to disable the automatically inherited images. ;-)

<h3>Coded for Performance</h3>

This plugin uses the WordPress `wp_cache_get()` and `update_meta_cache()` functions for maximum performance and fully integrate with WordPress core functionality.

== Installation ==

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes and/or incompatible API changes (ie. breaking changes).
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/inherit-featured-image/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/inherit-featured-image/)

<h3>Changelog / Release Notes</h3>

**Version 2.1.1 (2023/08/07)**

Maintenance release.

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* Fixed detection of invalid feature image ID values (ie. empty strings).
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.4.33.
	* WordPress v5.9.

== Upgrade Notice ==

= 2.1.1 =

(2023/08/07) Fixed detection of invalid feature image ID values (ie. empty strings).

