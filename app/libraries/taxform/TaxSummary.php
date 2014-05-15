<?php

class TaxSummary extends TaxCalculation {

    var $estimate_amount;

    var $user_tax_year;
    var $user_tax_year_id;

    var $remove_quick_action = false;

    function __construct(UserTaxYear $user_tax_year) {
        $this->user_tax_year = $user_tax_year;
        $this->user_tax_year_id = $user_tax_year->id;

        $this->defineData($user_tax_year);

        // Calculate Estimate refund
        $this->doCalculate();
    }

    public function createIncomeSummaryBlock($obj) { ?>
        <tr>
            <td>
                <span class="truncate truncate-sm" title="<?php echo ($obj->getDescription()); ?>">
                    <a href="<?php echo url("/tax-form/".Session::get('user_tax_year_id')."/income?edit_action=". urlencode($obj->getTargetItem())) ?>" class="<?php echo $this->getEditActionClass(); ?>" data-targetitem="<?php echo $obj->getTargetItem(); ?>">
                        <?php echo ($obj->getDescription()); ?>
                    </a>
                </span>
            </td>
            <td><?php echo format_currency($obj->getTaxableIncomeWords(),0); ?></td>
            <td><?php echo format_currency($obj->getTaxWithheld(),0); ?></td>
            <td>
                <a href="<?php echo url("/tax-form/".Session::get('user_tax_year_id')."/income?delete_action=". urlencode($obj->getTargetItem())) ?>" class="<?php echo $this->getDeleteActionClass(); ?>" data-targetitem="<?php echo $obj->getTargetItem(); ?>"><i class="fa fa-times"></i></a>
            </td>
        </tr> <?php
    }

    public function createDeductionsSummaryBlock($obj) { ?>
        <tr>
            <td>
                <span class="truncate" title="<?php echo ($obj->getDescription()); ?>">
                    <a href="<?php echo url("/tax-form/".Session::get('user_tax_year_id')."/deductions?edit_action=". urlencode($obj->getTargetItem())) ?>" class="<?php echo $this->getEditActionClass(); ?>" data-targetitem="<?php echo $obj->getTargetItem(); ?>">
                        <?php echo ($obj->getDescription()); ?>
                    </a>
                </span>
            </td>
            <td><?php echo format_currency($obj->getDeductionAmountWords(),0); ?></td>
            <td>
                <a href="<?php echo url("/tax-form/".Session::get('user_tax_year_id')."/deductions?delete_action=". urlencode($obj->getTargetItem())) ?>" class="<?php echo  $this->getDeleteActionClass(); ?>" data-targetitem="<?php echo $obj->getTargetItem(); ?>"><i class="fa fa-times"></i></a>
            </td>
        </tr> <?php
    }

    public function createZoneOffsetSummaryBlock($obj) { ?>
        <tr>
            <td>
                <span class="truncate truncate-sm" title="<?php echo ($obj->getDescription()); ?>">
                    <a href="<?php echo url("/tax-form/".Session::get('user_tax_year_id')."/tax-offsets?edit_action=". urlencode($obj->getTargetItem())) ?>" class="<?php echo $this->getEditActionClass(); ?>" data-targetitem="<?php echo $obj->getTargetItem(); ?>">
                        <?php echo ($obj->getDescription()); ?>
                    </a>
                </span>
            </td>
            <td><?php echo format_currency($obj->getAmountWords(),0); ?></td>
            <td>
                <a href="<?php echo url("/tax-form/".Session::get('user_tax_year_id')."/tax-offsets?delete_action=". urlencode($obj->getTargetItem())) ?>" class="<?php echo  $this->getDeleteActionClass(); ?>" data-targetitem="<?php echo $obj->getTargetItem(); ?>"><i class="fa fa-times"></i></a>
            </td>
        </tr> <?php
    }

    protected function getEditActionClass() {
        if ($this->remove_quick_action){
            return "";
        }

        return "edit_quick_action";
    }

    protected function getDeleteActionClass() {
        if ($this->remove_quick_action){
            return "";
        }

        return "delete_quick_action";
    }

    // Income Summary Retrieval

