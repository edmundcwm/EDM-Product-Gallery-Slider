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
            wp_enqueue_script( 'slick-js', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array( 'jquery' ), $this->version, false );
            wp_enqueue_script( 'frontend-js', plugin_dir_url( __FILE__ ) . 'js/frontend.js', array( 'jquery', 'flexslider' ), $this->version, true );
        }
    }

    /**
     * Enqueue public facing styles
     */
    public function enqueue_styles() {
        if ( is_singular( 'product' ) ) {
            wp_enqueue_style( 'slick-theme-css', plugin_dir_url( __FILE__ ) . 'css/slick-theme.css', array(), $this->version );
            wp_enqueue_style( 'slick-css', plugin_dir_url( __FILE__ ) . 'css/slick.css', array(), $this->version );
        }
    }

    /**
     * Include WC template override within plugin
     */
    public function template_override( $template, $template_name, $template_path ) {
        $plugin_path = plugin_dir_path( __FILE__ ) . $template_path . $template_name;

        return file_exists( $plugin_path ) ? $plugin_path : $template;
    }

    /**
     * Disable Flex Slider for WC Product Gallery
     */
    public function disable_flex_slider() {
        return false;
    }

    public function disable_photo_swipe() {
        return false;
    }

    /**
     * Enable the use of main product image size for gallery
     */
    public function use_main_image( $html, $attachment_id ) {
        return wc_get_gallery_image_html( $attachment_id, true );
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
}