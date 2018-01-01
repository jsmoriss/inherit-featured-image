=== JSM's Inherit Parent Featured Image ===
Plugin Name: JSM's Inherit Parent Featured Image
Plugin Slug: inherit-featured-image
Text Domain: inherit-featured-image
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/inherit-featured-image/assets/
Tags: inherit, parent, featured, image
Contributors: jsmoriss
Requires PHP: 5.4
Requires At Least: 3.8
Tested Up To: 4.9.1
Stable Tag: 1.1.0

A WordPress plugin to inherit the featured image of the post / page parent, grand-parent, etc.

== Description ==

**A WordPress plugin to inherit the featured image of the post / page parent, grand-parent, etc.**

If no featured image has been defined for a post / page / custom post type, then the plugin assigns a featured image from the parent, grand-parent, etc. To override the inherited featured image, simply use the 'Add Media' button and the 'Set Featured Image' feature.

The plugin hooks into the 'get_post_metadata' WordPress filter, so featured images are assigned dynamically &mdash; disable the plugin to remove the dynamically assigned featured images.

The plugin also uses the WordPress `wp_cache_get()` and `update_meta_cache()` functions to fully integrate with WordPress core functionality.

There are no plugin settings &mdash; simply install and activate the plugin.

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. In the *Search* box, enter the plugin name.
1. Click the *Search Plugins* button.
1. Click the *Install Now* link for the plugin.
1. Click the *Activate Plugin* link.

= Semi-Automated Install =

1. Download the plugin ZIP file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the ZIP file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

<h3>Frequently Asked Questions</h3>

* None

== Other Notes ==

<h3>Additional Documentation</h3>

* None

== Screenshots ==

== Changelog ==

<h3>Repositories</h3>

* [GitHub](https://jsmoriss.github.io/inherit-featured-image/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/inherit-featured-image/)

<h3>Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Changelog / Release Notes</h3>

**Version 1.1.0 (2017/09/24)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Added class __construct(), get_instance(), and load_textdomain() methods.

== Upgrade Notice ==

= 1.1.0 =

(2017/09/24) Added class __construct(), get_instance(), and load_textdomain() methods.

