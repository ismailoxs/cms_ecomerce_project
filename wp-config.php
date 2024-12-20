<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressproject' );

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
define( 'AUTH_KEY',         ':vH~m/Jn8?zKVP_~cs1iyiT<!;u@W|2hbWH|L82By~Ta#-(3qeg3TjzGL.jz3vsN' );
define( 'SECURE_AUTH_KEY',  'SPf(b~SeoA~N#2`u*j`|5J:DxpBE@8C5x6~wA^n*mJ6oS,y]Oni(}KQxM8ExIFo>' );
define( 'LOGGED_IN_KEY',    'w;lq:~sD#VVU?-e:I%Dq?uV@;,x l$u2]11dPe>zrfIcg*9x%I](aL7J%gi;h.*K' );
define( 'NONCE_KEY',        '!KXJ{O2RUHV)~v|oy@mVQC#hZEO6%<D_-V#FjkR;D)_^?=o{OnGclQ:]$)_~TNFA' );
define( 'AUTH_SALT',        'w>mskaxP{Q=H|S#>x.dY[i1Cu.;1u!A*LI)S:# `MuI5HD|hyt#.eYdx4ygi^C_[' );
define( 'SECURE_AUTH_SALT', 'Wb;S/d3G6e(: &SSCINMU(l`eXGJ2|OxN6Fx;-^I~UPx/BNc cW `T.0}O9@[$@>' );
define( 'LOGGED_IN_SALT',   'J2Hj.#auot?;b%70O?V??.E*O&E2asYv4xPqu`**b,t?Md&C@[qsw[ckC7*w69DO' );
define( 'NONCE_SALT',       '!h5rl @-.pQ6N<LLM>GGhY5MT#b:v&LIsoUxihO/[kzwvLm(I{}a-V2w2VRs3nnA' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'SURECART_ENCRYPTION_KEY', 'w;lq:~sD#VVU?-e:I%Dq?uV@;,x l$u2]11dPe>zrfIcg*9x%I](aL7J%gi;h.*K' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
