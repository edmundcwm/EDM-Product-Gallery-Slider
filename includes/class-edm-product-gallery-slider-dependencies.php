<?php

defined( 'ABSPATH' ) || exit;

/**
 * Handles dependencies checking
 */
class EDM_Product_Gallery_Slider_Dependencies {

    /**
     * List of dependencies (required plugins)
     */
    const REQUIRED_PLUGINS = array(
        'Woocommerce' => 'woocommerce/woocommerce.php',
    );

    /**
     * The list of active plugins
     *
     * @since  1.0.0
     * @access private
     * @var    array $active_plugins Stores the list of active plugins
     */
    private $active_plugins;
    
    /**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

    // public function __construct() {
    //     // $this->plugin_name = $plugin_name;
    //     $this->active_plugins = get_option( 'active_plugins' );
    // }
    
    public function check() {
        $missing_plugins = $this->get_missing_plugins_list();
        if ( ! empty( $missing_plugins ) ) {
            throw new EDM_Product_Gallery_Slider_Dependencies_Exception( $missing_plugins );
        }
    }

    private function get_missing_plugins_list() {
        $missing_plugins = array();
        foreach ( self::REQUIRED_PLUGINS as $plugin => $plugin_path ) {
            if ( ! $this->check_is_active( $plugin_path ) ) {
                $missing_plugins[] = $plugin;
            }
        }

        return $missing_plugins;
    }

    private function get_active_plugins() {
        return get_option( 'active_plugins' );
    }

    private function check_is_active( $plugin_path ) {
        return in_array( $plugin_path, $this->get_active_plugins() );
    }
}