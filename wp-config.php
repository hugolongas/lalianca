<?php
define('WP_CACHE', true);
/** 
 * Les configuracions bàsiques del WordPress.
 *
 * Aquest fitxer té les següents configuracions: configuració de MySQL, prefix de taules,
 * claus secretes, idioma del WordPress i ABSPATH. Trobaràs més informació 
 * al Còdex (en anglès): {@link http://codex.wordpress.org/Editing_wp-config.php Editant
 * el wp-config.php}. Les dades per a configurar MySQL les pots obtenir del
 * teu proveïdor d'hostatjament de web.
 *
 * Aquest fitxer és usat per l'script de creació de wp-config.php durant la
 * instal·lació. No cal que usis el web, pots simplement copiar aquest fitxer
 * sota el nom "wp-config.php" i omplir-lo amb els teus valors.
 *
 * @package WordPress
 */

// ** Configuració de MySQL - Pots obtenir aquestes informacions del teu proveïdor de web ** //
/** El nom de la base de dades per al WordPress */
define('DB_NAME', 'lalianca_old');

/** El teu nom d'usuari a MySQL */
define('DB_USER', 'lalianca');

/** La teva contrasenya a MySQL */
define('DB_PASSWORD', 'sauna92alianca');

/** Nom del host de MySQL */
define('DB_HOST', 'localhost');

/** Joc de caràcters usat en crear taules a la base de dades. */
define('DB_CHARSET', 'utf8mb4');

/** Tipus d'ordenació en la base de dades. No ho canvïis si tens cap dubte. */
define('DB_COLLATE', '');

/**#@+
 * Claus úniques d'autentificació.
 *
 * Canvia-les per frases úniques diferents!
 * Les pots generar usant el {@link http://api.wordpress.org/secret-key/1.1/salt/ servei de claus secretes de WordPress.org}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '.N}EKx9V^0e-J]4I/|eNltVd:6Lb,C^[6{Tto2.WJKR&J[[z?;Z^F9-TX_V{qba ');
define('SECURE_AUTH_KEY', 'odIr^_?c3ty5D2|CqhkbFk*.0KjKjd/`;%hDXA@zLT$ 9Zv?WWr!@wb;^LM_!GvM');
define('LOGGED_IN_KEY', '( AmhGU~ dlp37:kz Nk}Z8q<&+@$SIB.e>vWu6Vt3jq1%uV(k2lxJYEn|VK1u>I');
define('NONCE_KEY', ',HfdE/N1<p;]RQAZ_*NHx+=ln~L$gP<KIHTL{4g?#N{KhI-N6G5_8*`)j!;y_>)|');
define('AUTH_SALT',        '1I;(~`Tvn^F8I>6;}I75RhLY8o>#Q<>9odt9Bg}+,RZY#}~L3Bn&Y|rko0_(pGK<');
define('SECURE_AUTH_SALT', 'CjA7GkYUFY?K6WKXyqmYPzgKo`9>88.T)T>md93~4je%EdvDgOoPEnML.SDzaay*');
define('LOGGED_IN_SALT',   'W,Yrj8-q/b}XM/_H<i6gUTql$b &<|E-bZ8sp(];/5X?W?9t!`7!qub: |ir]_d4');
define('NONCE_SALT',       'V(i#5HA(|om8[$7_.wt2_H6*wOrckMmBXKW/Ka S#A5qk.e6(}:~7XX62i&SgKp=');
/**#@-*/

/**
 * Prefix de taules per a la base de dades del WordPress.
 *
 * Pots tenir múltiples instal·lacions en una única base de dades usant prefixos
 * diferents. Només xifres, lletres i subratllats!
 */
$table_prefix  = 'wp_';


/**
 * Per a desenvolupadors: WordPress en mode depuració.
 *
 * Canvieu això si voleu que es mostren els avisos durant el desenvolupament.
 * És molt recomanable que les extensions i el desenvolupadors de temes facien servir WP_DEBUG
 * al seus entorns de desenvolupament.
 *
 * Per informació sobre altres constants que es poden utilitzar per depurar,
 * visiteu el còdex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

// Això és tot, prou d'editar - que bloguis de gust!

/** Ruta absoluta del directori del Wordpress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Assigna les variables del WordPress vars i fitxers inclosos. */
require_once(ABSPATH . 'wp-settings.php');
//define('WP_MEMORY_LIMIT', '128M');

