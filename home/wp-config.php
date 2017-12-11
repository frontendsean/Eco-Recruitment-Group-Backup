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
define('DB_NAME', 'db713889467');

/** MySQL database username */
define('DB_USER', 'dbo713889467');

/** MySQL database password */
define('DB_PASSWORD', 'Teamthc.1');

/** MySQL hostname */
define('DB_HOST', 'db713889467.db.1and1.com');

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
define('AUTH_KEY',         'jp,!k_k^RmC)79Xhe/qp8OYO3(s_4D-RfWU(y}8G95`H##e}W83r_w:?`u5>p07_');
define('SECURE_AUTH_KEY',  '+D.Q%j).S8IyiLy)ZL#|bG6jEAx9q=6%_3o!c2s..6M^#[Yx}ubBk2[T;,} `2vL');
define('LOGGED_IN_KEY',    'G/Dv7|<^]UlA.=]]qcw&1&uV68vVc&J,0DF1)p~)a|KNSuBf&iw%u.JRB%Ws o$L');
define('NONCE_KEY',        '&D*Msoxyg~_N(|9^>AEkX(hCavJruKX[?Ef]7C*w83y|5H58X72$2!_|~_QWELL*');
define('AUTH_SALT',        'w6(j!~o4H4e9]iC+h,9Ta,[f! SZA.ZEA@g~jKLP:lZ)4vAcJZ|_:7i/d5IWBe_`');
define('SECURE_AUTH_SALT', 'D}dSZYRSo6>Qn ;+wRevAcLA2`)oo;75JM1g>Qj*!cA ;W`p?*$B78mC&<b%j:$&');
define('LOGGED_IN_SALT',   's3^(OXU.ZEFL<B7nRKmATKh={U<kQ<=)[s8BG%(L:fJ  ~4$;PfQo9f!u1K e-7U');
define('NONCE_SALT',       'L7K.apvEF%?Yp&vPEI6}M8*8~}]{F6u^?&>cTwyQR^#R u|~HaN? !gkpu2pr4Og');

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