    public function getIncomeSummary() {
        $this->getIncomeSalarySummary();
        $this->getIncomeBankInterestSummary();
        $this->getIncomeDividendSummary();
        $this->getIncomeOtherIncomeSummary();
    }
    public function getTotalTaxableIncome() {
        $taxable_income = 0;

        foreach($this->salary as $row) {
            $cacl = new TaxSalaryCalculator($row);

            $taxable_income += $cacl->getTaxableIncome();
        }

        foreach($this->bankInterest as $row) {
            $cacl = new TaxBankInterestCalculator($row);

            $taxable_income  += $cacl->getTaxableIncome();
        }

        foreach($this->dividend as $row) {
            $cacl = new TaxDividendCalculator($row);

            $taxable_income  += $cacl->getTaxableIncome();
        }

        foreach($this->otherIncome as $row) {
            $cacl = new TaxOtherIncomeCalculator($row);

            $taxable_income  += $cacl->getTaxableIncome();
        }

        return $taxable_income;

    }
    public function getTotalTaxWithHeldIncome() {
        $tax_withheld = 0;

        foreach($this->salary as $row) {
            $cacl = new TaxSalaryCalculator($row);

            $tax_withheld += $cacl->getTaxWithheld();
        }

        foreach($this->bankInterest as $row) {
            $cacl = new TaxBankInterestCalculator($row);

            $tax_withheld  += $cacl->getTaxWithheld();
        }

        foreach($this->dividend as $row) {
            $cacl = new TaxDividendCalculator($row);

            $tax_withheld  += $cacl->getTaxWithheld();
        }

        foreach($this->otherIncome as $row) {
            $cacl = new TaxOtherIncomeCalculator($row);

            $tax_withheld  += $cacl->getTaxWithheld();
        }

        return $tax_withheld;

    }
    public function getIncomeSalarySummary() {
        foreach($this->salary as $row) {
            $this->createIncomeSummaryBlock(new TaxSalaryCalculator($row));
        }
    }
    public function getIncomeBankInterestSummary() {
        foreach($this->bankInterest as $row) {
            $this->createIncomeSummaryBlock(new TaxBankInterestCalculator($row));
        }
    }
    public function getIncomeDividendSummary() {
        foreach($this->dividend as $row) {
            $this->createIncomeSummaryBlock(new TaxDividendCalculator($row));
        }
    }
    public function getIncomeOtherIncomeSummary() {
        foreach($this->otherIncome as $row) {
            $this->createIncomeSummaryBlock(new TaxOtherIncomeCalculator($row));
        }
    }


    // Deduction Summary Retrieval

    public function getDeductionSummary() {
        $this->getDeductionCarExpenses();
        $this->getDeductionTravelExpenses();
        $this->getDeductionUniform();
        $this->getDeductionSelfEducation();
        $this->getDeductionOther();
    }
    public function getTotalDeductionAmount() {
        $total_amount = 0;

        foreach($this->carExpenses as $row) {
            $calc = new TaxCarExpenseCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }

        foreach($this->travelExpenses as $row) {
            $calc = new TaxTravelExpenseCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }

        foreach($this->uniform as $row) {
            $calc = new TaxUniformCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }

        foreach($this->selfEducation as $row) {
            $calc = new TaxSelfEducationCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }

        foreach($this->otherDividendDeduction as $row) {
            $calc = new TaxOtherDeductionCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }
        foreach($this->otherGiftDonations as $row) {
            $calc = new TaxOtherDeductionCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }
        foreach($this->otherDeduction as $row) {
            $calc = new TaxOtherDeductionCalculator($row);

            $total_amount += $calc->getDeductionAmount();
        }

        return $total_amount;

    }
    public function getDeductionCarExpenses() {
        foreach($this->carExpenses as $row) {
            $this->createDeductionsSummaryBlock(new TaxCarExpenseCalculator($row));
        }
    }
    public function getDeductionTravelExpenses() {
        foreach($this->travelExpenses as $row) {
            $this->createDeductionsSummaryBlock(new TaxTravelExpenseCalculator($row));
        }
    }
    public function getDeductionUniform() {
        foreach($this->uniform as $row) {
            $this->createDeductionsSummaryBlock(new TaxUniformCalculator($row));
        }
    }
    public function getDeductionSelfEducation() {
        foreach($this->selfEducation as $row) {
            $this->createDeductionsSummaryBlock(new TaxSelfEducationCalculator($row));
        }
    }
    public function getDeductionOther() {

        foreach($this->otherDividendDeduction as $row) {
            $this->createDeductionsSummaryBlock(new TaxOtherDeductionCalculator($row));
        }

        foreach($this->otherGiftDonations as $row) {
            $this->createDeductionsSummaryBlock(new TaxOtherDeductionCalculator($row));
        }

        foreach($this->otherDeduction as $row) {
            $this->createDeductionsSummaryBlock(new TaxOtherDeductionCalculator($row));
        }
    }


