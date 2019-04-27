<?php
/**
 * For processing and displaying the loyalty widget
 */
Class PK_Gami_Shortcode{

    /**
     * Construcdur :)
     */
    public function __construct(){
            //add_shortcode(PK_GAMI_TWEAK_IMG_SHORTCODE,array($this,'shortcode'));
            add_action('wp_enqueue_scripts',array(pk_gami_main(),'enqueue_js'));
            pk_gami_main()->enqueue_support();
    }

   /**
    * Handles shortcode
    *
    * @param array $atts
    * @param string $content
    * @return string
    */
    public function shortcode($atts,$content = null){
        return '';
    }
}
new PK_Gami_Shortcode();
