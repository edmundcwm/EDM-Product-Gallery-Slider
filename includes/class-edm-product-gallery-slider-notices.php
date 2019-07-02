<?php 

class EDM_Product_Gallery_Slider_Notices {
    protected $message;

    public function __construct( $message ) {
        $this->message = $message;
        add_action( 'admin_notices', array( $this, 'render' ) );
    }

    public function render() {
        echo '<div class="error"><p>' .  wp_kses( 
            __( '<strong>' . $this->message . ' </strong> requires WooCommerce to be active.', 'edm' ),
            array(
                'strong' => array(),
            )
        )
        . '</p></div>';
    }
}