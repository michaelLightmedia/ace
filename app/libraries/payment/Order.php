<?php

/**
 * A class for handling order for tax, total amount and etc.
 *
 * Class Order
 */
Class Order {

    const STATUS_IN_PROGRESS = 'inprogress';
    const STATUS_PAID_AND_SUBMITTED = 'paidandsubmitted';
    const STATUS_REVIEWED_BY_ACCOUNTANT = 'reviewedbyaccountant';
    const STATUS_REVIEWED_BY_AGENT = 'reviewedbyagent';
    const STATUS_SUBMITTED_TO_ATO = 'submittedtoato';

    const DEFAULT_STATUS = self::STATUS_IN_PROGRESS;

    /**
     * @var array $payment_gateways_available - Registered available payment gateways
     */
    public static $gateways_available = array(
        'free' => array(
            'label' => 'Free',
            'class' => 'FreeGateway'
        ),
        'mw' => array(
            'label' => 'Merchant Warrior',
            'class' => 'MWGateway'
        ),
        'paypalexpress' => array(
            'label' => 'Paypal Express Checkout',
            'class' => 'PaypalExpressGateway'
        )
    );

    /**
     * @var $payment_gateway    - the payment gateway name
     */
    var $payment_gateway;

    /**
     * @default payfromtaxrefund
     *
     * @var $payment_type    - the payment type
     */
    var $payment_type;

    /**
     * @var $PaymentGateway     - the intance of the payment gateway type
     */
    var $PaymentGateway;

    /**
     * @var $UserTaxYear     - the intance of the the user tax year
     */
    var $UserTaxYear;

    /**
     * tax_rate, tax_state, tax_amount, billing_state, billing_city, billing_zip, billing_country
     *
     * @var $tax    - as is object
     */
    var $tax_attr;

    /**
     * name, street, city, state, zip, country, phone
     *
     * @var $billing stdClass   - as is object
     */
    var $billing;

    /**
     * @var int $total
     */
    var $total;

    /**
     * @param UserTaxYear $u_t_y    User tax year
     */
    function __construct(UserTaxYear $u_t_y, $payment_type = "payfromtaxrefund") {

        // setup payment Gateways
        $this->setGateway( get_option('payment_gateway') );

        $this->payment_type = $payment_type;

        $this->tax_attr = new stdClass;
        $this->billing = new stdClass;

        if ($u_t_y) {
            return $this->UserTaxYear = $u_t_y;
        }
    }

    /**
     * Will set the instance of the payment gateway
     *
     * @param string $payment_gateway
     * @return mixed
     * @throws OrderException
     */
    public function setGateway($payment_gateway = 'free') {
        //set the gateway property
        if(isset($payment_gateway) && array_key_exists($payment_gateway,self::$gateways_available))
        {
            $this->payment_gateway = $payment_gateway;
        } else
        {
            throw new OrderException('Could not locate the gateway key name with the key = ' . $payment_gateway);
        }

        $class_name = self::$gateways_available[$payment_gateway];

        //try to load it
        if(class_exists($class_name))
            $this->PaymentGateway = new $class_name($this->payment_gateway);
        else
        {
            throw new OrderException("Could not locate the gateway class file with class name = " . $class_name . ".");
        }

        return $this->PaymentGateway;
    }

    public function process() {
        if ($this->payment_type == "payfromtaxrefund") {
            $this->PaymentGateway->process();
        }
    }

    public function fails() {
        return $this->PaymentGateway->fails();
    }

    public function getError() {
        return $this->PaymentGateway->getError();
    }

    public function setSubtotal($subtotal = null) {
        if (!is_null($subtotal)) {
            $this->subtotal = $subtotal;
        }

        $this->subtotal = (float) $this->UserTaxYear->cost_price;
    }

    public function getTax2Price($price) {
        //get options
        $tax_state = getOption("tax_state");
        $tax_rate = getOption("tax_rate");

        //default
        $tax_amount = 0;

        //calculate tax
        if($tax_state && $tax_rate)
        {
            //we have values, is this order in the tax state?
            if(trim(strtoupper($this->billing->state)) == trim(strtoupper($tax_state)))
            {
                //return value, pass through filter
                $tax_amount = round((float) $price * (float)$tax_rate, 2);
            }
        }

        //set values array for filter
        $values = array(
            "tax_amount" => $price,
            "tax_state" => $tax_state,
            "tax_rate" => $tax_rate
        );

        $this->tax_attr->tax_amount = $tax_amount;
        $this->tax_attr->tax_state = $tax_state;
        $this->tax_attr->tax_rate = $tax_rate;

        if (!empty($this->billing->state)) {
            $this->billing_state = $this->billing->state;
        }
        if (!empty($this->billing->city)) {
            $this->billing_state = $this->billing->city;
        }
        if (!empty($this->billing->zip)) {
            $this->billing_state = $this->billing->zip;
        }
        if (!empty($this->billing->country)) {
            $this->billing_state = $this->billing->country;
        }

        return $this->tax_attr->tax_amount;
    }

    public function getTaxAttr() {
        //reset
        $this->tax_attr = $this->getTax2Price($this->subtotal);

        return $this->tax_attr;
    }

    public function saveOrder() {
        if (empty($this->subtotal)) {
            $this->setSubtotal();
        }

        $this->total = (float)$this->subtotal + (float)$this->getTaxAttr()->tax_amount;

        //these fix some warnings/notices
        if(empty($this->billing)) {
            $this->billing = new stdClass();
            $this->billing->name = $this->billing->street = $this->billing->city = $this->billing->state = $this->billing->zip = $this->billing->country = $this->billing->phone = "";
        }

        //build query
        if(empty($this->user_id))
            $this->user_id = 0;
        if(empty($this->paypal_token))
            $this->paypal_token = "";
        if(empty($this->payment_type))
            $this->payment_type = "";
        if(empty($this->payment_transaction_id))
            $this->payment_transaction_id = "";
        if(empty($this->tax_year_id))
            $this->tax_year_id = "";
        if(empty($this->user_tax_year_id))
            $this->user_tax_year_id = "";
        if(empty($this->session_id))
            $this->session_id = "";
        if(empty($this->accountnumber))
            $this->accountnumber = "";
        if(empty($this->cardtype))
            $this->cardtype = "";
        if(empty($this->expirationdate))
            $this->expirationdate = "";
        if (empty($this->status))
            $this->status = Order::DEFAULT_STATUS;


        if(empty($this->gateway))
            $this->gateway = "payfromrefund";
        if(empty($this->gateway_environment))
            $this->gateway_environment = getOption("gateway_environment");

        if(empty($this->notes))
            $this->notes = "";

        $transaction = TaxOrder;
        $transaction->code = $this->getRandomCode;
        $transaction->session_id = $this->session_id;
        $transaction->user_id = $this->user_id;
        $transaction->user_id = $this->user_id;
        $transaction->paypal_token = $this->paypal_token;
        $transaction->billing_name = $this->billing->name;
        $transaction->billing_street = $this->billing->street;
        $transaction->billing_city = $this->billing->city;
        $transaction->billing_state = $this->billing->state;
        $transaction->billing_zip = $this->billing->zip;
        $transaction->billing_phone = $this->billing->phone;
        $transaction->billing_phone = $this->billing->phone;
        $transaction->subtotal = $this->billing->subtotal;
        $transaction->tax = $this->tax_attr->tax_amount;
        $transaction->tax_attr = serialize($this->tax_attr);

        $transaction->payment_type = $this->payment_type;
        $transaction->cardtype = $this->cardtype;
        $transaction->accountnumber = $this->accountnumber;
        $transaction->expirationmonth = $this->expirationmonth;
        $transaction->expirationyear = $this->expirationyear;
        $transaction->status = $this->status;
        $transaction->gateway = $this->gateway;
        $transaction->gateway_environment = $this->gateway_environment;
        $transaction->payment_transaction_id = $this->payment_transaction_id;

        $transaction->tax_user_year_id = $this->tax_user_year_id;
        $transaction->tax_year_id = $this->tax_year_id;
        $transaction->notes = $this->notes;
        $transaction->save();

    }

    function updateStatus($newstatus = self::STATUS_IN_PROGRESS) {
        $this->status = $newstatus;

        // Add hooks ?
        $this->save();
    }

    function getRandomCode() {

        while(empty($code))
        {
            $scramble = md5("USER TOKEN" . time() . "LARAVEL KEY");
            $code = substr($scramble, 0, 10);
            $code = apply_filters("pmpro_random_code", $code, $this);	//filter
            $found = TaxOrder::findByCode($code);
            if($found || is_numeric($code))
                $code = NULL;
        }

        return strtoupper($code);
    }
}
