<?php

class TaxCalculation {

    // Income datas
    protected $familyStatus;
    protected $medicare;
    protected $address;
    protected $userTaxDetails;

    protected $salary;
    protected $bankInterest;
    protected $dividend;
    protected $otherIncome;

    protected $carExpenses;
    protected $travelExpenses;
    protected $uniform;
    protected $selfEducation;
    protected $otherDividendDeduction;
    protected $otherGiftDonations;
    protected $otherDeduction;

    protected $phis;
    protected $helpDebt;
    protected $zoneOffset;

    protected function defineData(UserTaxYear $user_tax_year) {

        $this->familyStatus = TaxFamilyStatus::where('user_tax_year_id','=',$user_tax_year->id)->get()->first();
        $this->medicare = TaxMedicare::where('user_tax_year_id','=',$user_tax_year->id)->get()->first();
        $this->address = TaxAddress::where('user_tax_year_id','=',$user_tax_year->id)->get()->first();
        $this->userTaxDetails = UserTaxDetail::where('user_tax_year_id','=',$user_tax_year->id)->get()->first();

        $this->salary = TaxSalary::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->bankInterest = TaxBankInterest::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->dividend = TaxDividend::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->otherIncome = TaxOtherIncome::where('user_tax_year_id','=',$user_tax_year->id)->get();

        $this->carExpenses = TaxCarExpense::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->travelExpenses = TaxTravelExpense::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->selfEducation = TaxSelfEducation::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->uniform = TaxUniform::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->otherDividendDeduction = TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year->id)->where('deduction_type_code','=','other_dividend_deductions')->get();
        $this->otherGiftDonations = TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year->id)->where('deduction_type_code','=','other_gift_donation')->get();
        $this->otherDeduction = TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year->id)->where('deduction_type_code','=','other_other')->get();

        $this->phis = TaxPHI::where('user_tax_year_id','=',$user_tax_year->id)->get();
        $this->helpDebt = TaxHelpDept::where('user_tax_year_id','=',$user_tax_year->id)->first();
        $this->zoneOffset = TaxZoneOffset::where('user_tax_year_id','=',$user_tax_year->id)->first();
    }

}