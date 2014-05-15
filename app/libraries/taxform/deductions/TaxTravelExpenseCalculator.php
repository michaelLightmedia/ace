<?php

class TaxTravelExpenseCalculator {
    protected $travel_expense;

    function __construct(TaxTravelExpense $travel_expense) {
        $this->travel_expense = $travel_expense;
    }

    public function getDescription() {
        return $this->travel_expense->description;
    }

    public function getDeductionAmount() {
        return $this->travel_expense->amount;
    }

    public function getDeductionAmountWords() {
        return $this->getDeductionAmount();
    }

    public function getElementID() {
        return "#tax_travel_expense";
    }

    public function getTargetItem() {
        return '#tax_travel_expense_'. $this->travel_expense->id;
    }

}