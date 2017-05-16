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
Requires At Least: 3.7
Tested Up To: 4.7.5
Stable Tag: 1.0.2

A WordPress plugin to inherit the featured image of the Post / Page parent, grand-parent, etc.

== Description ==

*If no featured image has been defined* for a post / page / custom post type, then the plugin assigns a featured image from the parent, grand-parent, etc.  To override the inherited featured image, simply use the 'Add Media' button and its 'Set Featured Image' feature.

The plugin hooks into the 'get_post_metadata' WordPress filter, so featured images are assigned dynamically &mdash; disable the plugin to remove the dynamically assigned featured images. The plugin also uses the WordPress `wp_cache_get()` and `update_meta_cache()` functions to integrate fully with core WordPress functionality.

<blockquote>
<p>There are no plugin settings &mdash; simply install and activate the plugin.</p>
</blockquote>

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

1. Download the plugin archive file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the zip file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

== Changelog ==

= Repositories =

* [GitHub](https://jsmoriss.github.io/inherit-featured-image/)
* [WordPress.org](https://wordpress.org/plugins/inherit-featured-image/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 1.0.2 (2017/04/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Maintenance release - update to version numbering scheme.
	* Dropped the package number from the production version string.

== Upgrade Notice ==

= 1.0.2 =

(2017/04/08) Maintenance release - update to version numbering scheme.

