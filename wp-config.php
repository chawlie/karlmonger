<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'karlmonger');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '}0B4%2vT+_%[!;9p0lYK-7uY54g.V+[@M[vl9pUDVKt0s4zETh*UyfF$dCsPny@~');
define('SECURE_AUTH_KEY',  ']Vp&|wN[[d$O3|tl,+T4=oGb,0f24&+w[6I~r!-ml.%Cp{yClv-UxgyY*P+9}jG|');
define('LOGGED_IN_KEY',    '8+WV|h5(|a,ZcF.:g;#(%cjX^aG|DPp.0]mMRJj6X-D!#z:6E RDa?_HM$NV8!tF');
define('NONCE_KEY',        'Myy*t)[,A#{~^:XHboL5`JN5uhkO8;Ru4;)J!Gg9-~`7l<,c~z>.Jgd,H~|u]*+>');
define('AUTH_SALT',        '7C~~=&?_dTOT%+@vs|/ xH z<H*$U94>{;K+|l&5KA*<MUA}^Z|;X#,_}cCt+[<z');
define('SECURE_AUTH_SALT', '.WXl>G1BtsN5[sN|[u3qp9F)I::g bb(f_!FKOj>?rJaTS5vd+cJBn12IZ|nJr(7');
define('LOGGED_IN_SALT',   ']iy:nzmKK8,8%9F`/c.lvU7L;`Z$@JEXo-6`9UQs1U=Ml@,y;+cSlfFUTYXG<hy4');
define('NONCE_SALT',       'QkB[:dE>$9m{y^Rc2r3U}mT:rLUaKz3oR7h6zgG]c-_#G{&PsJKk|cP51v5DDC~V');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
