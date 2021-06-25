
Fatal error: Uncaught Error: Call to a member function get() on null in /var/www/wpadm/wordpress/wp-content/plugins/wpsso/lib/pro/review/stamped.php:38
Stack trace:
#0 /var/www/wpadm/wordpress/wp-content/plugins/wpsso/lib/loader.php(147): WpssoProReviewStamped->__construct(Object(Wpsso))
#1 /var/www/wpadm/wordpress/wp-content/plugins/wpsso/lib/loader.php(36): WpssoLoader->load_dist_modules()
#2 /var/www/wpadm/wordpress/wp-content/plugins/wpsso/wpsso.php(439): WpssoLoader->__construct(Object(Wpsso))
#3 /var/www/wpadm/wordpress/wp-includes/class-wp-hook.php(292): Wpsso->set_objects('')
#4 /var/www/wpadm/wordpress/wp-includes/class-wp-hook.php(316): WP_Hook->apply_filters(NULL, Array)
#5 /var/www/wpadm/wordpress/wp-includes/plugin.php(484): WP_Hook->do_action(Array)
#6 /var/www/wpadm/wordpress/wp-settings.php(560): do_action('init')
#7 /var/www/wpadm/wp-config.php(120): require_once('/var/www/wpadm/...')
#8 /var/www/wpadm/wordpress/wp-load.php(42): require_once('/var/www/wpadm/...')
#9 /home/jsmoriss/svn/github/surniaulula/s in /var/www/wpadm/wordpress/wp-content/plugins/wpsso/lib/pro/review/stamped.php on line 38
