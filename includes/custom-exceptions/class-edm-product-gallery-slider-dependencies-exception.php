<?php

defined( 'ABSPATH' ) || exit;

/**
 * Custom exception handler
 */
class EDM_Product_Gallery_Slider_Dependencies_Exception extends Exception {
    private $missing_plugin_names;

    public function __construct( $missing_plugin_names ) {
        $this->missing_plugin_names = $missing_plugin_names;
    }

    public function get_missing_plugin_names() {
        return $this->missing_plugin_names;
    }
}