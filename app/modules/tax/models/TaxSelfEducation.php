<?php

class TaxSelfEducation extends Eloquent{

    protected $table = 'tax_self_education';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Handle The creation of Income related Table.
    public static function validateData() {
        $return_url = '/dashboard';
        // Default Input

        $input = Input::all();

        // Default rules
        $rules = array(
            'user_tax_year_id' => 'required|numeric|exists:user_tax_years,id'
        );

        // Salary Rules
        if (Input::has('self_educations') && is_array(Input::get('self_educations'))) {
            // The Input
            foreach(Input::get('self_educations') as $key=>$value) {
                $rules["self_educations.{$key}.education_expenses"]          = 'required|max:255';
                $rules["self_educations.{$key}.amount"] = 'required|money|self_education_amount';
                $rules["self_educations.{$key}.type"]          = 'required';
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
        $user_tax_year_id = Input::get('user_tax_year_id');

        // The Input
        TaxSelfEducation::where('user_tax_year_id','=',$user_tax_year_id)->delete();

        if (Input::has('self_educations') && is_array(Input::get('self_educations'))) {
            foreach(Input::get('self_educations') as $key=>$value) {
                $self_education = new TaxSelfEducation();
                $self_education->user_tax_year_id       = $user_tax_year_id;
                $self_education->education_expenses     = $value['education_expenses'];
                $self_education->amount                 = parse_money($value['amount']);
                $self_education->type                   = $value['type'];

                $self_education->save();
            }
        }
    }
}