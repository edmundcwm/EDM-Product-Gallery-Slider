<?php

defined( 'ABSPATH' ) || exit;

/**
 * Handles displaying of admin notices
 */
class EDM_Product_Gallery_Slider_Reporter {

	const REQUIRED_CAPABILITY = 'activate_plugins';

	/**
	 * Array of missing plugin names
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $missing_plugin_names    Array containing list of missing plugin names
	 */
	private $missing_plugin_names;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	public function __construct( $missing_plugin_names, $plugin_name ) {
		$this->missing_plugin_names = $missing_plugin_names;
		$this->plugin_name = $plugin_name;
	}

	public function bind_to_admin_hooks() {
		add_action( 'admin_notices', array( $this, 'display_admin_notice' ) );
	}

	public function display_admin_notice() {
		if ( ! current_user_can( self::REQUIRED_CAPABILITY ) ) {
			// If the user does not have the "activate_plugins" capability, do nothing.
			return;
		}

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/edm-product-gallery-slider-dependency-notice.php';
	}
}