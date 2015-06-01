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
define('DB_NAME', 'aevitasvwyf_db53');

/** MySQL database username */
define('DB_USER', 'clienfvwyf_53');

/** MySQL database password */
define('DB_PASSWORD', 'HepSU6i8');

/** MySQL hostname */
// define('DB_HOST', 'localhost');
define('DB_HOST', 'dedi95.flk1.host-h.net');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');



$redis_server = array( 'host' => '127.0.0.1',
                       'port' => 6379,
                       );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'z+jFF)s~_9~qnQ6Tvh4@$L7tfwFV4ZTu&-io0K{F (Y,>k*+wINmL!+ m.PT[1>I');
define('SECURE_AUTH_KEY',  'Za@+!iQI^m/ GZo,XX;^1+(LMMb+H*fJ.i6F+wRM[$j/l 9^!(S|a`OXH2Shi%[,');
define('LOGGED_IN_KEY',    'Lgg@x0`6GNgN#eq2-tDjx>wYYpA9S!xx*|^#.vQo;~>Jw-,Ml8KvjNzY||n-n4Wa');
define('NONCE_KEY',        '%5g-hd931{tUW}1W&Z38+{|dd;n&g|I/PIDJ~|C9m9>^!25XlbByQ.`x-3K?ZVvX');
define('AUTH_SALT',        'W`~s`>},O_t9eW4N@tuiyQ4&q8T4x^79mM`Z`dCES+|80yJL5P>uu|q)reAEVGi>');
define('SECURE_AUTH_SALT', ';QB2I~ht13#C]xq>b?WiLB5x9mYY8P$eTU0RMpk>3-wnq0ir>l.eeJ(}|6z@|(tk');
define('LOGGED_IN_SALT',   '6{tilVk@E<QL|i,k9RmIZl9{*xI-h#13n-YHVu<h|O.|@!]UqarZAix}oW&NT,jm');
define('NONCE_SALT',       'Z&G=9x:De,L>$`(mT/WjT).ql9EI>EDk`|69&^xrq`@{GIh@/!g++K1gaKkT5 f2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
