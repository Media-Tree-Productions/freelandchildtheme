<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '2b79fb0bac8af9c6376e5a190cae9bed6994d3424ba2d364' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z@eE&~E~{N^-8Yjh^32~|6]$Ar@O38](5Ku2Tw/;d<<A%~cfv;k9k,DG0!7zV8vQ' );
define( 'SECURE_AUTH_KEY',  'aVO14U[b!EE*#+5Kae|dPZzf{C/D-~Xy1n=|U?{9AkFQ~*3v3dXIW^8?T2.~=`GL' );
define( 'LOGGED_IN_KEY',    '(y%WN5Ej 7XiUCTBTG)Juw0EPi,A%Hv!< G*eN,%<Avv_EDFLT3ig*AU$#0km.wx' );
define( 'NONCE_KEY',        '6r xy}Au6-2GWV+];2W:KJ=0HV%2f UHcJL/RTa?LglR+HK um|&YT4Dv86U]gLX' );
define( 'AUTH_SALT',        '/9!6C#MG;W}c*gM{fQ#&5hXoj8?QH_].-;n(({k(9%KqF_p+EQA?oLL[}QM5Y,(n' );
define( 'SECURE_AUTH_SALT', ',j}nwypgV?43KY=3r/t2V$K=ndj`}CTel?dy;ui?ewT{*JbN}:N>TKN4B<KXN2zC' );
define( 'LOGGED_IN_SALT',   '@k@6xV/=:%~fS@j|3/1&k b!%oc?&*c*J6h1zhqu#P#WPl&c?m_f&Y4Y!oAl<m2Y' );
define( 'NONCE_SALT',       'AKLeWy4K9)C(Wg?:%c#dx b3]83K|D;&C0GQ@^ R_U(X|Vf|0(+|]F3(X!r7J#xA' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
