<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
define( 'DB_NAME', 'u714551639_u473657981' );

/** Database username */
define( 'DB_USER', 'u714551639_u473657981' );

/** Database password */
define( 'DB_PASSWORD', '@MTkY!px2!Jn' );

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
define( 'AUTH_KEY',         'ggO,k^J*Ik0PQ*B!:@@vA/A36-t^t/B_@+y<!kDu/B/$n}z5bOK lA$^y6Nq+BA?' );
define( 'SECURE_AUTH_KEY',  ',7# p^(=<D5Lh.vD5zl5q{T!7D<d;(d XFlg@1|Tq`m_AhN,707E;fvOKh-kMIUi' );
define( 'LOGGED_IN_KEY',    'lNXq?(y4^y@xMRz5Nf67^+,E[<=0$,!pp- 9d}Mp9,;]t{r1Hzni5q1c3K+>aB2`' );
define( 'NONCE_KEY',        'qQ9nQexn>!,2DEI_.bx;bOSk[GFNPcX~m4v6%O~6$IY6lmo[P(~D1cVFH D*hq1s' );
define( 'AUTH_SALT',        '!/uw<G*_QT1e9d_PAj8%Kk44.8b.Q5*lJC`IN`jJua)b7~N{`r4DYi5p,%52e/*2' );
define( 'SECURE_AUTH_SALT', 't0df0)X#+Qmb#t8!RdO7hd(E.Uu-12Z4NJEVn7`D/-OsB+WmL>RkeOm[XrC(l{m]' );
define( 'LOGGED_IN_SALT',   'g?]w}>/#<9J 1{jv8wEdg9&Pr>ObNDA0-]DFm*jE:EbzL+6?]42e{7?&<-[3u7OC' );
define( 'NONCE_SALT',       '{weBrr!jl[^DD}KW5OxO>v~G-LeA_=Npf/T,.V`727CO~-j$4hI1E>K8IEX1x#I~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'vpcd_';

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
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';