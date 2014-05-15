<?php
namespace App\Modules\TaxForm;

class TaxFormDeductionController extends \BaseController
{

    // Get Data

    function getIndex(\UserTaxYear $user_tax_year) {

        $render = array(
            'user_tax_year' => $user_tax_year,
            'car_expenses' => \TaxCarExpense::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'self_educations' => \TaxSelfEducation::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'travel_expenses' => \TaxTravelExpense::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'uniforms' => \TaxUniform::where('user_tax_year_id','=',$user_tax_year->id)->get(),
            'other_dividend_deductions' => \TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year->id)->where('deduction_type_code','=','other_dividend_deductions')->get(),
            'other_gift_donations' => \TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year->id)->where('deduction_type_code','=','other_gift_donation')->get(),
            'other_others' => \TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year->id)->where('deduction_type_code','=','other_other')->get(),
            'income_summary'   => new \TaxSummary($user_tax_year),
            'which_process' => 'deductions'
        );

        return \View::make('taxform::tax_form.deductions.index')->with($render);
    }

    function postCarExpenses() {
        if ($has_error = \TaxCarExpense::validateData()){
            return $has_error;
        }

        \TaxCarExpense::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );


            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('car_expenses_success_msg','Successfully updated Car Expenses.');
                $json_data['redirect'] = \Input::get('success_url');
            }


            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }

    function postTravelExpenses() {
        if ($has_error = \TaxTravelExpense::validateData()){
            return $has_error;
        }

        \TaxTravelExpense::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('travel_expenses_success_msg','Successfully updated Travel Expenses.');
                $json_data['redirect'] = \Input::get('success_url');
            }


            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }

    function postUniform() {
        if ($has_error = \TaxUniform::validateData()){
            return $has_error;
        }

        \TaxUniform::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('uniform_success_msg','Successfully updated Uniform.');
                $json_data['redirect'] = \Input::get('success_url');
            }

            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }

    function postSelfEducation() {
        if ($has_error = \TaxSelfEducation::validateData()){
            return $has_error;
        }

        \TaxSelfEducation::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('self_education_success_msg','Successfully updated Self Education.');
                $json_data['redirect'] = \Input::get('success_url');
            }

            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }

    function postOther() {
        if ($has_error = \TaxOtherDeduction::validateData()){
            return $has_error;
        }

        \TaxOtherDeduction::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('other_deduction_success_msg','Successfully updated Other Deduction.');
                $json_data['redirect'] = \Input::get('success_url');
            }


            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }


}