    // Tax Zone Offset Sumamry
    public function getZoneOffsetSummary() {
        $this->getZoneOffsetPHI();
        $this->getZoneOffsetHelpDeb();
        $this->getZoneOffsetOffset();
    }

    public function getTotalTaxOffset() {
        $total_amount = 0;

        foreach($this->phis as $row) {
            $calc = new TaxPHICalculator($row);

            $total_amount += $calc->getAmount();
        }

        if ($this->helpDebt){
            $calc = new TaxHelpDeptCalculator($this->helpDebt);

            $total_amount += $calc->getAmount();
        }

        if ($this->zoneOffset){
            $calc = new TaxZoneOffsetCalculator($this->zoneOffset);

            $total_amount += $calc->getAmount();
        }

        return $total_amount;

    }
    public function getZoneOffsetPHI() {
        foreach($this->phis as $row) {
            $this->createZoneOffsetSummaryBlock(new TaxPHICalculator($row));
        }
    }
    public function getZoneOffsetHelpDeb() {
        if ($this->helpDebt){
            $this->createZoneOffsetSummaryBlock(new TaxHelpDeptCalculator($this->helpDebt));
        }
    }
    public function getZoneOffsetOffset() {
        if ($this->zoneOffset){
            $this->createZoneOffsetSummaryBlock(new TaxZoneOffsetCalculator($this->zoneOffset));
        }
    }



