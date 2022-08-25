<?php

/**
 * File: Base configuration for WordPress
 *
 * This file is the equivalent of a classic wp-config.php.
 */

use Roots\WPConfig\Config;

use function Env\env;

use const Jazz\APP_PUBLIC_PATH;

/**
 * URLs
 */
Config::define( 'WP_HOME',    env( 'WP_HOME' ) );
Config::define( 'WP_SITEURL', env( 'WP_SITEURL' ) );

/**
 * Content Directory
 */
Config::define( 'WP_CONTENT_DIR', APP_PUBLIC_PATH );
Config::define( 'WP_CONTENT_URL', Config::get( 'WP_HOME' ) );

/**
 * Database Settings
 */
Config::define( 'DB_NAME',     env( 'DB_NAME' ) );
Config::define( 'DB_USER',     env( 'DB_USER' ) );
Config::define( 'DB_PASSWORD', env( 'DB_PASSWORD' ) );
Config::define( 'DB_HOST',     ( env( 'DB_HOST' ) ?? 'localhost' ) );
Config::define( 'DB_CHARSET',  ( env( 'DB_CHARSET' ) ?? 'utf8mb4' ) );
Config::define( 'DB_COLLATE',  ( env( 'DB_COLLATE' ) ?? '' ) );
Config::define( 'DB_PREFIX',   ( env( 'DB_PREFIX' ) ?? 'wp_' ) );

$table_prefix = Config::get( 'DB_PREFIX' );

if ( env( 'DATABASE_URL' ) ) {
    $dsn = (object) parse_url( env( 'DATABASE_URL' ) );

    Config::define( 'DB_NAME',     substr( $dsn->path, 1 ) );
    Config::define( 'DB_USER',     $dsn->user );
    Config::define( 'DB_PASSWORD', $dsn?->pass );
    Config::define( 'DB_HOST',     ( isset( $dsn->port ) ? "{$dsn->host}:{$dsn->port}" : $dsn->host ) );
}

/**
 * Authentication Unique Keys and Salts
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service
 * @link https://roots.io/salts.html Roots' WordPress secret-key service
 */
Config::define( 'AUTH_KEY',         env( 'AUTH_KEY' ) );
Config::define( 'SECURE_AUTH_KEY',  env( 'SECURE_AUTH_KEY' ) );
Config::define( 'LOGGED_IN_KEY',    env( 'LOGGED_IN_KEY' ) );
Config::define( 'NONCE_KEY',        env( 'NONCE_KEY' ) );
Config::define( 'AUTH_SALT',        env( 'AUTH_SALT' ) );
Config::define( 'SECURE_AUTH_SALT', env( 'SECURE_AUTH_SALT' ) );
Config::define( 'LOGGED_IN_SALT',   env( 'LOGGED_IN_SALT' ) );
Config::define( 'NONCE_SALT',       env( 'NONCE_SALT' ) );
