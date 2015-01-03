<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'databases');

/** MySQL database username */
define('DB_USER', 'scoulton');

/** MySQL database password */
define('DB_PASSWORD', 'r8181055');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '@4XfwC]Xn=7X/SO=4|&!.*$6Ti@.qBiD7v*C}&e&>;`.`/htN4ej>Jk;O;BTB8:F');
define('SECURE_AUTH_KEY',  'DnxaOfAE2NAYWPd*1]cz@Q1KF?#]0/;KN+OAcoR U$IRFJ!/vtSei)k ?GT38.Ya');
define('LOGGED_IN_KEY',    'Q?+Pxfh5Ok8!&&aJ*fl[F|OU({iz&jb.T<$5@7_?~A8y]BQa9AV6a-gaV$n]RmI~');
define('NONCE_KEY',        'S /6N=bbN-w)x_HHE?Lh:7K,:.)uG[?$hV)0f3MA*Zuq<i$kxwQ`*}8<-OM>(#D#');
define('AUTH_SALT',        '4f<^Zn]^t*~sd5%jI@3qVy4ndV;Kp4>r=AbVHb4n|@]@sU2<-SEUGeY[79$hTFE,');
define('SECURE_AUTH_SALT', '&f#:!5B9z&4dnK4weDF;7[sK0(RLD Liz~qc.qjUDsm)=_/~P<C6mWHk8AiPI;9%');
define('LOGGED_IN_SALT',   '!LOn&k&SF<ySac#~EGKrYyf]U295Z{wV<TecPopLdK4S1A.ZC;`&QXqN8@1fS%ye');
define('NONCE_SALT',       '--(#OuB)GnE4&0rVl^*e%5Z{ZQSetc`EC*B-;My8+25-h&1N8o,I=(t<jBbOGnjy');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ic_blog_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
