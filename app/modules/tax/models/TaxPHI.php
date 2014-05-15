<?php

class TaxPHI extends Eloquent{

    protected $table = 'tax_phi';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Handle The creation of Income related Table.
    public static function validateData() {
        $return_url = '/dashboard';
        // Default Input

        $input = Input::all();

        // Default rules
        $rules = array(
            'user_tax_year_id' => 'required|numeric|exists:user_tax_years,id',
            'help.has_help_debt' => 'in:1,0',
            'help.help_debt_amount' => (isset($input['help']['has_help_debt']) && $input['help']['has_help_debt'] == 1 ? 'required|' : null ). 'money',
        );

        $rules['zone_offset.zone_a_days'] = 'numeric|max:1000';
        $rules['zone_offset.zone_b_days'] = 'numeric|max:1000';
        $rules['zone_offset.zone_x_days'] = 'numeric|max:1000';
        $rules['zone_offset.zone_y_days'] = 'numeric|max:1000';
        $rules['zone_offset.zone_z_days'] = 'numeric|max:1000';

        // Salary Rules
        if (Input::has('private_health_insurances') && is_array(Input::get('private_health_insurances'))) {
            // The Input
            foreach(Input::get('private_health_insurances') as $key=>$value) {
                // Rules
                $is_entered_membership_no = TaxMedicare::hasCoveredPPHC(Input::get('user_tax_year_id')) || (isset($input["private_health_insurances"][$key]['membership_no']) && $input["private_health_insurances"][$key]['membership_no'] != "");

                $mandatory = $is_entered_membership_no ? 'required|' : null;

                if ($mandatory) {
                    $rules["private_health_insurances.{$key}.health_fund_name"]          = 'required|max:2000';
                    $rules["private_health_insurances.{$key}.membership_no"] = 'required|max:1000';
                    $rules["private_health_insurances.{$key}.benefit_code"]    = 'required|';
                    $rules["private_health_insurances.{$key}.type_of_coverage"]    = 'required|';
                    $rules["private_health_insurances.{$key}.tax_claim_code"]    = 'required|max:5000';
                    $rules["private_health_insurances.{$key}.australian_government_rebate"]    = 'required|money|max:5000';
                    $rules["private_health_insurances.{$key}.premiums_paid"]    = 'required|money|max:5000';
                }

            }

        } else {

            // Has Covered PPHC
            if ( TaxMedicare::hasCoveredPPHC(Input::get('user_tax_year_id')) ) {
                return Response::json(array(
                    'redirect' => URL::to("tax-form/{$input['user_tax_year_id']}/tax-offsets")
                ));
            }

        }

        // No any additional information
        $validator = Validator::make($input,$rules);

        if($validator->fails()){

            if (Request::ajax()) {
                $response =  array(
                    'status'=>  'error',
                    'errorData'=> $validator->getMessageBag()->toArray(),
                    'errorMsg' => 'Please correct the error below and try again.',
                );

                return Response::json( $response );

            } else {
                return Redirect::to($return_url)
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error_msg',"Please correct the error below.");
            }

        } else {

            // Manual validation for any required business roles validation
            // Validate if client own the user_tax_year or does have a previleges to change settings
            $real_tax_year_owner = UserTaxYear::where('id','=',Input::get('user_tax_year_id'))
                ->where('user_id','=',Auth::user()->id)->first();

            if (!$real_tax_year_owner && !can('manage_tax')) {
                App::abort('403');
            }

            return false;
        }
    }

