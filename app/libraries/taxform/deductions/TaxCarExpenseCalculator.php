<?php

class TaxCarExpenseCalculator {
    protected $car_expense;

    function __construct(TaxCarExpense $car_expense) {
        $this->car_expense = $car_expense;
    }

    public function getDescription() {
        return "Car Expense " . $this->car_expense->registration;
    }

    public function getDeductionAmount() {

        // If log book
        if ($this->car_expense->has_claimed_log_book == 1) {
            $business_percentage = ($this->car_expense->business_percentage / 100);
            $log_book_deduction = ($this->car_expense->total_expenses * ( $business_percentage )) +  ($this->car_expense->car_purchase_amount * 0.125 * $business_percentage) ;

            return $log_book_deduction;
        }

        return number_to_cents($this->car_expense->cents_per_kilometre) * $this->car_expense->business_kilometre;
    }

    public function getDeductionAmountWords() {
        return $this->getDeductionAmount();
    }

    public function getElementID() {
        return "#tax_car_expense";
    }

    public function getTargetItem() {
        return '#tax_car_expense_'. $this->car_expense->id;
    }

}