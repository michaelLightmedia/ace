<?php

class TaxPHICalculator {
    protected $tax_phi;

    function __construct(TaxPHI $tax_phi) {
        $this->tax_phi = $tax_phi;
    }

    public function getDescription() {
        return "PHI " .  $this->tax_phi->membership_no . "";
    }

    public function getAmount() {
        return 0;
    }

    public function getAmountWords() {
        return "TBD";
    }

    public function getElementID() {
        return "#help_debt";
    }

    public function getTargetItem() {
        return '#private_health_insurance_' . $this->tax_phi->id;
    }
}