    public static function saveData() {

        // Default rules
        $input = Input::all();
        $user_tax_year_id = Input::get('user_tax_year_id');

        TaxHelpDept::where('user_tax_year_id','=',$user_tax_year_id)->delete();

        if (Input::has('help') && is_array(Input::get('help'))) {
            if (get_array_key_value("help.has_help_debt",$input) == 1) {
                $help = new TaxHelpDept;

                $help->user_tax_year_id = Input::get("user_tax_year_id");
                $help->has_help_debt = get_array_key_value("help.has_help_debt",$input);
                $help->help_debt_amount = parse_money(get_array_key_value("help.help_debt_amount",$input));

                $help->save();
            }
        }

        TaxPHI::where('user_tax_year_id','=',$user_tax_year_id)->delete();
        if (Input::has('private_health_insurances') && is_array(Input::get('private_health_insurances'))) {
            // The Input
            $index = 0;
            foreach(Input::get('private_health_insurances') as $key=>$value) {

                $is_entered_membership_no = TaxMedicare::hasCoveredPPHC(Input::get('user_tax_year_id')) || (isset($input["private_health_insurances"][$key]['membership_no']) && $input["private_health_insurances"][$key]['membership_no'] != "");
                $mandatory = $is_entered_membership_no ? 'required|' : null;

                if ($mandatory) {
                    $tax_phi = new TaxPHI();
                    $tax_phi->user_tax_year_id = Input::get("user_tax_year_id");
                    $tax_phi->health_fund_name = get_array_key_value("private_health_insurances.{$key}.health_fund_name",$input);
                    $tax_phi->membership_no = get_array_key_value("private_health_insurances.{$key}.membership_no",$input);
                    $tax_phi->benefit_code = get_array_key_value("private_health_insurances.{$key}.benefit_code",$input);
                    $tax_phi->type_of_coverage = get_array_key_value("private_health_insurances.{$key}.type_of_coverage",$input);
                    $tax_phi->tax_claim_code = get_array_key_value("private_health_insurances.{$key}.tax_claim_code",$input);
                    $tax_phi->premiums_paid = parse_money( get_array_key_value("private_health_insurances.{$key}.premiums_paid",$input));
                    $tax_phi->australian_government_rebate = parse_money( get_array_key_value("private_health_insurances.{$key}.australian_government_rebate",$input));

                    $tax_phi->save();
                }

                $index++;
            }
        }

        if (Input::has('zone_offset') && is_array(Input::get('zone_offset'))) {

            TaxZoneOffset::where('user_tax_year_id','=',$user_tax_year_id)->delete();

            $flag = false;
            $zone_offset = new TaxZoneOffset();
            $zone_offset->user_tax_year_id = Input::get("user_tax_year_id");

            if (isset($input['zone_offset']['zone_a_days']) && $input['zone_offset']['zone_a_days'] > 0) {
                $zone_offset->zone_a_days = get_array_key_value('zone_offset.zone_a_days',$input);
                $zone_offset->zone_a_amount = $zone_offset->zone_a_days >= 183 ? Gy::getZoneAmount('a') : 0;
                $flag = true;
            }
            if (isset($input['zone_offset']['zone_b_days'])  && $input['zone_offset']['zone_b_days'] > 0) {
                $zone_offset->zone_b_days = get_array_key_value('zone_offset.zone_b_days',$input);
                $zone_offset->zone_b_amount =$zone_offset->zone_a_days >= 183 ? Gy::getZoneAmount('b') : 0;
                $flag = true;
            }
            if (isset($input['zone_offset']['zone_x_days'])  && $input['zone_offset']['zone_x_days'] > 0) {
                $zone_offset->zone_x_days = get_array_key_value('zone_offset.zone_x_days',$input);
                $zone_offset->zone_x_amount = $zone_offset->zone_a_days >= 183 ? Gy::getZoneAmount('x') : 0;
                $flag = true;
            }
            if (isset($input['zone_offset']['zone_y_days'])  && $input['zone_offset']['zone_y_days'] > 0) {
                $zone_offset->zone_y_days = get_array_key_value('zone_offset.zone_y_days',$input);
                $zone_offset->zone_y_amount = $zone_offset->zone_a_days >= 183 ? Gy::getZoneAmount('y') : 0;
                $flag = true;
            }
            if (isset($input['zone_offset']['zone_z_days'])  && $input['zone_offset']['zone_z_days'] > 0) {
                $zone_offset->zone_z_days = get_array_key_value('zone_offset.zone_z_days',$input);
                $zone_offset->zone_z_amount = $zone_offset->zone_a_days >= 183 ? Gy::getZoneAmount('z') : 0;
                $flag = true;
            }

            if ($flag) {
                $zone_offset->save();
            }

        }


    }
}