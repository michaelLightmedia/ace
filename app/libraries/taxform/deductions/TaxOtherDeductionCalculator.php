<?php

class TaxOtherDeductionCalculator {
    protected $other;

    function __construct(TaxOtherDeduction $other_deduction) {
        $this->other = $other_deduction;
    }

    public function getDescription() {
        return $this->other->description;
    }

    public function getDeductionAmount() {
        return $this->other->amount;
    }

    public function getDeductionAmountWords() {
        return $this->getDeductionAmount();
    }

    public function getElementID() {
        return "#tax_other_deduction";
    }

    public function getTargetItem() {
        return '#tax_'.$this->other->deduction_type_code.'_'. $this->other->id;
    }
}