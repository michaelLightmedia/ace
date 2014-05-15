<?php

class TaxHelpDeptCalculator {
    protected $help_debt;

    function __construct(TaxHelpDept $help_debt) {
        $this->help_debt = $help_debt;
    }

    public function getDescription() {
        return "HECS/HELP";
    }

    public function getAmount() {
        return $this->help_debt->help_debt_amount;
    }

    public function getAmountWords() {
        return $this->help_debt->help_debt_amount;
    }

    public function getElementID() {
        return "#tax_travel_expense";
    }

    public function getTargetItem() {
        return '#help_debt';
    }

}