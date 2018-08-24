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
define('DB_NAME', 'pelambres');

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
define('AUTH_KEY',         'L~4I>@<kdk#E,bOB)QRzc5@J]kZ!a6xeIg@E$.k=,9;PFtnURz~:f^34lq48cm%l');
define('SECURE_AUTH_KEY',  ',Ya?|(FBriC%1)7xba|$8Ei;yH%BiiSLjhB$uIhelRWDDG?S.@IOfC&x}zSz,BH$');
define('LOGGED_IN_KEY',    'jNuh]Dp3**5a,]2{(lKWgA#vDj-l|DX`#{8:%m@hQ,kWK_|_INPq0N=L$fkVwJ#=');
define('NONCE_KEY',        '|1+b7d0H2di`6_|fhS^3)bY1 C_X:@3`T!*i:+b/38cPK_(`/h<]x?nD{n?NRx<J');
define('AUTH_SALT',        ']W_5_tt|c+UfX`@(FO5,?jD3=7,$7{l|u.9n`4ZSvYeiBv?[iLy8_8OQ@TQn{@,C');
define('SECURE_AUTH_SALT', 'KS`($)nj=EzU0<-vYCNMJi0[2{9b3K`^b5AWS47l:,tXZQky~-nGe#H(KDN!f-{P');
define('LOGGED_IN_SALT',   'dZ9x+Kd?K:Z;kL8m_AYB><HlSzV@fE%u;~)##jc0d=KNxKA{`Uv|vtxw4({<N1iF');
define('NONCE_SALT',       '|?%crDYc>%xmd d(k{F{P0#3+D@oOmpwZOJ:yoF]J6u4{BSAr7k=fj]%KSsd`~JB');

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
