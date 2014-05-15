<?php
namespace App\Modules\TaxForm;

class TaxFormZoneOffsetController extends \BaseController
{

    // Get Data

    function getIndex(\UserTaxYear $user_tax_year) {

        $render = array(
            'user_tax_year' => $user_tax_year,
            'income_summary'   => new \TaxSummary($user_tax_year),
            'which_process' => 'tax_offsets'
        );

        $help = \TaxHelpDept::where('user_tax_year_id','=', $user_tax_year->id)->first();
        if ($help) {
            $render['help'] = $help;
        }

        $private_health_insurance = \TaxPHI::where('user_tax_year_id','=', $user_tax_year->id)->get();
        if ($private_health_insurance) {
            $render['private_health_insurances'] = $private_health_insurance;
        }

        $zone_offset = \TaxZoneOffset::where('user_tax_year_id','=', $user_tax_year->id)->first();
        if ($zone_offset) {
            $render['zone_offset'] = $zone_offset;
        }

        return \View::make('taxform::tax_form.tax_offsets.index')->with($render);
    }

    function postIndex() {
        if ($has_error = \TaxPHI::validateData()){
            return $has_error;
        }

        \TaxPHI::saveData();

        if ( \Request::ajax() ) {
            $json_data = array(
                'status' => 'success'
            );

            if (\Input::has('submit_action') && \Input::get('submit_action') == "save_continue") {
                $json_data['redirect'] = \Input::get('next_process_url');
            } else {
                \Session::flash('success_msg','Successfully updated Tax Offsets.');
                $json_data['redirect'] = \Input::get('success_url');
            }

            return \Response::json($json_data);
        } else {
            return \Redirect::to('/admin/tax-form/settings/tax-mls')
                ->with('success_msg',"Successfully added medicare Levy Surcharge(MLS).");
        }
    }

}