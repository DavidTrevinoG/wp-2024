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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/wordpress/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'wp-bd' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '<MVIy>Wck:gMUd.C1`Rzy/*t#_ia=(Db?hsUFUndBrZ,[vf$mw3RgEfa{YaUL(L>' );
define( 'SECURE_AUTH_KEY',  '8DBn6O4c[DO nB#^]?ysACR^9o)WxEwbm3bMQJR<apL#_K^X/IRACXp:=/FKOZ!4' );
define( 'LOGGED_IN_KEY',    '],_%$uu<5w{;HAp1<Y|!y,bs;aMk_](pKGDBV:Ls$m5b+tPjg>i#E@&8yckV8}DR' );
define( 'NONCE_KEY',        'FW3oE,f_B4{s1g-c7Hbng.Gl}a^C|0uS=/[Fab$f&hwpJ(|zgCX-vv:]ohi?Ea|w' );
define( 'AUTH_SALT',        'y,kk&yGT]]7,TY6O8eAy$}j?#8R&698l<Eym=~y?1Pl$kAB33*L]{OC2sOh5*Iix' );
define( 'SECURE_AUTH_SALT', 's:%]xUmybQk^9(:7e3Cm}Ll;P[J>W3u)gUrdNG+@F8dgk)n~C5~zLgY*=>>tbI}@' );
define( 'LOGGED_IN_SALT',   'P$+g8U_O*|s5S(jLTr&ovJYW7Mch>tStgxj7(bbsErE?koFin^D:pgYQI{[$J(*V' );
define( 'NONCE_SALT',       'MNe}}vLxvO^Avf[6:1/?3[%.ZAZL2H&HlC/8q(|A+m|BZ:4 l1KwNhY^0^cp)f3N' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_admin';

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
