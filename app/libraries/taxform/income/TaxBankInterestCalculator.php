<?php

class TaxBankInterestCalculator {
    protected $bank_interest;

    function __construct(TaxBankInterest $bank_interest) {
        $this->bank_interest = $bank_interest;
    }

    public function getTaxableIncome() {
        return $this->bank_interest->interest;
    }

    public function getTaxableIncomeWords() {
        return $this->getTaxableIncome();
    }

    public function getDescription() {
        return $this->bank_interest->bank;
    }

    public function getTaxWithheld() {
        return $this->bank_interest->tax_withheld;
    }

    public function getElementID() {
        return "#tax_bank_interest";
    }

    public function getTargetItem() {
        return '#tax_bank_interest_'. $this->bank_interest->id;
    }
}