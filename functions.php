<?php
/*-----------------------------------------------------------------------------------*/
/*  @EXTHEMES DEVS
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/bangreyblog
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
if ( ! defined( 'ABSPATH' ) ) exit; 
@ini_set('WP_MEMORY_LIMIT', '256M');
@ini_set('WP_MAX_MEMORY_LIMIT', '256M');
@ini_set('upload_max_size', '256M');
@ini_set('post_max_size', '256M');
@ini_set('max_execution_time', '300');
@ini_set('pcre.recursion_limit', 20000000);
@ini_set('pcre.backtrack_limit', 10000000);
$theme_version		= wp_get_theme()->get( 'Version' );
$theme_name			= wp_get_theme()->get( 'Name' );
$theme_url			= wp_get_theme()->get( 'AuthorURI' );
$link_sites			= get_bloginfo('url');
$parse				= parse_url($link_sites);
$sites				= $parse['host'];
define('ERRORS', 'off');  

/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
define('DOMAINSITES', $link_sites);
define('THEMES_NAMES', $theme_name);
define('EX_THEMES_NAMES_',THEMES_NAMES);
define('EX_THEMES_NAMES2_',THEMES_NAMES);
define('DEVS', 'Exthemes Devs' );
define('SLUGSX','exthemes');
define('VERSION', $theme_version);
define('SPACES_THEMES','v');
define('VERSIONS_THEMES', VERSION);
define('EXTHEMES_VERSION', VERSION);
define('EX_THEMES_SLUGS_', SLUGSX);
define('EXTHEMES_SLUG', SLUGSX);
define('EXTHEMES_NAME',  'Plus UI' );
define('EXTHEMES_NAMES',  EXTHEMES_NAME );

define('SITUS', 'https://exthem.es' );
define('SITUS2', 'https://exthemes.web.id' ); 
define('EXTHEMES_API_URL', SITUS );
define('exthemes', SITUS );

define('EXTHEMES_ITEMS_URL', EXTHEMES_API_URL.'/item/plus-ui/' );
define('EXTHEMES_DEMO_URL', 'https://plus-ui.demos.web.id/' );
define('EXTHEMES_DEMO_RTL_URL', 'https://plus-ui.demos.web.id/' );
define('EXTHEMES_MEMBER_URL', EXTHEMES_API_URL.'/user/' );
define('EXTHEMES_HOW_TO', EXTHEMES_API_URL.'/how-to-see-my-license-key-and-download-link/' );
define('EXTHEMES_HELPS_URL', '/wp-admin/admin.php?page=exthemes.supports.page' );
define('EXTHEMES_HELPS_NAME', 'exthemes_helps' );
define('EXTHEMES_AUTHOR', 'exthem.es' );
define('EXTHEMES_FACEBOOK_URL', 'https://www.facebook.com/groups/exthem.es' );
define('EXTHEMES_TWITTER_URL', 'https://twitter.com/bangreyblog' );
define('EXTHEMES_INSTAGRAM_URL', 'https://www.instagram.com/exthem.es/' );
define('EXTHEMES_YOUTUBE_URL', 'https://www.youtube.com/channel/UCOrw7drqals10l7HVMXovjQ?sub_confirmation=1' );
define('EXTHEMES_LINKEDIN_URL', 'https://www.linkedin.com/in/bangreyblogs' );
define('EXTHEMES_TELEGRAM_URL', 'https://t.me/exthemes_helps' );
 
define('TEXT_DOMAIN', strtolower($theme_name));
define('WEBSCHANGELOGS', get_template_directory().'/changelog.php' );
define('WEB_CHANGELOG', EXTHEMES_ITEMS_URL.'/changelog' );
define('WEBSSUPPORTS', '/livesupports.php' );
define('EXTHEMES_DEVS_BLOG', 'https://rey.web.id' );
define('IDIFRAMEYUTUBE', 'RxmwC0VGxJw' );
define('EX_THEMES_URI', get_template_directory_uri());
define('EX_THEMES_DIR', get_template_directory()); 
require EX_THEMES_DIR.'/libs/update/license.php'; 
ini_set('display_errors', ERRORS);
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\ 

<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Theme Setup for PlusUI
|--------------------------------------------------------------------------
| DO NOT EDIT unless you understand what you are changing.
| Missing includes or broken paths will cause blank pages.
*/

define('EX_THEMES_DIR', get_template_directory());
define('EX_THEMES_URL', get_template_directory_uri());
define('TEXT_DOMAIN', 'plusui');
define('THEMES_NAMES', 'PlusUI');
define('EXTHEMES_AUTHOR', 'Exthem.es');
define('VERSION', '1.0.0');
define('ERRORS', 'off');

// Optional debugging (turn on for testing)
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// 🔹 Include Core Theme Files
require EX_THEMES_DIR . '/libs/include/core.php';
require EX_THEMES_DIR . '/libs/include/inits.php';
require EX_THEMES_DIR . '/libs/include/plugin.php';
require EX_THEMES_DIR . '/libs/include/admin.php';

// 🔹 License and Updater (comment out if not present)
//if ( file_exists(EX_THEMES_DIR . '/libs/update/license.php') ) {
 //   require EX_THEMES_DIR . '/libs/update/license.php';
//}

// 🔹 Optional extra libraries
$extra_includes = [
    '/libs/include/komentar.php',
    '/libs/include/navwalker.php',
    '/libs/include/tgm.php',
];

foreach ($extra_includes as $file) {
    $path = EX_THEMES_DIR . $file;
    if (file_exists($path)) require_once $path;
}

// 🔹 Enqueue Styles and Scripts
function plusui_enqueue_assets() {
    wp_enqueue_style('plusui-main', get_template_directory_uri() . '/assets/css/main.css', [], VERSION);
    if (is_rtl()) {
        wp_enqueue_style('plusui-rtl', get_template_directory_uri() . '/assets/css/rtl.css', [], VERSION);
    }
    wp_enqueue_script('plusui-header', get_template_directory_uri() . '/assets/js/header_main.js', [], VERSION, false);
    wp_enqueue_script('plusui-main-js', get_template_directory_uri() . '/assets/js/main.js', [], VERSION, true);
}
add_action('wp_enqueue_scripts', 'plusui_enqueue_assets');

// 🔹 Enable Theme Support for Featured Images, Menus, etc.
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('menus');

// 🔹 Hide admin bar if disabled in theme options
add_action('init', function() {
    global $opt_themes;
    if (isset($opt_themes['admin_bar_on']) && !$opt_themes['admin_bar_on']) {
        add_filter('show_admin_bar', '__return_false');
    }
});

// 🔹 Register navigation menus
register_nav_menus([
    'primary' => __('Primary Menu', TEXT_DOMAIN),
    'footer'  => __('Footer Menu', TEXT_DOMAIN),
]);

?>


