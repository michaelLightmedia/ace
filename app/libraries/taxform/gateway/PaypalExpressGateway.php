<?php


class PaypalExpressGateway extends PaymentGateway{

    function __construct( Checkout $order ) {
        $this->setGatewayinfo();
    }

    private function setGatewayinfo() {
        $this->payment_gateway = "Free";
        $this->payment_gateway = "N/A";
    }

    public function process() {

    }

    public static function settingsMarkup() {
        $style = Settings::get('payment_gateway') == "paypalexpress" ? : "style=\"display:none;\"";
        ?>
        <div id="gateway-paypalexpress" <?php echo $style; ?> >
            <div class="form-group">
                <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                    &nbsp;
                </label>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <p class=" alert alert-info">Not Available</p>
                </div>
            </div>
        </div>
    <?php
    }
}