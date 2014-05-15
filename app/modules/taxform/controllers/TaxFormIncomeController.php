<?php
namespace App\Modules\TaxForm;

class TaxFormIncomeController extends \BaseController
{

    // Get Data

    function getIndex(\UserTaxYear $user_tax_year) {

        $render = array(
            'user_tax_year' => $user_tax_year,
            'salaries' => \TaxSalary::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'bank_interests' => \TaxBankInterest::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'dividends' => \TaxDividend::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'other_incomes' => \TaxOtherIncome::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'income_summary'   => new \TaxSummary($user_tax_year),
            'which_process' => 'income'
        );


        return \View::make('taxform::tax_form.income.index')->with($render);
    }

    function postIndex() {
        if ($has_error = \UserTaxYear::validateDataIncomes()){
            return $has_error;
        }

        \UserTaxYear::saveDataIncomes();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_and_continue')) {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('income_success_msg','Successfully updated income.');

                $json_data['redirect'] = \Input::get('success_url');
            }
            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }




}