<?php

defined( 'ABSPATH' ) || exit;


class EDM_Product_Gallery_Slider {
	
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * The instance of the EDM_Product_Gallery_Slider_Dependencies Class
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      obj    $version    instance of the EDM_Product_Gallery_Slider_Dependencies Class
	 */
	protected $dependency_check;

	public function __construct() {
		$this->plugin_name = __( 'WooCommerce Product Gallery Slider', 'wpgs' );
		$this->version = '1.0.0';
		$this->check_dependencies();
	}

	private function load_dependencies() {

	}

	private function check_dependencies() {
		require_once plugin_dir_path( __FILE__ ) . 'class-edm-product-gallery-slider-dependencies.php';
		
		$this->dependency_check = new EDM_Product_Gallery_Slider_Dependencies( $this->plugin_name );
	
		return $this->dependency_check->wc_active_check();
	}

	public function run() {
		
		if ( ! $this->check_dependencies() ) {
			add_action( 'admin_notices', array( $this->dependency_check, 'render_notice' ) );
		} else {
			
		}
		

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_plugin_version() {
		return $this->version;
	}
}