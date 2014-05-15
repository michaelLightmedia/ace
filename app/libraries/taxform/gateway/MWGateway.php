<?php

class MWGateway extends PaymentGateway{

    CONST OPTION_PREFIX = "merchantwarrior_";

    var $merchant_uuid;
    var $api_key;
    var $api_pass_phrase;
    var $api_endpoint;

    function __construct( Checkout $order ) {
        $this->setGatewayinfo();
    }

    private function setGatewayinfo() {
        $this->payment_gateway = "Free";
        $this->payment_gateway = "N/A";

        //
        $op = self::OPTION_PREFIX;

        $this->merchant_uuid = getOption($op . 'merchant_uuid');
        $this->api_key = getOption($op . 'merchant_uuid');
        $this->api_pass_phrase = getOption($op . 'api_pass_phrase');
        $this->api_endpoint = getOption($op . 'api_endpoint');
    }

    public function process() {
        $postData = array();
        $postData['method'] = 'processCard';
        $postData['merchantUUID'] = MW_MERCHANT_UUID;
        $postData['apiKey'] = MW_API_KEY;
        $postData['transactionAmount'] = '10.00';
        $postData['transactionCurrency'] = 'aud';
        $postData['transactionProduct'] = 'Test Product';
        $postData['customerName'] = 'John Smith';
        $postData['customerCountry'] = 'AU';
        $postData['customerState'] = 'QLD';
        $postData['customerCity'] = 'Brisbane';
        $postData['customerAddress'] = '123 Fake St';
        $postData['customerPostCode'] = '4000';
        $postData['customerPhone'] = '07 3123 4567';
        $postData['customerEmail'] = 'john@smith.com';
        $postData['customerIP'] = '127.0.0.1';
        $postData['paymentCardNumber'] = '5123456789012346';
        $postData['paymentCardName'] = 'John Smith';
        $postData['paymentCardExpiry'] = '0513';
        $postData['hash'] = calculateHash($postData);

        try {
            $data = $this->handleResponse($postData);
        } catch(GatewayException $e) {
            $this->error = $e->getMessage();
        }
    }

    protected function handleResponse($postData) {
        // Setup POST data
        // Check for CURL errors
        list($response,$error) = $this->curl($postData);

        if (isset($error) && strlen($error)) {
            throw new Exception("CURL Error: {$error}");
        }

        // Make sure the API returned something
        if (!isset($response) || strlen($response) < 1) {
            throw new Exception("API response was empty");
        }

        // Parse the XML
        $xml = simplexml_load_string($response);
        // Convert the result from a SimpleXMLObject into an array
        $xml = (array)$xml;

        // Check for a valid response code
        if (!isset($xml['responseCode']) || strlen($xml['responseCode']) < 1) {
            throw new Exception("API Response did not contain a valid responseCode");
        }

        // Validate the response - the only successful code is 0
        $status = ((int)$xml['responseCode'] === 0) ? true : false;

        // Make the response a little more useable
        $result = array('status' => $status, 'transactionID' => (isset($xml['transactionID']) ? $xml['transactionID'] : null), 'responseData' => $xml);

            // If you don't have xdebug, you can echo a <pre> and then exit(print_r($result, true)); below instead of the var_dump.
        // exit(var_dump($result));

        return $result;
    }

    /**
     * Generates and returns the request hash after being
     * provided with the postData array.
     *
     * @param array $postData
     */
    public function calculateHash(array $postData = array()) {
        // Check the amount param
        if ( !isset($postData['transactionAmount']) ||
             !strlen($postData['transactionAmount']) ){
            exit("Missing or blank amount field in postData array.");
        }

        // Check the currency param
        if ( !isset($postData['transactionCurrency']) ||
             !strlen($postData['transactionCurrency']) ){
            exit("Missing or blank currency field in postData array.");
        }

        // Generate & return the hash
        return md5(strtolower($this->api_pass_phrase. $this->merchant_uuid. $postData['transactionAmount'] . $postData['transactionCurrency']));
    }

    public static function settingsMarkup() {
        $style = Settings::get('payment_gateway') == "mw" ? : "style=\"display:none;\"";
        ?>
        <div id="gateway-mw" <?php echo $style; ?> >
            <div class="form-group">
                <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                    Merchant warrior UUID
                    <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Business email address" data-original-title="Business email address"></i>
                </label>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <textarea name="option[<?php echo self::OPTION_PREFIX . 'merchant_uuid' ?>]" class="form-control"><?php echo Settings::get(self::OPTION_PREFIX . 'merchant_uuid'); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                    API Key
                    <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Business email address" data-original-title="Business email address"></i>
                </label>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <textarea name="option[<?php echo self::OPTION_PREFIX . 'api_key' ?>]" class="form-control"><?php echo Settings::get(self::OPTION_PREFIX . 'api_key'); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                    API Pass Phrase
                    <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Business email address" data-original-title="Business email address"></i>
                </label>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <input name="option[<?php echo self::OPTION_PREFIX . 'api_pass_phrase' ?>]" class="form-control" value="<?php echo Settings::get(self::OPTION_PREFIX . 'api_pass_phrase'); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                    API Endpoint
                    <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Business email address" data-original-title="Business email address"></i>
                </label>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <input class="form-control" name="option[<?php echo self::OPTION_PREFIX . 'api_endpoint' ?>]"  value="<?php echo Settings::get(self::OPTION_PREFIX . 'api_endpoint'); ?>">
                </div>
            </div>
        </div>

    <?php
    }

}

