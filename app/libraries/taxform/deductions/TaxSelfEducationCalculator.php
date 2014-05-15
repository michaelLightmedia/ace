<?php

class TaxSelfEducationCalculator {
    protected $self_education;

    function __construct(TaxSelfEducation $self_education) {
        $this->self_education = $self_education;
    }

    public function getDescription() {
        return "Education Expense " .  $this->self_education->type . "";
    }

    public function getDeductionAmount() {
        return $this->self_education->amount;// - 250;
    }

    public function getDeductionAmountWords() {
        return $this->getDeductionAmount();
    }

    public function getElementID() {
        return "#tax_self_education";
    }

    public function getTargetItem() {
        return '#tax_self_education_'. $this->self_education->id;
    }
}