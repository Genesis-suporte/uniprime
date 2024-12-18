<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
/*define( 'DB_NAME', 'genesiscreative_unip' );

define( 'DB_USER', 'genesiscreative_unip' );

define( 'DB_PASSWORD', '9v$K#DG8iB]D' );

define( 'DB_HOST', 'localhost' );
*/
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'uniprime' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'secret' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '#2Vtsf[gWv/8$]iF<XbK2tm`%+r5_()R39g}&V#^iB_g`ryZ/h+ib`}EKKE _GRq' );
define( 'SECURE_AUTH_KEY',   'MWr1^S-h$b*#Idkk]w0V$yC2si8xyTQhl7SJt8J(Gl.%sv@N&F^|b4m?&nUnKYFt' );
define( 'LOGGED_IN_KEY',     'o~Mgd>PWp/#s8=]=1wJ8.RSf^<CQsIO1oqpOV=+X9a9nt@T>6CLM=F~_MN_3|e>V' );
define( 'NONCE_KEY',         'HmkgqtPY(K3f$kM2G84(U~y%~cMZ H<.x+1kJd,.&.#uv40{`Rm,D@H!lKi6=Vvh' );
define( 'AUTH_SALT',         's.2;SY5k8&dy3k({6aVSjV_]g85Byd?3gf5g2CjQ:Ldzm+/ C.|zRj<&E;^$dGLJ' );
define( 'SECURE_AUTH_SALT',  'X{IAQ&x(h]j*Mq)5wyYtqKj?i4&3=AWQ=`[&x`B) Y-&2_`%bDeFa7Zl}S;(xs=8' );
define( 'LOGGED_IN_SALT',    '8|O$(XppQFAVxlSv?{Gb23Kt1w4lP-f78&c@oBTDOG:jqgqnK=lY|!h]E:I[Se7W' );
define( 'NONCE_SALT',        '_-y:I3Ptq&UWWx_ii_g(iS.5Ac|[!)T}F0j]@)e>rT=* [o|W54wDJc:VuJ*qJnA' );
define( 'WP_CACHE_KEY_SALT', 'ivBax`Wh;{U-yL^V m2yC?S]q/gFj>*uiO$Hoh~Qv:W:]n+$o;UWvcJ*/%Z!J^jH' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
/*if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}*/
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);


define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
// $base = '/';
define( 'DOMAIN_CURRENT_SITE', 'uniprime.test' );
// define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

// define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
