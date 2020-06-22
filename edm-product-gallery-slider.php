<?php
/**
 * Plugin Name: EDM Product Gallery Slider
 * Description: Enables carousel for WooCommerce Product Gallery thumbnails
 * Plugin URI: https://www.edmundcwm.com
 * Author: Edmundcwm
 * Author URI: https://www.edmundcwm.com
 * License: GPL2 or later
 * Text Domain: edm
 * 
 * @package edm
 */

defined( 'ABSPATH' ) || exit;

//include main plugin file
require_once plugin_dir_path( __FILE__ ) . '/includes/class-edm-product-gallery-slider.php';

function edm_product_gallery_slider_run() {
	$instance = new EDM_Product_Gallery_Slider();
	$instance->run();
}

edm_product_gallery_slider_run();