    protected function doCalculate() {
        // Global Variables
        $number_of_dependents = 0;
        if ($this->familyStatus) {
            $number_of_dependents = $this->familyStatus->number_of_dependents;
        }


        if( $number_of_dependents > 0
            ||  $this->familyStatus->has_spouse == 1
        ) {
            $family_status = 'family';
        } else {
            $family_status = 'single';
        }

        // Step 1
        // Determine Final Taxable Income and Adjusted Final Taxable Income, Reportable Fringe Benefits
        $total_taxable_income = $this->getTotalTaxableIncome();
        $total_deductions = $this->getTotalDeductionAmount();
        $reportable_fringe_benefits = 0;
        $total_amount = 0;

        // Identify Reportable Benefits
        foreach($this->salary as $row) {
            $reportable_fringe_benefits += $row->fringe_benefits;
        }

        // Final Taxable Income = Total Taxable Income – Reportable Fringe Benefits - Total Deductions
        $final_taxable_income = $total_taxable_income - $reportable_fringe_benefits - $total_deductions;

        // Adjusted Final Taxable Income = Total Taxable Income - Total Deductions
        $adjusted_final_taxable_income = $total_taxable_income - $total_deductions;






        // Step 2
        // Determine Income Tax Payable
        $income_tax_payable = 0;

        // Default search
        $taxable_income = TaxRate::getByTaxableIncome($final_taxable_income);

        if ($taxable_income) {
            if ($taxable_income->has_tax == 1) {
                $income_tax_payable += $taxable_income->start_at;

                $income_tax_payable += number_to_cents( $taxable_income->cents_per_dollar ) * $final_taxable_income;
            }
        }





        // Step 3
        // Determine Medicare Levy Amount Owed
        $medicare_levy_owed = 0;

        if (
        $this->familyStatus ? ( $this->familyStatus->has_covered_pphc == 1 ? true : false) : false
            || $adjusted_final_taxable_income < 20542
            || $number_of_dependents == 1
            && $adjusted_final_taxable_income < 22328
            ||  $adjusted_final_taxable_income < ($adjusted_final_taxable_income + (1410 * $number_of_dependents) )
        ) {
            $medicare_levy_owed = 0;
        } else {
            $medicare_levy_owed = (1.5/100) * $adjusted_final_taxable_income;
        }






        // Step 4
        // Determine Medicare Levy Surcharge
        $medicare_levy_surcharge = 0;

        // If they have answered Yes to do you have private health, skip.
        if ($this->medicare->has_covered_pphc == 1) {
            return $this->medicare_levy_surcharge_owed = 0;
        }

        $tax_mls = TaxMLS::getByTaxableIncome($family_status,$adjusted_final_taxable_income);

        if ($tax_mls) {
            $medicare_levy_surcharge = ($tax_mls->mls_rate/100) * $adjusted_final_taxable_income;
        } else {
            $medicare_levy_surcharge = 0;
        }





        // Step 5
        // Determine Private Health Insurance Rebate
        $private_health_insurance_rebate = 0;
        $rebate_amount_refundable = 0;
        $low_income_offset_amount = 0;
        $hecs_repayment_amount = 0;

        $age = date_to_age($this->familyStatus->dob);

        // Skip Calculations
        if (!$this->phis || count($this->phis) <= 0) {
            $private_health_insurance_rebate = 0;
        } else {


            // Determine Rebate Eligibility Amount:
            $rebate_eligibility_amount = 0;
            $rebate_total_rate = OffsetRate::getOffsetRate($taxable_income,$family_status,$age);
            $rebate_eligibility_rate = ($rebate_total_rate/100);

            $rebate_eligibility_amount = ($number_of_dependents * 1500) * $rebate_eligibility_rate;


            // Determine Rebate Received
            // @todo add all benefit code ?
            $rebate_received = 0;
            foreach($this->phis as $phi) {
                $rebate_received += $phi->benefit_code;
            }





            // Determine Low income Offset Amount
            $share_of_premiums_paid = 0;
            $share_of_govt_rebate_received = 0;

            foreach($this->phis as $phi) {
                $share_of_premiums_paid += $phi->premiums_paid;
                $share_of_govt_rebate_received += $phi->australian_government_rebate;
            }

            $rebate_based_on_eligibility = $rebate_eligibility_amount/100 * ($share_of_govt_rebate_received + $share_of_premiums_paid);

            // @todo Rebate amount owed is not used ?
            if ($rebate_eligibility_amount < $rebate_received) {
                $rebate_amount_owed =   $rebate_received - $rebate_based_on_eligibility;
            } else {
                $rebate_amount_refundable = $rebate_based_on_eligibility = $rebate_received;
            }





            //Determine Low income Offset Amount
            $maximum_tax_offset = 445;
            $threshold_tax_offset_min = 37000;
            $threshold_tax_offset_max = 63000;
            if ($adjusted_final_taxable_income < $threshold_tax_offset_min) {

                $low_income_offset_amount = $maximum_tax_offset;
            } else if ($adjusted_final_taxable_income > $threshold_tax_offset_min
                && $adjusted_final_taxable_income < $threshold_tax_offset_max ) {

                $cents_every_dollar_above = (($adjusted_final_taxable_income - $threshold_tax_offset_max) ) * 1.5;
                $low_income_offset_amount = $maximum_tax_offset - $cents_every_dollar_above;

            } else if ($adjusted_final_taxable_income >= $threshold_tax_offset_max) {

                $low_income_offset_amount = 0;
            } else {

                $low_income_offset_amount = 0;
            }





            // Calculate HECS Repayment Amount
            $hecs_debt_amount = 0;
            if ($this->helpDebt) {
                if ($this->helpDebt->has_help_debt == 1) {
                    $hecs_debt_amount = $this->helpDebt->help_debt_amount;
                }
            }



            // Get Repayment Rate
            $result = HelpRate::getByTaxableIncome($adjusted_final_taxable_income);
            $repayment_rate = 0;
            if ($result) {
                $repayment_rate = $result->repayment_rate;
            }

            $hecs_repayment_amount = $adjusted_final_taxable_income * ($repayment_rate /100);

            if ($hecs_debt_amount < $hecs_repayment_amount) {
                $hecs_repayment_amount = $hecs_debt_amount;
            }
        }




        // Step 6
        // Calculate Estimate

        $final_tax_payable = $income_tax_payable + $medicare_levy_owed
            + $medicare_levy_surcharge - $rebate_amount_refundable + $low_income_offset_amount
            + $hecs_repayment_amount ;


        // Identify Tax with held
        $total_tax_withheld = 0;
        foreach($this->salary as $row) {
            $total_tax_withheld += $row->tax_withheld;
        }

        $estimate_amount = $total_tax_withheld - $final_tax_payable;

        $zone_offset_amount = $this->getTotalTaxOffset();
        if ($estimate_amount >= 0) {
            // If refund (positive)
            $estimate_amount += $zone_offset_amount - $total_tax_withheld;
            $estimate_amount += $low_income_offset_amount;

        } else {
            // If Payable (negative)
            $estimate_amount -= $zone_offset_amount;
            $estimate_amount -= $low_income_offset_amount;
        }

        $this->estimate_amount =  $estimate_amount;

    }

    public function isEstimateAmountRefundable() {
        return $this->estimate_amount > 0 ? true : false;
    }


    public function getEstimateAmount() {
        return $this->estimate_amount;
    }


    // Steps Flags
    public function canProceed2Deductions() {
        if ($this->salary) {
            return true;
        } else {
            return false;
        }
    }

    public function canProceed2TaxOffsets() {
        if ($this->salary) {
            return true;
        } else {
            return false;
        }
    }


}