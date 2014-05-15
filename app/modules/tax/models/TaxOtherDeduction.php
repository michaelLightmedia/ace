<?php

class TaxOtherDeduction extends Eloquent{

    protected $table = 'tax_other_deductions';
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
        if (Input::has('other_dividend_deductions') && is_array(Input::get('other_dividend_deductions'))) {
            // The Input
            foreach(Input::get('other_dividend_deductions') as $key=>$value) {
                $rules["other_dividend_deductions.{$key}.description"]          = 'required|max:1000|min:0';
                $rules["other_dividend_deductions.{$key}.amount"] = 'required|money';
            }

        }
        // Salary Rules
        if (Input::has('other_gift_donation') && is_array(Input::get('other_gift_donation'))) {
            // The Input
            foreach(Input::get('other_gift_donation') as $key=>$value) {
                $rules["other_gift_donation.{$key}.description"]          = 'required|max:1000|min:0';
                $rules["other_gift_donation.{$key}.amount"] = 'required|money';
            }

        }
        // Salary Rules
        if (Input::has('other_other') && is_array(Input::get('other_other'))) {
            // The Input
            foreach(Input::get('other_other') as $key=>$value) {
                $rules["other_other.{$key}.description"]          = 'required|max:1000|min:0';
                $rules["other_other.{$key}.amount"] = 'required|money';
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
        $input = Input::all();

        // The Input
        TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year_id)
            ->where('deduction_type_code','=','other_dividend_deductions')->delete();
        if (Input::has('other_dividend_deductions') && is_array(Input::get('other_dividend_deductions'))) {
            foreach(Input::get('other_dividend_deductions') as $key=>$value) {
                $other = new TaxOtherDeduction();
                $other->user_tax_year_id     = $user_tax_year_id;
                $other->deduction_type_code     = "other_dividend_deductions";
                $other->description     = $value['description'];
                $other->amount    = parse_money($value['amount']);

                $other->save();
            }
        }

        // The Input
        TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year_id)
            ->where('deduction_type_code','=','other_gift_donation')->delete();
        if (Input::has('other_gift_donation') && is_array(Input::get('other_gift_donation'))) {
            foreach(Input::get('other_gift_donation') as $key=>$value) {
                $other = new TaxOtherDeduction();
                $other->user_tax_year_id     = $user_tax_year_id;
                $other->deduction_type_code     = "other_gift_donation";
                $other->description     = $value['description'];
                $other->amount    = parse_money($value['amount']);

                $other->save();
            }
        }

        TaxOtherDeduction::where('user_tax_year_id','=',$user_tax_year_id)
            ->where('deduction_type_code','=','other_other')->delete();
        if (Input::has('other_other') && is_array(Input::get('other_other'))) {
            // The Input
            foreach(Input::get('other_other') as $key=>$value) {
                $other = new TaxOtherDeduction();
                $other->user_tax_year_id     = $user_tax_year_id;
                $other->deduction_type_code     = "other_other";
                $other->description     = $value['description'];
                $other->amount    = parse_money($value['amount']);

                $other->save();
            }
        }


    }
}