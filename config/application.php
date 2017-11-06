<?php

/**
 * File: Production configuration for your WordPress application
 *
 * Your base production configuration goes in this file. Environment-specific
 * overrides go in their respective config/environments/{{WP_ENV}}.php file.
 *
 * A good default policy is to deviate from the production config as little as
 * possible. Try to define as much of your configuration in this file as you can.
 */

use Roots\WPConfig\Config;

/**
 * Custom Settings
 */
Config::define( 'AUTOMATIC_UPDATER_DISABLED', true );
Config::define( 'DISABLE_WP_CRON', env( 'DISABLE_WP_CRON' ) ?: false );

// Disable the plugin and theme file editor in the admin
Config::define( 'DISALLOW_FILE_EDIT', true );

// Disable plugin and theme updates and installation from the admin
Config::define( 'DISALLOW_FILE_MODS', true );

/**
 * Debugging Settings
 */
Config::define( 'WP_DEBUG_DISPLAY', false );
Config::define( 'WP_DEBUG_LOG', env( 'WP_DEBUG_LOG' ) ?: false );
Config::define( 'SCRIPT_DEBUG', false );

ini_set( 'display_errors', '0' );

/**
 * Prevent issues with PHP's CLI environement
 */
if ( defined( 'WP_CLI' ) && WP_CLI ) {
    $_SERVER['HTTP_HOST'] = 'host.local';
}

/**
 * Allow WordPress to detect HTTPS when used behind a reverse proxy or a load balancer
 * See https://codex.wordpress.org/Function_Reference/is_ssl#Notes
 */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}
