<?php

class UserTaxDetail extends Eloquent{

    protected $table = 'user_tax_details';
    protected $primaryKey = 'id';
    public $timestamps = true;


    // Validation And save data

    public static function validateData() {
        $input = Input::all();
        $return_url = '/dashboard';

        // Default rules
        $rules = array(
            // Details
            'user_tax_year_id' => 'required|numeric|exists:user_tax_years,id',
            'detail.firstname' => 'required|min:0|max:255',
            'detail.lastname' => 'required|min:0|max:255',
            'detail.email' => 'required|email',
            'detail.occupation' => 'required',
            'detail.tax_file_number' => 'required|tfn',
            'detail.dob' => 'required|uk_date|uk_dob',
            'detail.landline' => 'required',
            'detail.mobile' => '',
            'detail.sex' => 'required|in:male,female',
            'detail.salutation' => 'required',
            'detail.is_australian_resident' => 'required|in:1,0',

            // Address
            'address.postal_address_1' => 'required|min:0|max:1000',
            'address.postal_address_2' => 'max:1000',
            'address.postal_post_code' => 'required|postal_code',
            'address.postal_suburb' => 'required',
            'address.postal_state' => 'required',

            // Home Address
            'address.home_address_1' => 'required|min:0|max:1000',
            'address.home_address_2' => 'max:1000',
            'address.home_post_code' => 'required|postal_code',
            'address.home_suburb' => 'required',
            'address.home_state' => 'required'

        );

        // Family Status
        $rules['family_status.has_spouse'] = 'required|in:0,1';
        $rules['family_status.no_of_dependents'] = 'min:0|max:1000';

        if (isset($input['family_status']['has_spouse']) && $input['family_status']['has_spouse'] == 1) {
            $rules['family_status.has_dependents'] = '';
            $rules['family_status.spouses_income'] = 'numeric';
            $rules['family_status.spouses_from'] = 'uk_date';
            $rules['family_status.spouses_to'] = 'uk_date' . (Input::has('spouses_from') ? '|uk_after:'.dt2db(Input::get('spouses_to')) : "");
            $rules['family_status.spouses_dob'] = 'required|uk_date|uk_dob';
            $rules['family_status.link_spouse_account'] = 'required|in:0,1';
        }

        $rules['medicare.exemption'] = 'required|numeric|max:999';
        $rules['medicare.has_covered_pphc'] = 'required|in:0,1';

        if (isset($input['medicare']['has_covered_pphc']) && $input['medicare']['has_covered_pphc'] == 0) {
            $rules['medicare.levy_surcharge_no_days'] = 'required|numeric|max:999';
        }

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

        $input = Input::all();

        if ( isset($input['detail']['id']) ) {
            $details = \UserTaxDetail::find( $input['detail']['id'] );
        } else {
            $details = new \UserTaxDetail();
        }

        $details->user_tax_year_id = get_array_key_value('user_tax_year_id',$input);
        $details->firstname = get_array_key_value('detail.firstname',$input);
        $details->lastname = get_array_key_value('detail.lastname',$input);
        $details->email = get_array_key_value('detail.email',$input);
        $details->occupation = get_array_key_value('detail.occupation',$input);
        $details->tax_file_number = str_replace(' ','',trim( get_array_key_value('detail.tax_file_number',$input) ));
        $details->dob = d2db(get_array_key_value('detail.dob',$input));
        $details->landline = get_array_key_value('detail.landline',$input);
        $details->sex = get_array_key_value('detail.sex',$input);
        $details->salutation = get_array_key_value('detail.salutation',$input);
        $details->is_australian_resident = get_array_key_value('detail.is_australian_resident',$input);

        $details->save();

        if ( isset($input['address']['id'])  ) {
            $address = \TaxAddress::find( $input['address']['id'] );
        } else {
            $address = new \TaxAddress();
        }
        $address->user_tax_year_id = Input::get('user_tax_year_id');
        $address->postal_address_1 = get_array_key_value('address.postal_address_1',$input);
        $address->postal_address_2 = get_array_key_value('address.postal_address_2',$input);
        $address->postal_post_code = get_array_key_value('address.postal_post_code',$input);
        $address->postal_suburb = get_array_key_value('address.postal_suburb',$input);
        $address->postal_state = get_array_key_value('address.postal_state',$input);
        $address->home_is_postal = get_array_key_value('address.home_is_postal',$input);
        $address->home_address_1 = get_array_key_value('address.home_address_1',$input);
        $address->home_address_2 = get_array_key_value('address.home_address_2',$input);
        $address->home_post_code = get_array_key_value('address.home_post_code',$input);
        $address->home_suburb = get_array_key_value('address.home_suburb',$input);
        $address->home_state = get_array_key_value('address.home_state',$input);
        $address->save();


        if ( isset($input['family_status']['id']) ) {
            $family_status = \TaxFamilyStatus::find( $input['family_status']['id'] );
        } else {
            $family_status = new \TaxFamilyStatus();
        }

        $family_status->user_tax_year_id = Input::get('user_tax_year_id');
        $family_status->has_spouse = get_array_key_value('family_status.has_spouse',$input);
        $family_status->no_of_dependents = get_array_key_value('family_status.has_spouse',$input);

        if (isset($input['family_status']['has_spouse']) && $input['family_status']['has_spouse'] == 1) {
            $family_status->spouses_income = get_array_key_value('family_status.spouses_income',$input);
            $family_status->spouses_from = d2db(get_array_key_value('family_status.spouses_from',$input));

            $family_status->spouses_to = d2db(get_array_key_value('family_status.spouses_to',$input));
            $family_status->spouses_dob = d2db(get_array_key_value('family_status.spouses_dob',$input));
            $family_status->link_spouse_account = get_array_key_value('family_status.link_spouse_account',$input);
        }
        $family_status->save();

        if ( isset($input['medicare']['id']) ) {
            $medicare = \TaxMedicare::find( $input['medicare']['id'] );
        } else {
            $medicare = new \TaxMedicare();
        }
        $medicare->user_tax_year_id = Input::get('user_tax_year_id');
        $medicare->exemption = get_array_key_value('medicare.exemption',$input);
        $medicare->has_covered_pphc = get_array_key_value('medicare.has_covered_pphc',$input);

        if (isset($input['medicare']['has_covered_pphc']) && $input['medicare']['has_covered_pphc'] == 0) {
            $medicare->levy_surcharge_no_days = get_array_key_value('medicare.levy_surcharge_no_days',$input);
        }
        $medicare->save();

    }


    // STATIC HELPERS

    public static function hasFiled($user_tax_year_id) {
        return self::where('user_tax_year_id','=',$user_tax_year_id)
            ->first();
    }

    public static function getByTaxYearId($user_tax_year_id) {
        return self::where('user_tax_year_id','=',$user_tax_year_id)->first();
    }


}

