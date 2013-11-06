<?php
/**
 * The base configurations of the WordPress. [ DEV AND STAGING ONLY ]
 *
 * @package WordPress
 * @author  Edited by: The Locial Network
 * @link    http://abandon.ie/wordpress-configuration-for-multiple-environments
 */

// Define Environments - may be a string or array of options for an environment
$environments = array(
	'development' => 'dev.',
	'staging'     => 'staging.',
);

// Get Server name
$server_name = $_SERVER[ 'SERVER_NAME' ];

foreach ( $environments as $key => $env ) {
	if ( is_array( $env ) ) {
		foreach ( $env as $option ) {
			if ( stristr( $server_name, $option ) ) {
				define( 'ENVIRONMENT', $key );
				break 2;
			}
		}
	}
	else {
		if ( stristr( $server_name, $env ) ) {
			define( 'ENVIRONMENT', $key );
			break;
		}
	}
}

// If no environment is set, try to look again using key, if no key then display error message
if ( !defined( 'ENVIRONMENT' ) ) {
	if ( $key ) {
		define( 'ENVIRONMENT', $key );
	}
	else
		echo "Failure to Launch.";
}

// Define different DB connection details depending on environment
switch ( ENVIRONMENT ) {

case 'development':
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );

	break;

case 'staging':
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );

	break;
}

if ( !defined( 'DB_CHARSET' ) )
	define( 'DB_CHARSET', 'utf8' );

if ( !defined( 'DB_COLLATE' ) )
	define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 */

// FIX ME
if ( !defined( 'AUTH_KEY' ) )
	define( 'AUTH_KEY', '' );

if ( !defined( 'SECURE_AUTH_KEY' ) )
	define( 'SECURE_AUTH_KEY', '' );

if ( !defined( 'LOGGED_IN_KEY' ) )
	define( 'LOGGED_IN_KEY', '' );

if ( !defined( 'NONCE_KEY' ) )
	define( 'NONCE_KEY', '' );

if ( !defined( 'AUTH_SALT' ) )
	define( 'AUTH_SALT', '' );

if ( !defined( 'SECURE_AUTH_SALT' ) )
	define( 'SECURE_AUTH_SALT', '' );

if ( !defined( 'LOGGED_IN_SALT' ) )
	define( 'LOGGED_IN_SALT', '' );

if ( !defined( 'NONCE_SALT' ) )
	define( 'NONCE_SALT', '' );

/**
 * WordPress Database Table prefix.
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if ( !isset( $table_prefix ) ) $table_prefix = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if ( !defined( 'WPLANG' ) )
	define( 'WPLANG', '' );

/**
 * For developers: WordPress debugging mode.
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ( !defined( 'WP_DEBUG' ) )
	define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
