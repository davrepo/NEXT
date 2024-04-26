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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ':SFfR/m/weodr7<+4=&fmZJ-e)6M<BAn0y-kh]]Cd|0jjwg:X!@u%T{ZG+tc{_kS' );
define( 'SECURE_AUTH_KEY',   '!*#tECz7,Jk+rl#[{38wlujR`SYkCian(;z$mfXUP*ofg[a7jT)#;s[l}I4B:DU4' );
define( 'LOGGED_IN_KEY',     ']/!D<y`[s}dcWA-5Pz1 4Po7O)Ld}f6jfo3FCh{:f[;7}l$_!w{2HoXz![dX7*s&' );
define( 'NONCE_KEY',         '&Vv6?(b51Zl48f~@NXaHLegRcmPJ{.y=IbxEC,<NzcRBe&n/qy}`&w+zqO:m2XY ' );
define( 'AUTH_SALT',         '}cNKYKpDow ]W$xlv^:6w<!fKxB~ppc9+.*}QyO%[^,B:D 7G6taxg[RDsK2N/-;' );
define( 'SECURE_AUTH_SALT',  '@zWl<75^7bi .(B@UOtq)cWGW,)BSrLKcbvH)~(G2j<o=na~oOowexcVz0DY9&zr' );
define( 'LOGGED_IN_SALT',    'kX6=X#U40G[P0JJ-xo`aCuv~$vkL8KW0oB0AD4Tq3Z^(kh2dS@5^.I]^| -~GyA(' );
define( 'NONCE_SALT',        '+FLbV;e[e[*e>=8T?[&} ,?b*|p`^Ha:gM:Rni3d^l3jWeN!$WhE5!17{68deMYb' );
define( 'WP_CACHE_KEY_SALT', '=ULC-P/,36>VfXxSf=PsG+;r<OZrOpP*p|-#Fs~^{>v}-n)|4v@7BTE,,~?8 <Wz' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
