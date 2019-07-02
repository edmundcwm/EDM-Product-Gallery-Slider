<?php
/**
 * Plugin Name: WooCommerce Product Gallery Slider
 * Description: Enables carousel for product thumbnails 
 * Plugin URI: https://www.nerb.com.sg
 * Author: Edmundcwm
 * Author URI: https://www.edmundcwm.com
 * License: GPL2 or later
 * Text Domain: wpgs
 */

defined( 'ABSPATH' ) || exit;

//include main plugin file
require_once plugin_dir_path( __FILE__ ) . '/includes/class-edm-product-gallery-slider.php';

// require_once plugin_dir_path( __FILE__ ) . '/includes/class-edm-product-gallery-slider-dependencies.php';

//Ensure WooCommerce is active
// if ( ! EDM_Product_Gallery_Slider_Dependencies::wc_active_check() ) {
// 	add_action( 'admin_notices', array( 'EDM_Product_Gallery_Slider_Dependencies', 'render_notice' ) );
// 	return;
// }

function edm_product_gallery_slider_run() {

	$instance = new EDM_Product_Gallery_Slider();
	$instance->run();

}

edm_product_gallery_slider_run();
