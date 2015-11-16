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
define('DB_NAME', 'genotype_carolmarch');

/** MySQL database username */
define('DB_USER', 'genotype_wpadmin');

/** MySQL database password */
define('DB_PASSWORD', 'crp5leez');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-ye[+mFn`0RDo7YR=jAbT*}A;da&;!~Vk:7Qz)!)*ut>Fv9|$o!%OO f*Z`[k-wM');
define('SECURE_AUTH_KEY',  '5:-6+zZcf7!884t}$Js_<~L9$4(5Yn8]6B,Z<snOH8Gf}`X}oxpC<q@b!*J?uP#u');
define('LOGGED_IN_KEY',    ':|S*-s:kgRtXK!#k>7IRJ>-qIx:|`UeY%C_L-0E~Mo}q=wTr4?nK+r3(a@a)`:$Y');
define('NONCE_KEY',        'Qmq-Lo<hdYkS@c?U4u_aj@Jbkg+!|k}.MS:d;8:m+G/0-f4f@ECqHLr_nA+pNq4I');
define('AUTH_SALT',        'pF{T|@ML`gQIQarHN>xO67t@vRFsXOu&-TEe>2LSH0FWJm-MX^3hv1dLAP8}uYX1');
define('SECURE_AUTH_SALT', 'x{eG/_X`TN1+w2_#[nPBo&0^WhucpNMP%n;TdU4e3~nA.6|wR@{[&XQ|Mz4/zFn<');
define('LOGGED_IN_SALT',   'Sg0K5mvpFboaejh]|-zY$GsX `[C0yREta/9(=ml@R7HTt lmg`PIusKr_f-4PyE');
define('NONCE_SALT',       'GM/0fdQ? [-UVXAxyxrAA,FtN2;?EL:|M6h:}#UvXwYnM-snie1~0&P3N-]PL8|<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
