<?php


class FreeGateway extends PaymentGateway{

    function __construct( Checkout $order ) {
        $this->setGatewayinfo();
    }

    private function setGatewayinfo() {
        $this->payment_gateway = "Free";
        $this->payment_gateway_evironment = "N/A";
    }

    public function process() {

    }

    public static function settingsMarkup() {
        $style = Settings::get('payment_gateway') == "free" ? : "style=\"display:none;\"";
        ?>
        <div id="gateway-free" <?php echo $style; ?> >
        </div>
        <?php
    }
}