<?php

/**
 * Checks if WooCommerce is Enabled
 */

defined( 'ABSPATH' ) || exit;

class EDM_Product_Gallery_Slider_Dependencies {

    private $active_plugins;
    private $plugin_name;

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