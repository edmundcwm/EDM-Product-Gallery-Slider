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
        if ( is_singular( 'product' ) ) {
            wp_enqueue_script( 'frontend-js', plugin_dir_url( __FILE__ ) . 'js/frontend.js', array( 'jquery', 'flexslider' ), $this->version, true );
        }
    }

    /**
     * Enqueue public facing styles
     */
    public function enqueue_styles() {
        if ( is_singular( 'product' ) ) {
            wp_enqueue_style( 'frontend-css', plugin_dir_url( __FILE__ ) . 'css/frontend.css', array(), $this->version );
            if ( 'yes' === get_option( 'edm_include_fa' ) ) { //only enqueue FA5 if admin option is checked
                wp_enqueue_style( 'fa5', plugin_dir_url( __FILE__ ) . 'css/fontawesome.min.css', array(), '5.9.0' );
                wp_enqueue_style( 'fa5-solid', plugin_dir_url( __FILE__ ) . 'css/solid.min.css', array(), '5.9.0' );
            }
        }
    }

    /**
     * Include WC template override within plugin
     */
    public function template_override( $template, $template_name, $template_path ) {
        $plugin_path = plugin_dir_path( __FILE__ ) . $template_path . $template_name;

        return file_exists( $plugin_path ) ? $plugin_path : $template;
    }

    public function disable_photo_swipe() {
        return false;
    }

    /**
     * Modify Product Gallery FlexSlider options
     * 
     * @param  array $options FlexSlider options
     * @return array $options Modified options
     */
    public function product_carousel_options( $options ) {
        $options['controlNav'] = false;
        $options['sync'] = '#carousel';

        return $options;
    }

    public function load_template_functions() {
        require_once plugin_dir_path( __FILE__ ) . 'edm-product-gallery-template-functions.php';
    }

}