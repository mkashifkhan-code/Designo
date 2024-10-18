<?php
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
define( 'DB_NAME', 'designo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'jc~&$3~44Q/,|ONkvtqG|Vr7C^nk#?E`jfdD?L;|{eFR[R8hx`,dL:UXp[$SQ}V2' );
define( 'SECURE_AUTH_KEY',  '!d~mlHl!oivFe07Rz?ao,VqQpJLG[Bg61fU4w=c?8oDxK{50mm8[J^xW2-$0ogoE' );
define( 'LOGGED_IN_KEY',    'v:Y*N$!UQrY@5+S$T75N;.9JBXv.!KQ-Bq[CeA}9}IW)SX8I@x%>+}gAC2B[rjzu' );
define( 'NONCE_KEY',        ':={[ke<:rtY<XnR8/BX8P.)$n|z}qLWn^SzvLb/l*!Geo]Dsosj&SM5{ZIkHAcot' );
define( 'AUTH_SALT',        '%ER}GV5=T6BGil$j.I`v(_,7SjQs$_c/)nRL;sFfRd-kt.|!wOjh38m;}0Z-xD:e' );
define( 'SECURE_AUTH_SALT', '(0X}{6#&D!}h!A-yiac.?it(Gb=[HK=F=t>pFpQG>%Z/e*iV0QTbnb/r4!p1*GXo' );
define( 'LOGGED_IN_SALT',   '^].lD6[d4X=3m?;6aZQv@^g7Esq.94{})FLFA;p>`<d1(2a-{U:3>W>:Yur)a6oh' );
define( 'NONCE_SALT',       'lPPInNTsT3HZ2~+>p(5NC<y~K:=@;vCFEb:N^mC~xM$}#C5H,5^|wH?xU(&^31_/' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
