<?php

class TaxUniformCalculator {
    protected $uniform;

    function __construct(TaxUniform $uniform) {
        $this->uniform = $uniform;
    }

    public function getDescription() {
        return $this->uniform->description;
    }

    public function getDeductionAmount() {
        return $this->uniform->amount;
    }

    public function getDeductionAmountWords() {
        return $this->getDeductionAmount();
    }

    public function getElementID() {
        return "#tax_uniform";
    }

    public function getTargetItem() {
        return '#tax_uniform_'. $this->uniform->id;
    }
}