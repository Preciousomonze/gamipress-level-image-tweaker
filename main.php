<?php
/**
 * Plugin Name: Gamipress - Rank Image Tweaker
 * Plugin URI: https://github.com/Preciousomonze/gamipress-rank-images-tweaker
 * Description: Changes the images on the page displaying the ranks. All you need to do is activate it. Currently works based on the level links used.
 * Author: Precious Omonze
 * Author URI: https://twitter.com/preciousomonze
 * Version: 1.0
 * Requires at least: 4.9
 * Tested up to: 5.1.1
 */

if (!defined('ABSPATH')) {
    exit;
}
//make sure you update the version values when necessary
define( 'PK_GAMI_PLUGIN_DIR',  plugin_dir_path( __FILE__ ) );
define( 'PK_GAMI_PLUGIN_FILE', __FILE__ );
define('PK_GAMI_TEXT_DOMAIN', 'loystar-woocommerce-loyalty-program');
define('PK_GAMI_PLUGIN_VERSION','1.0');
define('PK_GAMI_TWEAK_IMG_SHORTCODE','pk_gamipress_tweak_images');
define('PK_GAMI_ABSPATH', dirname(PK_GAMI_PLUGIN_FILE) . '/');
        
// Include the main class.
if(!class_exists('PK_Gami_Main')){
    include_once dirname(__FILE__) . '/class-main.php';
}
function pk_gami_main(){
    return PK_Gami_Main::instance();
}
$GLOBALS['pk_gami_main'] = pk_gami_main();
