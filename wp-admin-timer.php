<?php 
/*
Plugin Name: WordPress Admin Timer
Plugin URI: http://blog.rachelhendersonphotography.com/wordpress-admin-timer-plugin/
Description: Calculates and displays PHP script execution time for WordPress admin pages
Author: Jared Henderson
Version: 0.1
Author URI: http://blog.rachelhendersonphotography.com/
*/

// globally scoped variable
global $wpat_start_time;

// add our timer actions if page requested is admin
if ( is_admin() ) {
	add_action( 'plugins_loaded', 'wpat_timer_start' );
	add_action( 'shutdown', 'wpat_timer_stop' );
	add_action( 'admin_head', 'wpat_display_php_execution_time' );
}

// start the timer
function wpat_timer_start() {
	global $wpat_start_time;
	$wpat_start_time = wpat_get_mictrotime();
}

// stop the timer
function wpat_timer_stop() {
	global $wpat_start_time;
	$end_time = wpat_get_mictrotime();
	$exec_time = round( $end_time - $wpat_start_time, 5 );
	echo '<span id="wpat-exec-time" style="display:none">' . $exec_time .  '</span>';
}

// subroutine to return nicely formated time in seconds.microseconds
function wpat_get_mictrotime() {
	$timeparts = explode( ' ', microtime() );
	$microtime = $timeparts[1].substr( $timeparts[0], 1 );
	return $microtime;
}

// retrieve and display execution time
function wpat_display_php_execution_time() {
echo <<<HTML
<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function(){
		var wpat_exec_time = jQuery('#wpat-exec-time').text();
		jQuery('#site-visit-button')
			.after('<span style="margin-left:15px;font-size:.7em;color:#ddd;">'+wpat_exec_time+' sec</span>');
	});
</script>
HTML;
} 

?>