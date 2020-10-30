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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sm_blogy' );

/** MySQL database username */
define( 'DB_USER', 'solomasaje_faus2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'tgMr0LP5S6g3KyoC' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k=vEQ|C/>}|Imfh3{qRitFgAXV[AmorKhcrim`e7V^e[Dw :kC[vXxUB*#uGV1:E' );
define( 'SECURE_AUTH_KEY',  '~1hr2D02dq?mdq&~_u*6[2X*XQt6wkap>x=glFv$im|RF9b,p:aZ/p8TNGG1DgJ,' );
define( 'LOGGED_IN_KEY',    'OMA/;8F&y(xf$;eO6>dp0p|?`c_swaSjQ[a7c:U&CJGyma8Mug~#3{:(q-6:D3UB' );
define( 'NONCE_KEY',        'vGk|;LkKROGyag7q0,&FinK/Yl/MXf0TR x_C J+$T1vH[KK-~j;Cmjw6ywO2^5 ' );
define( 'AUTH_SALT',        'KSCpf0)B.dHeuS>XCW<?yHL!NsIduRf)cmWTvA(d4zbE(t<L?p yH^+>Xu!AG~w%' );
define( 'SECURE_AUTH_SALT', '52i.r=}P~Rlck&R.g7+4L;lA5`aLo0jEog{4AEIPCs v 1|cyu!K?V.@IR5S+cWz' );
define( 'LOGGED_IN_SALT',   'Fr[PzOlWm0`9VB!`(,L*LQ|Ec(5dHp1^mO/jl!_m:4F+{_l{@?5TO_Mlw*mdX)r]' );
define( 'NONCE_SALT',       '^?&ITYT0p+NHcF&?nkPFjAUX`/~8OQ7qidKI:blW3]llBQ(2.XyF!KF,6O&Yu?7H' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'blpw_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
