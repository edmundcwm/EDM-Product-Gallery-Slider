<?php

/**
 * Checks for dependencies
 */

defined( 'ABSPATH' ) || exit;

class EDM_Product_Gallery_Slider_Dependencies {

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

    public function __construct( $plugin_name ) {
        $this->plugin_name = $plugin_name;
        $this->active_plugins = get_option( 'active_plugins' );
    }
    
    public function wc_active_check() {
        return in_array( 'woocommerce/woocommerce.php', $this->active_plugins );
    }

    public function render_notice() {
        echo '<div class="error"><p>' .  wp_kses( 
            __( '<strong>' . $this->plugin_name . '</strong> requires WooCommerce to be active.', 'wpgs' ),
            array(
                'strong' => array(),
            )
        )
        . '</p></div>';
    }

}