<?php

class PaymentGateway {

    var $payment_gateway = "Not yet set";
    var $payment_gateway_evironment = "Not yet set";

    // Optional for specific gateway
    var $paypal_token;
    var $payment_transaction_id;
    var $payment_parent_transaction_id;

    protected $error;

    public function getError() {
        return $this->error;
    }

    public function setError($error_msg) {
        $this->error = $error_msg;
    }

    public function fails() {
        return !empty($this->error);
    }

    public function success() {
        return empty($this->error);
    }

    protected function curl($postData = array()) {
        // Setup CURL defaults
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        // Setup CURL params for this request
        curl_setopt($curl, CURLOPT_URL, MW_API_ENDPOINT);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData, '', '&'));

        // Run CURL
        return array(
            curl_exec($curl), // response
            curl_error($curl)  // error
        );
    }

    protected function buildQuery($postData) {
        return http_build_query($postData, '', '&');
    }

}