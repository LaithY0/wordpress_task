<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']DcUg?v^u}5Y?KCeivJ/S$z&1Xw_(7X*7]fp3;C|mukKz>u/h)Y5IBubH{VP.TtH' );
define( 'SECURE_AUTH_KEY',  ':n{I_:<Rr(ctH~?byrOh<_)!aegVZh?6mz1B0YpKA&;A#=CJhW<<?HjU9!?=!t@D' );
define( 'LOGGED_IN_KEY',    '.U}ShU^#QY8G1PK^7_{-akT?}Xhw4iMVLk)CqnxIG)GouBAx=3{y{x),#:_hSh;+' );
define( 'NONCE_KEY',        ']7YEdZ6$hl}#{Jwv!K~rWd>%rK#_2;Ytd$Tl+dhvHPROv1](+gP/~_V,A?e$lzUQ' );
define( 'AUTH_SALT',        '*aD]9HR!90*cs>F[FlS6EyBS@4yGT$iI~V/AgPXPl!,Mp#x<)<:8:yP2.MU5m+Rh' );
define( 'SECURE_AUTH_SALT', 'uONhR(By,1@21pQV^%ZTMEG >0lw!<=af9N2=pg*SMT$!pA,H.Z>nzh]qiyl-GAf' );
define( 'LOGGED_IN_SALT',   '?LTB&)UmbdTXPAcjKd4&|v|u^0e.,D7k)6m9LL~~$x`5|j#wPopGvwzG/v4c42.L' );
define( 'NONCE_SALT',       'P;Ty+a7]V3zTr?&J.-hJ_/(knwMRfEshMe(Z*G;:.i:x>?m`D;XO}|.#e`6:]{@@' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
