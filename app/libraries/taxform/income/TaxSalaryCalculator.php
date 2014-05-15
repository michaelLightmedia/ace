<?php

class TaxSalaryCalculator {
    protected $tax_salary;

    function __construct(TaxSalary $tax_summary) {
        $this->tax_salary = $tax_summary;
    }

    public function getTaxableIncome() {
        return $this->tax_salary->gross_salary + $this->tax_salary->allowance_amount + $this->tax_salary->lump_sum_amount;
    }

    public function getTaxableIncomeWords() {
        return $this->getTaxableIncome();
    }

    public function getDescription() {
        return $this->tax_salary->payers_name;
    }

    public function getTaxWithheld() {
        return $this->tax_salary->tax_withheld;
    }

    public function getElementID() {
        return "#tax_salary";
    }

    public function getTargetItem() {
        return '#tax_salary_'. $this->tax_salary->id;
    }

}