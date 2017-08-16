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
define('DB_NAME', 'sitedoempreendedor-nexti');

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
define('AUTH_KEY',         '~,34r] q_Zz82@Bt<LuvX9P#XvhQewQxjT&1PlMj)zrE={c%dCN!UoQwI>W2E5&v');
define('SECURE_AUTH_KEY',  'AjkgFL jimK#U>+ksc,|%LneU83)A{)5k3PJgy@V8j&7wxxG:n)y.aa[H9!XJPmX');
define('LOGGED_IN_KEY',    '+RbXZzDFb6s|S.f090!2i,s4F8RmRIG#n_5}h6=+j*/0Gz}]N4A3>$V4e<)Fuq*8');
define('NONCE_KEY',        'be(DxZZp}hzbA_BEYzo{/z#C^q6qfpTZgfoT2x9&%xo+9l|Q=&Q!A|+l8@4Tm`!3');
define('AUTH_SALT',        'kY@3$PBCbcr#=OSOEJ<N r7FJmvy8r(SU=xL^$p&[{AsOuU(L4lr?m{ETMgb[Z}v');
define('SECURE_AUTH_SALT', 'gXhO(G5;{e#z-7f5o?F|Qf4D2qIYwQ7Y$)kv$3gy4&9@T_fl.*}v|)Sn|DtZHFxJ');
define('LOGGED_IN_SALT',   't_]u<l$;}qYJ@ly~}r%9f&*B+UQd9KOH~nMIlgEbI&[{w|8**~kd1B#bOq#Sn(n+');
define('NONCE_SALT',       'iT{k~x!jC{iH~ztZL{p&S(S}$$@%c7p]6^BBfIWyNH^o  ik 4~)Uq5DEQ;qTn7T');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pt_';

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

define('WP_HOME', 'http://localhost:81/sitedoempreendedor-nexti');
define('WP_SITEURL', 'http://localhost:81/sitedoempreendedor-nexti');

/* That's all, stop editing! Happy blogging. */
define('WP_TEMP_DIR', sys_get_temp_dir());

define('DISALLOW_FILE_EDIT',false);


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD','direct');
