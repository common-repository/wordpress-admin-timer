=== WP Admin Timer ===
Contributors: jaredh123
Tags: development, timing, php, optimization
Requires at least: 2.7
Tested up to: 2.8.3
Stable tag: trunk

Displays the time in microseconds that PHP took to create an admin page.  Used for theme and plugin development, to optimize PHP.

== Description ==

Displays the time in microseconds that PHP took to create an admin page.  Used for theme and plugin development, to optimize PHP.  Uses Javascript to display the execution time in the upper left of the admin screen.  Creates some invalid HTML, but this is only for testing and dev purposes.  Technically it's not recording the PHP execution for the entire operation because the timer starts at the first available plugin hook, so some PHP core functions and processes have already occured, but you can't optimize these anyway.

== Installation ==

1. Upload `wp-admin-timer` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. View the execution time in the upper left of each admin screen, next to "visit site" button

== Screenshots ==

1. Displays execution time next to "visit site" button