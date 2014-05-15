<?php
namespace App\Modules\TaxForm;

class TaxFormController extends \BaseController
{

    // GET DATA

    function getIndex(\TaxYear $tax_year) {

        $render = array(
            'user'      => \Auth::user(),
            'tax_year' => $tax_year
        );

        $personal_detail = \UserTaxDetail::hasFiled( \Session::get('user_tax_year_id') );

        if ($personal_detail) {
            $render['detail'] = $personal_detail;
        }

        $address = \TaxAddress::hasFiled( \Session::get('user_tax_year_id') );
        if ($address) {
            $render['address'] = $address;
        }

        $family_status = \TaxFamilyStatus::hasFiled( \Session::get('user_tax_year_id') );
        if ($family_status) {
            $render['family_status'] = $family_status;
        }

        $medicare = \TaxMedicare::hasFiled( \Session::get('user_tax_year_id') );
        if ($medicare) {
            $render['medicare'] = $medicare;
        }

        return \View::make('taxform::dashboard.index')->with($render);
    }

    // POST DATA

    function postIndex() {
        if ($has_error = \UserTaxDetail::validateData()){
            return $has_error;
        }

        \UserTaxDetail::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('success_msg','Successfully updated tax info.');
                $json_data['redirect'] = \Input::get('success_url');
            }

            return \Response::json($json_data);

        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added Medicare Levy Surcharge(MLS).");
        }

    }


    // Validation Related Functions

    function getValidateAbn() {
        if ( !\ValidateAU::abn(\Input::get('input_value')) ) {
            return \Response::json(array(
                'status' => 'error',
                'messageError' => \Lang::get('validation.abn'),
            ));
        } else {
            return \Response::json(array(
                'status' => 'success'
            ));
        }
    }

    function getValidateTfn() {
        if ( !\ValidateAU::tfn(\Input::get('input_value')) ) {
            return \Response::json(array(
                'status' => 'error',
                'messageError' => \Lang::get('validation.tfn'),
            ));
        } else {
            return \Response::json(array(
                'status' => 'success'
            ));
        }
    }



}