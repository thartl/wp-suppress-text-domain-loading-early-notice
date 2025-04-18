<?php
/*
 * Plugin Name: Suppress Translation Timing Notice (MU‑plugin)
 * Plugin URI:  https://github.com/thartl/wp-suppress-text-domain-loading-early-notice
 * Description: Silences the “Translation loading … triggered too early” notice introduced in WordPress 6.7.
 * Version:     1.0.0
 * Author:      Tomas Hartl
 * License:     GPL-2.0-or-later
*/

namespace OsimPW\SuppressTextDomainLoadingNotice;


if ( version_compare( $GLOBALS['wp_version'], '6.7', '<' ) ) {
	return;
}

add_filter( 'doing_it_wrong_trigger_error', __NAMESPACE__ . '\\suppress_notice', 10, 4 );
/**
 * Suppress _doing_it_wrong() notice emitted when _load_textdomain_just_in_time() is triggered too early.
 *
 * @param bool   $trigger
 * @param string $function_name
 * @param string $message
 * @param string $version
 *
 * @return bool False to suppress the notice; original value otherwise.
 */
function suppress_notice( $trigger, $function_name, $message, $version ) {
	if ( '_load_textdomain_just_in_time' === $function_name && str_contains( $message, 'triggered too early' ) ) {
		return false;
	}

	return $trigger;
}
