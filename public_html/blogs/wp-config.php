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
define('DB_NAME', 'sabjionw_wp729');

/** MySQL database username */
define('DB_USER', 'sabjionw_wp729');

/** MySQL database password */
define('DB_PASSWORD', 'PS.0T]6CU6');

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
define('AUTH_KEY',         'zk9ysswgujbhirhcqsovvyuzqthkfpslq11rtrazhb1avbvokjy0wyllvsxcwqzo');
define('SECURE_AUTH_KEY',  'i8lidqvzjapilkvpeybocnr9adcqqgk940jlmkitbwamjinvjwhproea7wimlyse');
define('LOGGED_IN_KEY',    'boditw3gzygm0xfsb2wwomab30zysnchnir2crad1vaap03ordeivfqbe5d1asom');
define('NONCE_KEY',        'bf4r2r7pfsem1lcyzvrtut8zmeyiik5xucbmp7i0wdo9kayak0spilsgwfa4xp55');
define('AUTH_SALT',        'b3mobq43verck0zmlgnuopvtsl3k4kccfamytpn6bygme9y4el6nwgysrzzhpygc');
define('SECURE_AUTH_SALT', 'cextfkprenwgblcba8v6cdxoptcootbs2od183wwxxlzlh0asvjltcjjr2tzmjkb');
define('LOGGED_IN_SALT',   'nuzyvkdlyf9g4smrt35cfyj1cx1glim4ja1h95utes0zgbgbvbemlzgqbh5wxrbm');
define('NONCE_SALT',       'w5p845hqte1eleks1xjyyxtrsnytcbo4ukifospmy1kr9z0sywfd9b1tomnbrmee');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
