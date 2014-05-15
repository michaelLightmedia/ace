<?php

class TaxDividendCalculator {
    protected $dividend;

    function __construct(TaxDividend $dividend) {
        $this->dividend = $dividend;
    }

    public function getTaxableIncome() {
        return $this->dividend->franked_divident;
    }

    public function getTaxableIncomeWords() {
        return $this->getTaxableIncome();
    }

    public function getDescription() {
        return $this->dividend->company;
    }

    public function getTaxWithheld() {
        return $this->dividend->tax_withheld;
    }
    public function getElementID() {
        return "#tax_dividend";
    }

    public function getTargetItem() {
        return '#tax_dividend_'. $this->dividend->id;
    }

}