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
define( 'DB_NAME', 'birn' );

/** Database username */
define( 'DB_USER', 'JCM' );

/** Database password */
define( 'DB_PASSWORD', '007' );

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
define( 'AUTH_KEY',         '4;><eFXvOSfG{$Y1-^>&vU=aaNj02U`=x9U+yhN.5WfrG3#SF/N*f;Qvjj:>)Y|<' );
define( 'SECURE_AUTH_KEY',  'exmu&$HX|N%dBZ5dB,:}[H||V9JdvCzSQ 1xIb+ydSGP_U`M%=(Z-`iL~}?:Boey' );
define( 'LOGGED_IN_KEY',    '}vVdaYDqmeeAILi[Psau _Lq5IIy9Fu`Gq(bN?}I$N)PJ3,&SC_tO ez7)~g$4EF' );
define( 'NONCE_KEY',        'q|Xi^+K@Ew~>k@D%c^S+z)s5b_m6wcM[gA_zl^pQQy*Z%3J+1|)sC,:9dn^mSM<4' );
define( 'AUTH_SALT',        '_(=Kg02*#ZeF,|%rczBm|&KDArZK|~-`g7bX4N(b}i N1Hm%$&M4AeCh,Ct+UR[K' );
define( 'SECURE_AUTH_SALT', 'UDg+KNvz%Xl:9TaUdt/zZ4TG=-b44^}FuVD+/L{5+J?aZS$m@jN|`#JeTH2TV[&|' );
define( 'LOGGED_IN_SALT',   'x@8!#W@R/W?1-q6yOvQUtyfd<KP,4c<,K]$cNU8d)B%)vr&{g}Q1eh~D/ DkFn8#' );
define( 'NONCE_SALT',       'Az+b9CB `v=G40bu-}DSuQ?3h|.}yr3sk1@4f@[:kQ^e/o9^CWVZv&>l<>x-(C`-' );

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
