<?php

class TaxFamilyStatus extends Eloquent{

    protected $table = 'tax_family_status';
    protected $primaryKey = 'id';
    public $timestamps = true;


    // Validation And save data

    function validateData() {
        $input = Input::all();
        $return_url = '/dashboard';

        // Default rules
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

    function saveData() {
        $family_status->user_tax_year_id = Input::get('user_tax_year_id');
        $family_status->has_spouse = Input::get('has_spouse');
        $family_status->no_of_dependents = Input::get('no_of_dependents');

        if (Input::has('has_spouse') && Input::get('has_spouse') == 1) {
            $family_status->spouses_income = Input::get('spouses_income');
            $family_status->spouses_from = Input::get('spouses_from');
            $family_status->spouses_to = Input::get('spouses_to');
            $family_status->spouses_dob = Input::get('spouses_dob');
            $family_status->link_spouse_account = Input::get('link_spouse_account');
        }

        return $this->save();
    }

    function deleteData() {
        return $this->delete();
    }



    // STATIC HELPERS

    public static function hasFiled($user_tax_year_id) {
        return self::where('user_tax_year_id','=',$user_tax_year_id)
            ->first();
    }


}

