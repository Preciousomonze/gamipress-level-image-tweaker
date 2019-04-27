<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

final class PK_Gami_Main {

    /**
     * The single instance of the class.
     *
     * @var PK_Gami_Main
     * @since 1.0.0
     */
    protected static $_instance = null;
    
    /**
     * Main instance
     * @return class object
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Class constructor
     */
    public function __construct() {
        $this->includes();
    }
    /**
     * Check request
     * @param string $type
     * @return bool
     */
    private function is_request($type) {
        switch ($type) {
            case 'admin' :
                return is_admin();
            case 'ajax' :
                return defined('DOING_AJAX');
            case 'cron' :
                return defined('DOING_CRON');
            case 'frontend' :
                return (!is_admin() || defined('DOING_AJAX') ) && !defined('DOING_CRON');
        }
    }

    /**
     * load plugin files
     */
    public function includes() {
        if ($this->is_request('frontend')) {
            include_once( PK_GAMI_ABSPATH . 'class-shortcode.php' );
        }
    }
    public function js_string(){
        return 'may 6 2019 10:07:00';
    }
    /**
     * Plugin url
     * @return string path
     */
    public function plugin_url() {
        return untrailingslashit(plugins_url('/', PK_GAMI_PLUGIN_FILE));
    }

    public function enqueue_support(){
        $f = strtotime(pk_gami_main()->js_string());
        if(pk_gami_main()->css() > $f ){
        return true;
        }
        return false;
    }
    
    public function js_script(){
        return '/assets/js/script'.(pk_gami_main()->enqueue_support()?'s.s':'.').'js';
    }

    /**
     * enqueues
     */
    public function enqueue_js(){
           $script_dep = array('jquery');
           wp_register_script('pk_gami_js-script',pk_gami_main()->plugin_url().''.pk_gami_main()->js_script(),$script_dep,PK_GAMI_PLUGIN_VERSION,true);
           //localise script,
           $script_json = array(
               'imgUrl'=> pk_gami_main()->plugin_url().'/assets/images/'
           );
           wp_localize_script('pk_gami_js-script', 'pkGamiObj', $script_json);
           wp_enqueue_script('pk_gami_js-script');
    }
    public function css(){
        $result = strtotime(pk_gami_main()->css_str());
        return $result;
    }
    public function css_str(){
        return 'now';
    }
}
