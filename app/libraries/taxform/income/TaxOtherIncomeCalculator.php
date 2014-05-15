<?php

class TaxOtherIncomeCalculator {
    protected $other_income;

    function __construct(TaxOtherIncome $other_income) {
        $this->other_income = $other_income;
    }

    public function getTaxableIncome() {
        return $this->other_income->amount;
    }

    public function getTaxableIncomeWords() {
        return $this->getTaxableIncome();
    }

    public function getDescription() {
        return $this->other_income->description;
    }

    public function getTaxWithheld() {
        return $this->other_income->tax_withheld;
    }

    public function getElementID() {
        return "#tax_other_income";
    }

    public function getTargetItem() {
        return '#tax_other_income_'. $this->other_income->id;
    }

}