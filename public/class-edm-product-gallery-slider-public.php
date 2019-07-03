<?php

/**
 * The public-facing functionality of the plugin
 */
class EDM_Product_Gallery_Slider_Public {

    /**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
    private $plugin_name;
    
    /**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of the plugin.
	 */
    private $version;

    public function __construct( $plugin_name, $plugin_version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $plugin_version;
    }

    /**
     * Enqueue public facing scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_script( 'slick-js', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, false );
    }

    /**
     * Enqueue public facing styles
     */
    public function enqueue_styles() {
        wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    }

}