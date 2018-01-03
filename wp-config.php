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
define('DB_NAME', 'freemite_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '&sZ/~!AW.XjGWtBB=KHl%[f!VIN^9EK^zNh1yF$ hAcLs}Q5syy# F|fJb$1ed*9');
define('SECURE_AUTH_KEY',  'LoXzHs}T!2P342/?JM;I|vI3wzKhlI4I)T>Ba8V.vl#VZsJJ_@; Qa#831Gm^(nS');
define('LOGGED_IN_KEY',    '2eHg`b) 0$~<C7TMtwJ3jDMLb1@FM9gVn?8c*pP6%Zs_cUFmev8ON7Zxem_RH32+');
define('NONCE_KEY',        '%H$)ZSy!8ye] Zcz_(c,H7)Z(Dm2zaAiXTo$D`Zp8J@{V$aXi SVtW6/c7&f!s1c');
define('AUTH_SALT',        '`%aB}?|tsaFfU2ee%/S.LVCoRC(lsmy#:<=ii3ETqUy|zPHVB%tX4SH&MN6NfN3u');
define('SECURE_AUTH_SALT', '#!Dpe+h6+B)B/([/;TptutkdRZ3A*cM~!].oot6GX,!e=Pav&xJ.wnJuaZ%=6x[#');
define('LOGGED_IN_SALT',   '}Q*.A6XwU>E~log^%#fW~ySgpy[Q*7AXYI76vs#Xtr[UQ}I}c@v!5PtN[Fqgt%CC');
define('NONCE_SALT',       'fIhAaqr2tJgzQ(#T@{7_!pW_K9CEg#iaa68.9e+5#_,<D @}mU.NMA~6-4d<8gqh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'alm_';

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
